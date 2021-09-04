SELECT am.name  
FROM auto a  
INNER JOIN manufacturer am  
ON a.manufacturer_id = am.id  
WHERE a.id = 12;  
