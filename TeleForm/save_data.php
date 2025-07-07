<?php
// กำหนดข้อมูลการเชื่อมต่อฐานข้อมูล
define('DB_HOST', '192.168.100.12');
define('DB_PORT', '3306');
define('DB_DATABASE', 'db_kpi_information');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'webmaster2000#'); // ระวังเรื่องความปลอดภัยในการเก็บรหัสผ่านในโค้ดจริง

// ตั้งค่าให้ PHP แสดงข้อผิดพลาด (สำหรับ debug เท่านั้น! ควรปิดเมื่อใช้งานจริงบน Production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ตั้งค่า Header เพื่อบอกเบราว์เซอร์ว่าเราจะส่ง JSON กลับไป
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// ตรวจสอบว่าเป็น request แบบ POST หรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. รับข้อมูลจากฟอร์ม
    // ตรวจสอบว่ามีค่า 'hospital' ถูกส่งมาหรือไม่ ถ้าไม่มีใช้ค่าเริ่มต้น
    $hosname = isset($_POST['hospital']) ? $_POST['hospital'] : 'ไม่ระบุโรงพยาบาล';
    // ตรวจสอบว่ามีค่า 'datetime' ถูกส่งมาหรือไม่ ถ้าไม่มีใช้ PHP date (ควรส่งมาจาก JS เสมอ)
    $datetime = isset($_POST['datetime']) ? $_POST['datetime'] : date('Y-m-d H:i:s'); // รูปแบบ YYYY-MM-DD HH:MM:SS

    // 2. กำหนด Base URL ของเว็บไซต์
    // นี่คือส่วนสำคัญ! ต้องแน่ใจว่า $project_directory ถูกต้อง
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
    $host = $_SERVER['HTTP_HOST'];

    // *** คุณต้องแก้ไขบรรทัดนี้ให้เป็นชื่อโฟลเดอร์โปรเจกต์ของคุณบนเว็บเซิร์ฟเวอร์ ***
    // ตัวอย่าง: ถ้าเว็บของคุณคือ http://192.168.100.12/telemedicine_form/
    // ให้ $project_directory = '/telemedicine_form/';
    // ถ้าเว็บของคุณคือ http://192.168.100.12/ (ไม่มีโฟลเดอร์ย่อย)
    // ให้ $project_directory = '/';
    $project_directory = '/datahub/TeleMed/';

    $base_url = $protocol . "://" . $host . $project_directory;

    // 3. จัดการการอัปโหลดไฟล์ PDF
    $pdfUrl = null; // เริ่มต้นให้เป็น null
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/pdf/'; // โฟลเดอร์สำหรับเก็บ PDF (สัมพันธ์กับไฟล์ PHP นี้)

        // สร้างโฟลเดอร์ถ้ายังไม่มี
        if (!is_dir($uploadDir)) {
            // ตั้งค่า permissions ให้เขียนได้ (0777 เป็นค่าสูงสุด อาจปรับเป็น 0755 หรือ 0775 ใน Production)
            if (!mkdir($uploadDir, 0777, true)) {
                $response['message'] = 'Failed to create upload directory.';
                echo json_encode($response);
                exit();
            }
        }

        $fileName = basename($_FILES['pdf_file']['name']);
        // สร้างชื่อไฟล์ที่ไม่ซ้ำกันเพื่อป้องกันการทับซ้อนและปัญหาด้านความปลอดภัย
        $uniqueFileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9_.-]/', '', $fileName);
        $targetFilePath = $uploadDir . $uniqueFileName; // Path จริงบน Server เช่น uploads/pdf/abc_filename.pdf

        // ย้ายไฟล์ที่อัปโหลดจาก temp ไปยังโฟลเดอร์เป้าหมาย
        if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $targetFilePath)) {
            // สร้าง Full URL สำหรับบันทึกลงฐานข้อมูล
            $pdfUrl = $base_url . $targetFilePath; // รวม Base URL กับ Path จริงบน Server
            $response['message'] = 'PDF uploaded successfully. URL: ' . $pdfUrl; // สำหรับ Debug
        } else {
            $response['message'] = 'Failed to move uploaded PDF file. Error: ' . $_FILES['pdf_file']['error'];
            echo json_encode($response);
            exit();
        }
    } else {
        $response['message'] = 'No PDF file uploaded or an upload error occurred. Error Code: ' . (isset($_FILES['pdf_file']) ? $_FILES['pdf_file']['error'] : 'N/A');
        // ถ้าไม่มี PDF อัปโหลด อาจจะยอมให้บันทึกข้อมูลอื่นโดยไม่มี URL หรือแจ้งข้อผิดพลาด
        // ในกรณีนี้จะยังคงพยายามบันทึกข้อมูลอื่นต่อโดยมี $pdfUrl เป็น null
    }

    // 4. เชื่อมต่อฐานข้อมูล MySQL
    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

    // ตรวจสอบการเชื่อมต่อ
    if ($mysqli->connect_error) {
        $response['message'] = 'Database connection failed: ' . $mysqli->connect_error;
        echo json_encode($response);
        exit();
    }

    // *** 5. ตั้งค่า Character Set สำหรับการเชื่อมต่อฐานข้อมูล (สำคัญสำหรับภาษาไทย) ***
    // ใช้ utf8mb4 เพื่อรองรับภาษาไทยและอักขระพิเศษอื่นๆ ได้ดีที่สุด
    // ถ้า MySQL Server เก่ามากและไม่รองรับ utf8mb4 ให้เปลี่ยนเป็น "utf8"
    if (!$mysqli->set_charset("utf8mb4")) {
        $response['message'] = 'Error loading character set utf8mb4: ' . $mysqli->error;
        $mysqli->close(); // ปิดการเชื่อมต่อก่อนออก
        echo json_encode($response);
        exit();
    }

    // 6. เตรียมและรันคำสั่ง SQL สำหรับ INSERT ข้อมูล
    // ตรวจสอบว่าชื่อคอลัมน์ในตาราง 'tb_tele_med_data_form' ตรงกับ 'hosname', 'url', 'datetime'
    $stmt = $mysqli->prepare("INSERT INTO tb_tele_med_data_form (hosname, url, datetime) VALUES (?, ?, ?)");

    // ตรวจสอบว่า Prepare Statement สำเร็จหรือไม่
    if ($stmt === false) {
        $response['message'] = 'SQL Prepare failed: ' . $mysqli->error;
        $mysqli->close();
        echo json_encode($response);
        exit();
    }

    // 7. Bind parameters (ผูกตัวแปรกับ Placeholder ใน SQL)
    // "sss" หมายถึง 3 strings (hosname, url, datetime ตามลำดับ)
    $stmt->bind_param("sss", $hosname, $pdfUrl, $datetime);

    // 8. รันคำสั่ง SQL
    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Data and PDF URL saved successfully!';
        $response['redirect_to'] = 'result.php'; // บอก JavaScript ให้เปลี่ยนเส้นทางไปหน้านี้
    } else {
        $response['message'] = 'Error saving data: ' . $stmt->error;
    }

    // ปิด Statement และการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $mysqli->close();
} else {
    // ถ้าไม่ใช่ Request แบบ POST (เช่น เข้าหน้าโดยตรงด้วย GET)
    $response['message'] = 'Invalid request method. Only POST requests are allowed.';
}

// ส่งผลลัพธ์กลับไปยัง JavaScript ในรูปแบบ JSON
echo json_encode($response);
