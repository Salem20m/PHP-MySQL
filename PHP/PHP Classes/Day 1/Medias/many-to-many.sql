SELECT f.name  
FROM feature f  
INNER JOIN auto_feature af  
ON f.id = af. feature_id  
WHERE af.auto_id = 7;  