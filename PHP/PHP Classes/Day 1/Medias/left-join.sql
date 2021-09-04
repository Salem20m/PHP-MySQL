SELECT client.name, country.name
FROM client
LEFT JOIN country ON client.country_id = country.id;