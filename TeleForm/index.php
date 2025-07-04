<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8" />
  <title>แบบฟอร์ม Telemedicine</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">
 <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background: linear-gradient(to bottom right, #e0f7fa, #e1bee7);
      font-family: 'Noto Sans Thai', sans-serif;
    }

    .glass {
      backdrop-filter: blur(12px);
      background-color: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .pdf-wrapper {
      padding: 20mm;
      font-family: 'Noto Sans Thai', sans-serif;
      color: #333;
      background: white;
    }

    .pdf-wrapper h1,
    .pdf-wrapper h2 {
      color: #166534;
      margin-bottom: 8px;
    }

    .pdf-wrapper .section-title {
      font-size: 1.1em;
      margin-top: 20px;
      margin-bottom: 8px;
      color: #166534;
      border-bottom: 2px solid #d1fae5;
      padding-bottom: 5px;
    }

    .pdf-wrapper .card {
      background: #f9fafb;
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      padding: 12px;
      margin-bottom: 12px;
    }
  </style>
</head>


<body class="min-h-screen flex flex-col justify-between">
  
<main class="px-4 py-10">


  <div class="w-full max-w-3xl mx-auto">

   <div class="bg-green-600 text-white py-4 px-6 rounded-t-xl flex items-center gap-3">
  <i data-feather="activity" class="w-6 h-6"></i>
  <h1 class="text-2xl font-bold">
    ผลการดำเนินงาน 
    <span class="font-light">Telemedicine ปีงบประมาณ 2568</span>
  </h1>
</div>

<!-- ส่วนเนื้อหา -->
<div class="bg-white p-6 rounded-b-xl mb-6 shadow-md">
  <h2 class="text-gray-700 text-lg italic leading-relaxed flex items-start gap-2">
    <i data-feather="message-circle" class="w-5 h-5 mt-1 text-green-600"></i>
    <span>
      ทางกลุ่มงานสุขภาพดิจิทัล สสจ.พะเยา ขอขอบคุณสำหรับความร่วมมือ 
      และจะนำเสนอผลการสำรวจนี้ต่อผู้ตรวจราชการ รอบที่ 2 ต่อไป
    </span>
  </h2>
</div>


    <form id="teleform" class="glass p-8 rounded-2xl shadow-2xl space-y-10 text-black" action="result.php" method="POST">
      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">1. โรงพยาบาล <span class="text-red-500">*</span></h3>
        <div class="grid grid-cols-1 gap-2">
          <label><input type="radio" name="hospital" value="โรงพยาบาลพะเยา" class="mr-2" required>โรงพยาบาลพะเยา</label>
          <label><input type="radio" name="hospital" value="โรงพยาบาลเชียงคำ" class="mr-2">โรงพยาบาลเชียงคำ</label>
          <label><input type="radio" name="hospital" value="โรงพยาบาลจุน" class="mr-2">โรงพยาบาลจุน</label>
          <label><input type="radio" name="hospital" value="โรงพยาบาลดอกคำใต้" class="mr-2">โรงพยาบาลดอกคำใต้</label>
          <label><input type="radio" name="hospital" value="โรงพยาบาลแม่ใจ" class="mr-2">โรงพยาบาลแม่ใจ</label>
          <label><input type="radio" name="hospital" value="โรงพยาบาลภูกามยาว" class="mr-2">โรงพยาบาลภูกามยาว</label>
          <label><input type="radio" name="hospital" value="โรงพยาบาลปง" class="mr-2">โรงพยาบาลปง</label>
          <label><input type="radio" name="hospital" value="โรงพยาบาลเชียงม่วน" class="mr-2">โรงพยาบาลเชียงม่วน</label>
          <label><input type="radio" name="hospital" value="โรงพยาบาลภูซาง" class="mr-2">โรงพยาบาลภูซาง</label>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">2. HIS (HosXP) เวอร์ชัน <span class="text-red-500">*</span></h3>
        <div class="flex flex-col gap-2">
          <label><input type="radio" name="his_version" value="v3" class="mr-2" required>Version 3</label>
          <label><input type="radio" name="his_version" value="v4" class="mr-2">Version 4</label>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">
          3. โปรแกรมที่ใช้ในการให้บริการ <span class="text-red-500">*</span>
        </h3>
        <div class="space-y-2">
          <label class="flex items-start space-x-2">
            <input type="checkbox" name="tools[]" value="หมอพร้อม" class="mt-1">
            <span>หมอพร้อม</span>
          </label>
          <label class="flex items-start space-x-2">
            <input type="checkbox" name="tools[]" value="LINE Apps" class="mt-1">
            <span>LINE Apps</span>
          </label>
          <label class="flex items-start space-x-2">
            <input type="checkbox" name="tools[]" value="Zoom" class="mt-1">
            <span>Zoom</span>
          </label>

          <label class="flex items-start space-x-2">
            <input type="checkbox" id="otherCheckbox" name="tools[]" value="อื่น ๆ" class="mt-1">
            <span class="w-full">
              อื่น ๆ
              <input type="text" id="otherTextInput" name="tool_other_detail"
                class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 text-sm hidden"
                placeholder="ระบุโปรแกรมอื่น ๆ">
            </span>
          </label>
        </div>
      </div>


      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">4.รูปแบบการให้บริการ<span class="text-red-500">*</span></h3>
        <div class="flex flex-col gap-2">
          <label><input type="checkbox" name="service_type[]" value="B2B" class="mr-2" required>B2b (รพ. กับ รพ.)</label>
          <label><input type="checkbox" name="service_type[]" value="B2b2" class="mr-2" >B2b (รพ. กับ รพ.สต)</label>
          <label><input type="checkbox" name="service_type[]" value="B2C" class="mr-2">B2C (รพ. กับผู้ป่วย)</label>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">
          5. กรณีให้บริการแบบ B2B (ครั้งที่ 1 ต.ค. 67 - ปัจจุบัน) <span class="text-red-500">*</span>
        </h3>
        <div class="flex flex-col gap-2">
          <div class="flex items-center space-x-2">
            <label for="b2b_count" class="flex-shrink-0">5.1 จำนวน</label>
            <input type="number" id="b2b_count" name="b2b_count" min="0" placeholder="ระบุจำนวนครั้ง"
              class="block w-26 border border-gray-300 rounded px-3 py-2 text-sm" required>
            <span class="flex-shrink-0">ครั้ง</span>
          </div>

          <div class="mt-2">
            <label class="block text-gray-700 mb-1">5.2 ระหว่างโรงพยาบาลกับหน่วยบริการใด</label>
            <div class="flex flex-col gap-2 pl-4">
              <label><input type="radio" name="b2b_partner" value="รพ.สต" class="mr-2" required>รพ.สต</label>
              <label><input type="radio" name="b2b_partner" value="เรือนจำ" class="mr-2">เรือนจำ</label>
              <label class="flex items-center">
                <input type="radio" name="b2b_partner" id="b2bOtherRadio" value="คลินิกเอกชน/อื่นๆ" class="mr-2">อื่นๆ
                <input type="text" id="b2bOtherText" name="b2b_partner_other_detail"
                  class="ml-2 mt-1 block w-full border border-gray-300 rounded px-3 py-2 text-sm hidden"
                  placeholder="ระบุคลินิกเอกชน/อื่นๆ">
              </label>


              
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">
          6. ให้บริการกับผู้ป่วย ตั้งเเต่ (1 ต.ค. 67 - ปัจจุบัน) <span class="text-red-500">*</span>
        </h3>
        <div class="flex flex-col gap-2">
          <div class="flex items-center space-x-2">
            <label for="HIV_patient" class="flex-shrink-0">6.1 HIV จำนวน</label>
            <input type="number" id="HIV_patient" name="HIV_patient" min="0" placeholder="ระบุจำนวนครั้ง"
              class="block w-26 border border-gray-300 rounded px-3 py-2 text-sm" required>
            <span class="flex-shrink-0">ครั้ง</span>
          </div>
          <div class="flex items-center space-x-2">
            <label for="TB_patient" class="flex-shrink-0">6.2 TB จำนวน</label>
            <input type="number" id="TB_patient" name="TB_patient" min="0" placeholder="ระบุจำนวนครั้ง"
              class="block w-26 border border-gray-300 rounded px-3 py-2 text-sm" required>
            <span class="flex-shrink-0">ครั้ง</span>
          </div>
          <div class="flex items-center space-x-2">
            <label for="bed_patient" class="flex-shrink-0">6.3 ติดเตียง</label>
            <input type="number" id="bed_patient" name="bed_patient" min="0" placeholder="ระบุจำนวนครั้ง"
              class="block w-26 border border-gray-300 rounded px-3 py-2 text-sm" required>
            <span class="flex-shrink-0">ครั้ง</span>
          </div>

          <div class="flex items-center space-x-2">
            <label for="psychiatry_patient" class="flex-shrink-0">6.4 จิตเวช</label>
            <input type="number" id="psychiatry_patient" name="psychiatry_patient" min="0" placeholder="ระบุจำนวนครั้ง"
              class="block w-26 border border-gray-300 rounded px-3 py-2 text-sm" required>
            <span class="flex-shrink-0">ครั้ง</span>
          </div>
        </div>
      </div>


      
   <!--  7. ท่านให้บริการจ่ายยาแบบใด?-->
      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">
          7. ท่านให้บริการจ่ายยาแบบใด<span class="text-red-500">*</span>
        </h3>
        <div class="flex flex-col gap-2">


          <div class="flex items-center space-x-2">
            <label class="flex items-center">
              <input type="checkbox" id="healthRiderCheckbox" name="drug_delivery_type[]" value="Health_Rider" class="mr-2"> Health Rider จำนวน
            </label>
            <input disabled type="number" id="health_rider_count" name="health_rider_count" min="0"  placeholder="ระบุจำนวนครั้ง"
              class="block w-26 border border-gray-300 rounded px-3 py-2 text-sm">
            <span class="flex-shrink-0">ครั้ง</span>
          </div>
          <div class="flex items-center space-x-2">
            <label class="flex items-center">
              <input   type="checkbox" id="postalCheckbox" name="drug_delivery_type[]" value="ส่งให้ทางไปรษณีย์" class="mr-2"> ส่งให้ทางไปรษณีย์ จำนวน
            </label>
            <input type="number" disabled id="postal_count" name="postal_count" min="0" placeholder="ระบุจำนวนครั้ง"
              class="block w-26 border border-gray-300 rounded px-3 py-2 text-sm">
            <span class="flex-shrink-0">ครั้ง</span>
          </div>

          <div class="flex items-center space-x-2">
            <label class="flex items-center">
              <input  type="checkbox" id="subdistrictHospitalCheckbox" name="drug_delivery_type[]" value="ส่งให้ทาง รพ.สต" class="mr-2"> ส่งให้ทาง รพ.สต
            </label>
          </div>


          <div class="flex items-center space-x-2">
            <label class="flex items-center">
              <input type="checkbox" id="pharmacyStoreCheckbox" name="drug_delivery_type[]" value="ให้ไปรับที่ร้านขายยา" class="mr-2"> ให้ไปรับที่ร้านขายยา
            </label>
          </div>

          <div class="flex items-center space-x-2">
            <label class="flex items-center">
              <input type="checkbox" id="volunteerCheckbox" name="drug_delivery_type[]" value="ส่งให้ อสม." class="mr-2"> ส่งให้ อสม. จำนวน
            </label>
            <input type="number"  disabled id="volunteer_count" name="Village_Health_Volunteer_count" min="0" placeholder="ระบุจำนวนครั้ง"
              class="block w-26 border border-gray-300 rounded px-3 py-2 text-sm">
            <span class="flex-shrink-0">ครั้ง</span>
          </div>


          <div class="flex items-center space-x-2">
            <label class="flex items-center">
              <input type="checkbox" id="drugOtherCheckbox" name="drug_delivery_type[]" value="อื่นๆ" class="mr-2"> อื่นๆ
            </label>
            <input type="text" id="drugOtherDetail" name="drug_other_detail"
              class="ml-2 mt-1 block w-48 border border-gray-300 rounded px-3 py-2 text-sm hidden"
              placeholder="ระบุประเภทอื่นๆ">

          </div>


        </div>
      </div>
     



   <!--  8. โรงพยาบาลมีระบบนัดหมาย ออนไลน์ หรือ ไม่ ?-->
      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">8. โรงพยาบาลมีระบบนัดหมาย ออนไลน์ หรือ ไม่ ? <span class="text-red-500">*</span></h3>
        <div class="grid grid-cols-1 gap-2">
          <label><input type="radio" name="online_appointment_system" value="มี" class="mr-2" required>มี</label>
          <label><input type="radio" name="online_appointment_system" value="ไม่มี" class="mr-2">ไม่มี (ข้ามไปข้อที่ 10)</label>
        </div>
      </div>

      
   <!--  9. ใช้โปรแกรมอะไรในการนัดหมายออนไลน์ -->

        <div class="bg-white rounded-xl shadow p-6 space-y-4">
          <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">
            9. ใช้โปรแกรมอะไรในการนัดหมายออนไลน์
          </h3>
          <div class="flex flex-col gap-2">
            <div class="flex items-center space-x-2">
              <input type="text" id="program_meet" name="program_meet" placeholder="ระบุชื่อโปรแกรม"
                class="block w-full border border-gray-300 rounded px-3 py-2 text-sm">
            </div>
          </div>
        </div>


<!--   10. ปีงบประมาณ 2568 มีการใช้บริการนัดหมายออนไลน์จำนวนกี่ครั้ง (ตั้งเเต่ 1 ต.ค 67 - ปัจจุบัน) -->

   
        <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">
  10. ปีงบประมาณ 2568 มีการใช้บริการนัดหมายออนไลน์จำนวนกี่ครั้ง 
  <span class="text-red-500">*</span><br>
  (ตั้งแต่ 1 ต.ค. 67 - ปัจจุบัน)
</h3>

          <div class="flex flex-col gap-2">
            <div class="flex items-center space-x-2">
              <span class="flex-shrink-0">จำนวนทั้งหมด</span>
              <input type="number" id="appointment_count" name="appointment_count" min="0" placeholder="ระบุจำนวนครั้ง"
                class="block w-26 border border-gray-300 rounded px-3 py-2 text-sm">
              <span class="flex-shrink-0">ครั้ง</span>
            </div>
          </div>
        </div>


   <!--   11.ในการให้บริการ Telemedicine มีการใช้ PHR View ร่วมด้วยหรอไม่ -->
      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">
          11.ในการให้บริการ Telemedicine มีการใช้ PHR View ร่วมด้วยหรอไม่<span class="text-red-500">*</span>
        </h3>
        <div class="flex flex-col gap-2">
          <div class="grid grid-cols-1 gap-2">
            <label><input type="radio" name="phr_view_usage" value="ใช้" class="mr-2" required>ใช้</label>
            <label><input type="radio" name="phr_view_usage" value="ไม่ใช้" class="mr-2">ไม่ใช้</label>
          </div>
        </div>
      </div>

   <!--   12. จากการที่ทางโรงพยาบาลได้ให้บริการ Telemedicine / Telehealth ท่านคิดว่าผู้รับบริการได้รับประโยชน์อะไร / อย่างไรบ้าง-->
      <div class="bg-white rounded-xl shadow p-6 space-y-4">
        <h3 class="text-xl font-semibold text-blue-800 border-b pb-2">
          12. จากการที่ทางโรงพยาบาลได้ให้บริการ Telemedicine / Telehealth ท่านคิดว่าผู้รับบริการได้รับประโยชน์อะไร / อย่างไรบ้าง <span class="text-red-500">*</span>
        </h3>
        <div class="flex flex-col gap-2">
          <div class="flex items-center space-x-2 w-full">
            <textarea id="patientBenefitsInput" name="beneficiary_benefits"
              placeholder="ระบุประโยชน์ที่ผู้รับบริการได้รับ เช่น ลดเวลาเดินทาง, เข้าถึงบริการได้ง่ายขึ้น, ลดค่าใช้จ่าย"
              class="block w-full border border-gray-300 rounded px-3 py-2 text-sm h-24 resize-y" required></textarea>
          </div>
        </div>
      </div>


      <input type="hidden" id="datetime" name="datetime" value="">

      <div class="text-center pt-6">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-8 py-3 rounded-xl shadow">
          ส่งแบบฟอร์ม
        </button>
      </div>
    </form>
  </div>
  </main>


 <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
      <p class="text-lg">&copy; 2025 ระบบสารสนเทศ ทุกสิทธิ์สงวน</p>
      <p class="text-sm mt-2">ออกแบบและพัฒนาโดย ทีมงาน กลุ่มงานสุขภาพดิจิทัล สํานักงานสาธารณสุขจังหวัด พะเยา</p>
    </div>
  </footer>
 
 
</body>



 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
   const mappings = [
      { checkboxId: 'healthRiderCheckbox', inputId: 'health_rider_count' },
      { checkboxId: 'postalCheckbox', inputId: 'postal_count' },
      { checkboxId: 'volunteerCheckbox', inputId: 'volunteer_count' },
    ];

    mappings.forEach(({ checkboxId, inputId, isOther }) => {
      const checkbox = document.getElementById(checkboxId);
      const input = document.getElementById(inputId);

      if (!checkbox || !input) {
        console.warn(`Missing element: ${checkboxId} or ${inputId}`);
        return;
      }

      // เริ่มต้น: ปิดไว้ก่อน
      if (!isOther) {
        input.disabled = true;
      } else {
        input.classList.add('hidden');
      }

      checkbox.addEventListener('change', () => {
        if (isOther) {
          input.classList.toggle('hidden', !checkbox.checked);
        } else {
          input.disabled = !checkbox.checked;
        }
      });
    });



      gsap.from("#teleform", {
        duration: 1,
        opacity: 0,
        y: 40,
        ease: "power2.out"
      });

      // ... (ส่วน questionMap, setupToggle, setupRadioToggle, setupAppointmentLogic เหมือนเดิม) ...
      const questionMap = {
        "1. ข้อมูลทั่วไป": {
          hospital: "1. โรงพยาบาล",
          his_version: "2. HIS (HosXP) เวอร์ชัน",
          "tools[]": "3. โปรแกรมที่ใช้ในการให้บริการ",
          tool_other_detail: "3. (อื่น ๆ)",
          "service_type[]": "4. รูปแบบการให้บริการ",
        },
        "5. การให้บริการแบบ B2B": {
          b2b_count: "5.1 จำนวนครั้ง (B2B)",
          b2b_partner: "5.2 ระหว่างโรงพยาบาลกับหน่วยบริการใด",
          b2b_partner_other_detail: "5.2 (อื่น ๆ)"
        },
        "6. ให้บริการกับผู้ป่วย": {
          HIV_patient: "6.1 HIV",
          TB_patient: "6.2 TB",
          bed_patient: "6.3 ติดเตียง",
          psychiatry_patient: "6.4 จิตเวช"
        },
        "7. การจ่ายยา": {
          "drug_delivery_type[]": "7. ประเภทการจ่ายยา",
          Health_Rider_count: " Health Rider",
          postal_count: "ไปรษณีย์",
          subdistrictHospitalCheckbox: "ส่งให้ทาง รพ.สต",
          Village_Health_Volunteer_count: "ส่งให้ ทาง อสม.",
          drug_other_detail: "อื่น ๆ"
        },
        "8-10. ระบบนัดหมายออนไลน์": {
          online_appointment_system: "8. มีระบบนัดหมายออนไลน์หรือไม่",
          program_meet: "9. โปรแกรมที่ใช้",
          appointment_count: "10. จำนวนการนัดหมาย"
        },
        "11-12. อื่น ๆ": {
          phr_view_usage: "11. ใช้ PHR View หรือไม่",
          beneficiary_benefits: "12. ประโยชน์ต่อผู้รับบริการ"
        }
      };

      function setupToggle(checkboxId, inputId, options = {}) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);

        if (!checkbox || !input) return;

        const toggle = () => {
          const show = checkbox.checked;
          input.disabled = !show;
          input.classList.toggle("hidden", !show);
          input.required = options.required && show;
          if (!show) input.value = "";
        };

        toggle();
        checkbox.addEventListener("change", toggle);
      }

      function setupRadioToggle(radioId, inputId) {
        const radio = document.getElementById(radioId);
        const input = document.getElementById(inputId);

        const radios = document.querySelectorAll(`input[name="${radio.name}"]`);
        radios.forEach(r => r.addEventListener("change", () => {
          const isSelected = radio.checked;
          input.classList.toggle("hidden", !isSelected);
          input.disabled = !isSelected;
          input.required = isSelected;
          if (!isSelected) input.value = "";
        }));
      }

      // Toggle Fields
      setupToggle("otherCheckbox", "otherTextInput", {
        required: true
      });
      setupToggle("drugOtherCheckbox", "drugOtherDetail", {
        required: true
      });
       setupToggle("b2bOtherRadio", "b2bOtherText", {
        required: true
      });


      setupRadioToggle("b2bOtherRadio", "b2bOtherText");

   

      // Handle form submission
      document.getElementById("teleform").addEventListener("submit", async (e) => {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const rawData = {};

        // เพิ่มข้อมูลจาก input ที่ถูก disabled เข้าไปใน formData ก่อน
        const allInputs = form.querySelectorAll('input, select, textarea');
        allInputs.forEach(input => {
          if (input.name && input.disabled) {
            formData.append(input.name, input.value);
          }
        });

        formData.forEach((value, key) => {
          if (key.endsWith('[]')) {
            key = key.slice(0, -2);
            if (!rawData[key]) rawData[key] = [];
            rawData[key].push(value);
          } else if (rawData[key]) {
            if (!Array.isArray(rawData[key])) rawData[key] = [rawData[key]];
            rawData[key].push(value);
          } else {
            rawData[key] = value;
          }
        });

        let html = '<div style="text-align:left">';
        for (const section in questionMap) {
          html += `<h3 style="color:#047857; border-bottom:1px solid #d1fae5; margin-top:1em;">${section}</h3>`;
          const group = questionMap[section];
          for (const key in group) {
            let actualKey = key;
            if (key.endsWith('[]')) {
              actualKey = key.slice(0, -2);
            }

            if (rawData[actualKey]) {
              let val = Array.isArray(rawData[actualKey]) ? rawData[actualKey].join(", ") : rawData[actualKey];
              if (/_count$/.test(actualKey)) val += " ครั้ง";
              html += `<p><b>${group[key]}:</b> ${val}</p>`;
            }
          }
        }
        html += '</div>';

     const result = await Swal.fire({
  title: "ยืนยันข้อมูลที่กรอก?",
  html: html,
  icon: "info",
  showCancelButton: true,
  confirmButtonText: "ส่งและดาวน์โหลด PDF",
  cancelButtonText: "ยกเลิก",
  customClass: {
    htmlContainer: 'text-left',
    confirmButton: 'bg-blue-600 text-white px-4 py-2 rounded shadow mr-2',
    cancelButton: 'bg-gray-300 text-black px-4 py-2 rounded shadow'
  },
  buttonsStyling: false
});

        if (result.isConfirmed) {
          const now = new Date();

          // *** ส่วนที่แก้ไข: ปรับรูปแบบวันที่เป็น YYYY-MM-DD HH:MM:SS (คริสต์ศักราช) ***
          const year = now.getFullYear();
          const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
          const day = String(now.getDate()).padStart(2, '0');
          const hours = String(now.getHours()).padStart(2, '0');
          const minutes = String(now.getMinutes()).padStart(2, '0');
          const seconds = String(now.getSeconds()).padStart(2, '0');

          const mysqlDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
          // *******************************************************************

          // สำหรับแสดงผลใน PDF (ถ้าต้องการรูปแบบไทย)
          const thDate = now.toLocaleString("th-TH", {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
          });


          let datetimeInput = document.getElementById("datetime");
          if (!datetimeInput) {
            datetimeInput = document.createElement("input");
            datetimeInput.type = "hidden";
            datetimeInput.id = "datetime";
            datetimeInput.name = "datetime";
            form.appendChild(datetimeInput);
          }
          datetimeInput.value = mysqlDateTime; // ใช้ค่าที่แปลงแล้วสำหรับส่งไป PHP
          formData.set('datetime', mysqlDateTime); // อัปเดต formData ด้วย datetime ที่ถูกต้อง

          // สร้าง PDF Blob (ใช้ thDate สำหรับการแสดงผลใน PDF เพราะเป็นภาษาไทย)
          const pdfContainer = document.createElement("div");
          pdfContainer.className = "pdf-wrapper";
          pdfContainer.innerHTML = `<h1>สรุปผลแบบฟอร์ม Telemedicine</h1><h2>วันที่: ${thDate}</h2>` + html; // ใช้ thDate ที่เป็น พ.ศ. แสดงใน PDF

          const pdfBlob = await html2pdf().set({
            margin: 0.5,
            image: {
              type: 'jpeg',
              quality: 0.98
            },
            html2canvas: {
              scale: 2
            },
            jsPDF: {
              unit: 'in',
              format: 'a4',
              orientation: 'portrait'
            }
          }).from(pdfContainer).outputPdf('blob');

          const hosname = rawData.hospital || "ไม่ระบุโรงพยาบาล";
          const datetimeForFilename = mysqlDateTime.replace(/\D/g, "_").replace(/:/g, "-"); // ใช้ mysqlDateTime ในชื่อไฟล์
          const filename = `Telemedicine_${hosname}_${datetimeForFilename}.pdf`;

          const blobUrl = URL.createObjectURL(pdfBlob);
          const link = document.createElement("a");
          link.href = blobUrl;
          link.download = filename;
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
          URL.revokeObjectURL(blobUrl);

          formData.append('pdf_file', pdfBlob, filename);
          
          console.log(formData)

          try {
            const response = await fetch('save_data.php', {
              method: 'POST',
              body: formData
            });

            const data = await response.json();

            if (data.success) {
              Swal.fire('บันทึกสำเร็จ!', data.message, 'success')
                .then(() => {
                  if (data.redirect_to) {
                    window.location.href = data.redirect_to;
                  }
                });
            } else {
              Swal.fire('เกิดข้อผิดพลาด!', data.message, 'error');
            }
          } catch (error) {
            console.error('Error:', error);
            Swal.fire('เกิดข้อผิดพลาดในการเชื่อมต่อ!', 'โปรดลองอีกครั้งในภายหลัง', 'error');
          }
        }
      });
    });
  </script>

  <script>
  feather.replace();
</script>
</html>