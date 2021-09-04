ALTER TABLE Client
ADD FOREIGN KEY (country_id)
REFERENCES country(id)
