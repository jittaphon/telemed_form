SELECT 
'โรคหัวใจ' AS disease_name,
COUNT(DISTINCT p.CID) AS total_persons
FROM t_person_cid AS p 
LEFT JOIN  diagnosis_opd AS di    
ON p.CID = di.CID 
WHERE  
(p.NATION = "099") 
AND (p.DISCHARGE = "9" AND p.DISCHARGE <> '1') 
AND p.SEX = '2' 
AND (LEFT(p.check_vhid,2) = '56') 
AND (p.TYPEAREA in ('1','3')) 
AND (p.age_y BETWEEN '15' and '49') 
AND di.DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
 AND (
       di.DIAGCODE BETWEEN 'i05' AND 'i09'
       OR di.DIAGCODE BETWEEN 'i20' AND 'i25'
       OR di.DIAGCODE BETWEEN 'i26' AND 'i28'
       OR di.DIAGCODE BETWEEN 'i30' AND 'i52'
  )
	
UNION ALL

SELECT 
'โรคไตเรื้อรัง' AS disease_name,
COUNT(DISTINCT p.CID) AS total_persons
FROM t_person_cid AS p 
LEFT JOIN  diagnosis_opd AS di    
ON p.CID = di.CID 
WHERE  
(p.NATION = "099") 
AND (p.DISCHARGE = "9" AND p.DISCHARGE <> '1')  
AND p.SEX = '2' 
AND (LEFT(p.check_vhid,2) = '56') 
AND (p.TYPEAREA in ('1','3')) 
AND (p.age_y BETWEEN '15' and '49') 
AND di.DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
AND di.DIAGCODE = 'N18'

UNION ALL

SELECT 
'SLE' AS disease_name,
COUNT(DISTINCT p.CID) AS total_persons
FROM t_person_cid AS p 
LEFT JOIN  diagnosis_opd AS di    
ON p.CID = di.CID 
WHERE  
(p.NATION = "099") 
AND (p.DISCHARGE = "9" AND p.DISCHARGE <> '1')  
AND p.SEX = '2' 
AND (LEFT(p.check_vhid,2) = '56') 
AND (p.TYPEAREA in ('1','3')) 
AND (p.age_y BETWEEN '15' and '49') 
AND di.DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
AND di.DIAGCODE = 'M321'

UNION ALL

SELECT 
'Thyrotoxicocis' AS disease_name,
COUNT(DISTINCT p.CID) AS total_persons
FROM t_person_cid AS p 
LEFT JOIN  diagnosis_opd AS di    
ON p.CID = di.CID 
WHERE  
(p.NATION = "099") 
AND (p.DISCHARGE = "9" AND p.DISCHARGE <> '1')  
AND p.SEX = '2' 
AND (LEFT(p.check_vhid,2) = '56') 
AND (p.TYPEAREA in ('1','3')) 
AND (p.age_y BETWEEN '15' and '49') 
AND di.DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
AND di.DIAGCODE = 'E05'

UNION ALL

SELECT 
'CHT' AS disease_name,
COUNT(DISTINCT p.CID) AS total_persons
FROM t_person_cid AS p 
LEFT JOIN  diagnosis_opd AS di    
ON p.CID = di.CID 
WHERE  
(p.NATION = "099") 
AND p.SEX = '2' 
AND (p.DISCHARGE = "9" AND p.DISCHARGE <> '1')  
AND (LEFT(p.check_vhid,2) = '56') 
AND (p.TYPEAREA in ('1','3')) 
AND (p.age_y BETWEEN '15' and '49') 
AND di.DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
 AND (
       di.DIAGCODE BETWEEN 'I10' AND 'I15'
       OR di.DIAGCODE BETWEEN 'O10' AND 'O16'

  )

UNION ALL

SELECT 
'DM' AS disease_name,
COUNT(DISTINCT p.CID) AS total_persons
FROM t_person_cid AS p 
LEFT JOIN  diagnosis_opd AS di    
ON p.CID = di.CID 
WHERE  
(p.NATION = "099") 
AND p.SEX = '2' 
AND (p.DISCHARGE = "9" AND p.DISCHARGE <> '1')  
AND (LEFT(p.check_vhid,2) = '56') 
AND (p.TYPEAREA in ('1','3')) 
AND (p.age_y BETWEEN '15' and '49') 
AND di.DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
 AND (
       di.DIAGCODE BETWEEN 'E10' AND 'E14'
       OR di.DIAGCODE = 'O24'
  )
	
UNION ALL

SELECT 
'โรคมะเร็ง' AS disease_name,
COUNT(DISTINCT p.CID) AS total_persons
FROM t_person_cid AS p 
LEFT JOIN  diagnosis_opd AS di    
ON p.CID = di.CID 
WHERE  
(p.NATION = "099") 
AND p.SEX = '2' 
AND (p.DISCHARGE = "9" AND p.DISCHARGE <> '1')  
AND (LEFT(p.check_vhid,2) = '56') 
AND (p.TYPEAREA in ('1','3')) 
AND (p.age_y BETWEEN '15' and '49') 
AND di.DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
 AND (
       di.DIAGCODE BETWEEN 'C00' AND 'C97'
  )
		
UNION ALL

SELECT 
'โรคอายุรกรรมอื่นๆ' AS disease_name,
COUNT(DISTINCT p.CID) AS total_persons
FROM t_person_cid AS p 
LEFT JOIN  diagnosis_opd AS di    
ON p.CID = di.CID 
WHERE  
(p.NATION = "099") 
AND p.SEX = '2' 
AND (p.DISCHARGE = "9" AND p.DISCHARGE <> '1')  
AND (LEFT(p.check_vhid,2) = '56') 
AND (p.TYPEAREA in ('1','3')) 
AND (p.age_y BETWEEN '15' and '49') 
AND di.DATE_SERV BETWEEN '2024-10-01' AND '2025-09-30'
 AND (
       di.DIAGCODE BETWEEN 'B20' AND 'B24'
       OR di.DIAGCODE BETWEEN 'B15' AND 'B19'
       OR di.DIAGCODE BETWEEN 'A51' AND 'A54'
       OR di.DIAGCODE BETWEEN 'A55' AND 'A63'
  )
	