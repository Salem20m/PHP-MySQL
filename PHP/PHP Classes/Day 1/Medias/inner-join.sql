SELECT client.name, country.name  
FROM client
INNER JOIN country on client.country_id = country.id;  