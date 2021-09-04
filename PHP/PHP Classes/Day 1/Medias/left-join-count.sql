SELECT country.name, COUNT(client.name)  
FROM country  
LEFT JOIN client ON client.country_id = country.id  
GROUP BY country.id;  