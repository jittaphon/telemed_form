/*โรคมะเร็งจะอยู่ในกลุ่ม C00 ถึง C97 ที่ผมจอใน database ของ HDC Of Pyo*/ 
/*
----------------------------ปอด-----------------------------------
C34 = มะเร็งปอด (Malignant neoplasm of bronchus and lung)
C34	มะเร็งปอด (รวมทุกตำแหน่ง)
----C34.0	หลอดลมและปอด (ส่วนบนของปอดขวา/ซ้าย)
----C34.1	ปอดกลีบกลาง
----C34.2	ปอดกลีบล่าง
----C34.3	ปอดกลีบอื่น ๆ
----C34.8	ปอดหลายตำแหน่ง (multi-site)
----C34.9	ไม่ระบุรายละเอียดตำแหน่ง (unspecified)

C38 = ????? ****** ไม่เจอใน database = ไม่มีโรคนี้

C78 มะเร็งแพร่กระจาย (Secondary) เช่น มะเร็งเต้านมลามไปปอด = C78.0
----C78.0	Secondary malignant neoplasm of lung
----C78.6	Secondary malignant neoplasm of retroperitoneum and peritoneum
-------------------------------------------------------------------------------------------

----------------------------ผิวหนัง--------------------------------------

C43 มะเร็งผิวหนัง (Malignant melanoma of skin) ****** ไม่เจอใน database = ไม่มีโรคนี้

-------------------------------------------------------------------------------------------

------------------------------กระเพระาปัสสวะ------------------------------------

C67 กระเพาะปัสสาวะ 

----C67.3 — ผนังด้านหน้า (anterior wall)
----C67.9 — ไม่ระบุตำแหน่ง (unspecified)


---------------------------------มะเร็งลำใส้ใหญ่ + ไส้ตรง ---------------------------------

C18: รหัสหลักของ มะเร็งลำไส้ใหญ่ (Malignant neoplasm of colon)
C18.2: มะเร็งลำไส้ใหญ่ส่วนขึ้น (Ascending colon)
C18.4: มะเร็งลำไส้ใหญ่ส่วนขวาง (Transverse colon)
C18.7: มะเร็งลำไส้ใหญ่ส่วน S-shape (Sigmoid colon)
C18.9: มะเร็งลำไส้ใหญ่ไม่ระบุตำแหน่ง (Colon, unspecified)

C19 ****** ไม่เจอใน database = ไม่มีโรคนี้

C20 (มะเร็งลำไส้ตรง)

C21.1 รหัสหลักของ มะเร็งของช่องทวารหนัก (Malignant neoplasm of anal canal)


---------------------------------ไต ---------------------------------


C64: มะเร็งไต (Malignant neoplasm of kidney, except renal pelvis)




------------------ Query to count patients with C64 in chronic table ------------------
%%sql
SELECT c.CHRONIC, p.SEX, COUNT(DISTINCT c.PID) AS patient_count
FROM chronic c
LEFT JOIN person p ON c.PID = p.PID
WHERE c.CHRONIC LIKE 'C64%'
  AND p.NATION = '099'
  AND p.TYPEAREA IN ('1','3')
  AND p.DISCHARGE = '9'
GROUP BY c.CHRONIC, p.SEX;

C64	1	2
C64	2	2

*******************************************************
Check PID ซ้ำ ตาม ด้วยโรคที่ต้องการหา
%%sql
SELECT c.PID, COUNT(*) as record_count
FROM chronic c
WHERE c.CHRONIC LIKE 'C64%'
GROUP BY c.PID
HAVING COUNT(*) > 0;
****************หา PID ที่มีรหัส C64% มากกว่า 1 รายการ




%%sql
SELECT c.PID, c.CHRONIC, p.SEX, p.NATION, p.TYPEAREA, p.DISCHARGE
FROM chronic c
LEFT JOIN person p ON c.PID = p.PID
WHERE c.CHRONIC LIKE 'C64%'
  AND p.NATION = '099'
  AND p.TYPEAREA IN ('1','3')
  AND p.DISCHARGE = '9'
  AND p.SEX = '2'
ORDER BY c.PID;



%%sql
SELECT c.PID, COUNT(*) as row_count
FROM chronic c
LEFT JOIN person p ON c.PID = p.PID
WHERE c.CHRONIC LIKE 'C64%'
  AND p.NATION = '099'
  AND p.TYPEAREA IN ('1','3')
  AND p.DISCHARGE = '9'
GROUP BY c.PID
HAVING COUNT(*) > 1;


%%sql
SELECT c.PID, c.CHRONIC, p.SEX, p.NATION, p.TYPEAREA, p.DISCHARGE
FROM chronic c
LEFT JOIN person p ON c.PID = p.PID
WHERE c.CHRONIC LIKE 'C64%'
  AND p.NATION = '099'
  AND p.TYPEAREA IN ('1','3')
  AND p.DISCHARGE = '9'
ORDER BY c.PID;


*/


