<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8" />
    <title>ขอบคุณสำหรับข้อมูล - แบบฟอร์ม Telemedicine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: linear-gradient(to bottom right, #e0f7fa, #e1bee7);
            font-family: 'Noto Sans Thai', sans-serif;
            display: flex;
            /* Use flexbox for centering */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            min-height: 100vh;
            /* Full viewport height */
            margin: 0;
            /* Remove default body margin */
            padding: 20px;
            /* Add some padding for smaller screens */
            box-sizing: border-box;
            /* Include padding in element's total width and height */
        }

        .glass {
            backdrop-filter: blur(12px);
            background-color: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 2rem;
            /* Consistent with your form's rounded corners */
            padding: 2.5rem;
            /* More generous padding */
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            /* Stronger shadow */
            text-align: center;
            max-width: 600px;
            /* Limit width for readability */
            width: 100%;
            /* Ensure it takes full width on small screens */
            color: #333;
            /* Darker text for readability on light background */
        }

        .header-bg {
            background-color: #16a34a;
            /* Green-600 from Tailwind */
            color: white;
            padding: 1.5rem 2rem;
            border-radius: 1rem 1rem 0 0;
            /* Rounded top corners */
            margin-top: -2.5rem;
            /* Pull up to overlap glass card */
            margin-left: -2.5rem;
            /* Pull left to overlap glass card */
            margin-right: -2.5rem;
            /* Pull right to overlap glass card */
            margin-bottom: 2rem;
            /* Space below header */
        }

        .header-bg h1 {
            font-size: 2.25rem;
            /* text-4xl */
            font-weight: 700;
            /* font-bold */
            margin-bottom: 0.5rem;
        }

        .message-content {
            font-size: 1.125rem;
            /* text-lg */
            line-height: 1.6;
            color: #4a5568;
            /* Gray-700 */
        }

        .contact-info {
            margin-top: 2rem;
            font-size: 0.95rem;
            color: #6b7280;
            /* Gray-600 */
        }

        .button-back {
            display: inline-block;
            margin-top: 2.5rem;
            background-color: #3b82f6;
            /* Blue-500 */
            color: white;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 0.75rem;
            /* rounded-xl */
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button-back:hover {
            background-color: #2563eb;
            /* Blue-600 */
        }

        /* Basic responsiveness */
        @media (max-width: 640px) {
            .glass {
                padding: 1.5rem;
            }

            .header-bg {
                margin-top: -1.5rem;
                margin-left: -1.5rem;
                margin-right: -1.5rem;
                padding: 1rem 1.5rem;
            }

            .header-bg h1 {
                font-size: 1.75rem;
                /* text-3xl on smaller screens */
            }

            .message-content {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="glass">
        <div class="header-bg">
            <h1>สำเร็จ! ✅</h1>
        </div>
        <div class="message-content">
            <p>
                <strong>ทางกลุ่มงานสุขภาพดิจิทัล สสจ.พะเยา</strong> ขอขอบคุณเป็นอย่างสูงสำหรับความร่วมมือในการตอบแบบสำรวจ
                ข้อมูลที่ท่านได้ให้ไว้จะเป็นประโยชน์อย่างยิ่งต่อการดำเนินงาน Telemedicine ปีงบประมาณ 2568
            </p>
            <p class="mt-4">
                เราจะนำเสนอผลการสำรวจนี้ต่อผู้ตรวจราชการในรอบที่ 2 ต่อไป
            </p>
            <p class="contact-info">
                หากมีข้อสงสัยเพิ่มเติม สามารถติดต่อกลุ่มงานสุขภาพดิจิทัล สสจ.พะเยา
            </p>
        </div>

    </div>

    <script>
        gsap.from(".glass", {
            duration: 1,
            opacity: 0,
            y: 50,
            ease: "power2.out"
        });
        gsap.from(".header-bg", {
            duration: 0.8,
            opacity: 0,
            y: -20,
            ease: "power2.out",
            delay: 0.3
        });
        gsap.from(".message-content p", {
            duration: 0.8,
            opacity: 0,
            y: 20,
            ease: "power2.out",
            stagger: 0.2,
            delay: 0.6
        });
        gsap.from(".button-back", {
            duration: 0.8,
            opacity: 0,
            scale: 0.8,
            ease: "back.out(1.7)",
            delay: 1.2
        });
    </script>
</body>

</html>