SELECT 'โรคหัวใจ' As disease_name ,COUNT(DISTINCT w.CID) AS count
FROM women AS w
LEFT JOIN t_person_cid AS t ON t.CID = w.CID
INNER JOIN (
    SELECT CID, MAX(DATE_SERV) AS last_diagnosis_date
    FROM diagnosis_opd 
    WHERE DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
        AND (
           DIAGCODE BETWEEN 'i05' AND 'i09'  -- โรคหัวใจที่เกี่ยวข้อง
           OR DIAGCODE BETWEEN 'i20' AND 'i25'
           OR DIAGCODE BETWEEN 'i26' AND 'i28'
           OR DIAGCODE BETWEEN 'i30' AND 'i52'
        )
    GROUP BY CID
) AS d ON d.CID = w.CID
WHERE w.FPTYPE IN ('1', '2', '3', '4', '5', '6', '7')
AND t.NATION = "099"
AND t.DISCHARGE = "9" AND t.DISCHARGE <> "1"
AND t.SEX = "2"
AND LEFT(t.check_vhid,2) = "56"
AND t.TYPEAREA IN ('1','3')
AND t.age_y BETWEEN "15" AND "49"

UNION ALL

SELECT 'โรคไตเรื้อรัง' As disease_name ,COUNT(DISTINCT w.CID) AS count
FROM women AS w
LEFT JOIN t_person_cid AS t ON t.CID = w.CID
INNER JOIN (
    SELECT CID, MAX(DATE_SERV) AS last_diagnosis_date
    FROM diagnosis_opd 
    WHERE DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
		AND DIAGCODE = 'N18'
    GROUP BY CID
) AS d ON d.CID = w.CID
WHERE w.FPTYPE IN ('1', '2', '3', '4', '5', '6', '7')
AND t.NATION = "099"
AND t.DISCHARGE = "9" AND t.DISCHARGE <> "1"
AND t.SEX = "2"
AND LEFT(t.check_vhid,2) = "56"
AND t.TYPEAREA IN ('1','3')
AND t.age_y BETWEEN "15" AND "49"

UNION ALL

SELECT 'SLE' As disease_name ,COUNT(DISTINCT w.CID) AS count
FROM women AS w
LEFT JOIN t_person_cid AS t ON t.CID = w.CID
INNER JOIN (
    SELECT CID, MAX(DATE_SERV) AS last_diagnosis_date
    FROM diagnosis_opd 
    WHERE DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
	  AND DIAGCODE = 'M321'
    GROUP BY CID
) AS d ON d.CID = w.CID
WHERE w.FPTYPE IN ('1', '2', '3', '4', '5', '6', '7')
AND t.NATION = "099"
AND t.DISCHARGE = "9" AND t.DISCHARGE <> "1"
AND t.SEX = "2"
AND LEFT(t.check_vhid,2) = "56"
AND t.TYPEAREA IN ('1','3')
AND t.age_y BETWEEN "15" AND "49"



UNION ALL

SELECT 'Thyrotoxicocis' As disease_name ,COUNT(DISTINCT w.CID) AS count
FROM women AS w
LEFT JOIN t_person_cid AS t ON t.CID = w.CID
INNER JOIN (
    SELECT CID, MAX(DATE_SERV) AS last_diagnosis_date
    FROM diagnosis_opd 
    WHERE DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
	   AND DIAGCODE = 'E05'
    GROUP BY CID
) AS d ON d.CID = w.CID
WHERE w.FPTYPE IN ('1', '2', '3', '4', '5', '6', '7')
AND t.NATION = "099"
AND t.DISCHARGE = "9" AND t.DISCHARGE <> "1"
AND t.SEX = "2"
AND LEFT(t.check_vhid,2) = "56"
AND t.TYPEAREA IN ('1','3')
AND t.age_y BETWEEN "15" AND "49"



UNION ALL

SELECT 'CHT' As disease_name ,COUNT(DISTINCT w.CID) AS count
FROM women AS w
LEFT JOIN t_person_cid AS t ON t.CID = w.CID
INNER JOIN (
    SELECT CID, MAX(DATE_SERV) AS last_diagnosis_date
    FROM diagnosis_opd 
    WHERE DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
		 AND (
       DIAGCODE BETWEEN 'I10' AND 'I15'
       OR DIAGCODE BETWEEN 'O10' AND 'O16'

  )
    GROUP BY CID
) AS d ON d.CID = w.CID
WHERE w.FPTYPE IN ('1', '2', '3', '4', '5', '6', '7')
AND t.NATION = "099"
AND t.DISCHARGE = "9" AND t.DISCHARGE <> "1"
AND t.SEX = "2"
AND LEFT(t.check_vhid,2) = "56"
AND t.TYPEAREA IN ('1','3')
AND t.age_y BETWEEN "15" AND "49"




UNION ALL

SELECT 'DM' As disease_name ,COUNT(DISTINCT w.CID) AS count
FROM women AS w
LEFT JOIN t_person_cid AS t ON t.CID = w.CID
INNER JOIN (
    SELECT CID, MAX(DATE_SERV) AS last_diagnosis_date
    FROM diagnosis_opd 
    WHERE DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
	AND (
       DIAGCODE BETWEEN 'E10' AND 'E14'
       OR DIAGCODE = 'O24'
  )
	
    GROUP BY CID
) AS d ON d.CID = w.CID
WHERE w.FPTYPE IN ('1', '2', '3', '4', '5', '6', '7')
AND t.NATION = "099"
AND t.DISCHARGE = "9" AND t.DISCHARGE <> "1"
AND t.SEX = "2"
AND LEFT(t.check_vhid,2) = "56"
AND t.TYPEAREA IN ('1','3')
AND t.age_y BETWEEN "15" AND "49"




UNION ALL

SELECT 'โรคมะเร็ง' As disease_name ,COUNT(DISTINCT w.CID) AS count
FROM women AS w
LEFT JOIN t_person_cid AS t ON t.CID = w.CID
INNER JOIN (
    SELECT CID, MAX(DATE_SERV) AS last_diagnosis_date
    FROM diagnosis_opd 
    WHERE DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
		AND (
       DIAGCODE BETWEEN 'C00' AND 'C97'
  )
    GROUP BY CID
) AS d ON d.CID = w.CID
WHERE w.FPTYPE IN ('1', '2', '3', '4', '5', '6', '7')
AND t.NATION = "099"
AND t.DISCHARGE = "9" AND t.DISCHARGE <> "1"
AND t.SEX = "2"
AND LEFT(t.check_vhid,2) = "56"
AND t.TYPEAREA IN ('1','3')
AND t.age_y BETWEEN "15" AND "49"


UNION ALL

SELECT 'โรคอายุรกรรมอื่นๆ' As disease_name ,COUNT(DISTINCT w.CID) AS count
FROM women AS w
LEFT JOIN t_person_cid AS t ON t.CID = w.CID
INNER JOIN (
    SELECT CID, MAX(DATE_SERV) AS last_diagnosis_date
    FROM diagnosis_opd 
    WHERE DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
		 AND (
       DIAGCODE BETWEEN 'B20' AND 'B24'
       OR DIAGCODE BETWEEN 'B15' AND 'B19'
       OR DIAGCODE BETWEEN 'A51' AND 'A54'
       OR DIAGCODE BETWEEN 'A55' AND 'A63'
  )
    GROUP BY CID
) AS d ON d.CID = w.CID
WHERE w.FPTYPE IN ('1', '2', '3', '4', '5', '6', '7')
AND t.NATION = "099"
AND t.DISCHARGE = "9" AND t.DISCHARGE <> "1"
AND t.SEX = "2"
AND LEFT(t.check_vhid,2) = "56"
AND t.TYPEAREA IN ('1','3')
AND t.age_y BETWEEN "15" AND "49"



