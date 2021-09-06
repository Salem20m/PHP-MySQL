-- SELECTING All columns in a Table
SELECT * FROM test.movies_titles;
-- Specific columns
SELECT title, year FROM test.movies_titles;

-- LIMIT
SELECT * FROM movies_basic LIMIT 5; -- first five
SELECT * FROM movies_basic LIMIT 0, 5; -- start from row index 0 and select 5 rows
SELECT * FROM movies_basic LIMIT 44, 9999; -- start from row index 45 and select all rows

-- DISTINCT (like unique in python)
SELECT DISTINCT genre FROM movies_basic; -- it will select all unique genres
SELECT DISTINCT genre, studio FROM movies_basic; -- it will select all unique genres/studio combinations

-- AS (to change the output the data)
SELECT title AS 'TITLE', genre AS 'GENRE', release_year AS 'YEAR' FROM movies_basic;

-- ORDER BY (outputs ordered data)
SELECT * FROM movies_basic ORDER BY genre ASC;
SELECT * FROM movies_basic ORDER BY release_year DESC;
SELECT * FROM movies_basic ORDER BY genre, release_year ASC; -- orders by genre first then release_year



-- WHERE (like if statement)
SELECT * FROM movies_basic
    WHERE id <= 3 OR id >= 48;

-- LIKE
SELECT * FROM movies_basic
    WHERE studio LIKE '%Studio%'; -- % is like a placeholder, this will show any studio name that contains with 'Studio'
SELECT * FROM movies_basic
    WHERE release_year LIKE '198_'; -- _ is like a placeholder for one character only, this will return all 1980s movies
SELECT * FROM movies_basic
    WHERE release_year NOT LIKE '19__'; -- NOT LIKE works as !=


SELECT * FROM movies_basic
    WHERE genre = 'Children' AND rating >= 8
    ORDER BY rating DESC;

SELECT * FROM movies_basic
    WHERE LENGTH(title) > 25;


-- IF (only one statement)
SELECT title AS 'Title', IF(rating>6, 'Good', 'Bad') AS 'Rating'
FROM movies_basic;


-- CASE (more than one statement)
SELECT title AS 'Title',
CASE                            -- for rating
    WHEN rating < 5 THEN 'Bad'
    WHEN rating < 8 THEN 'Good'
    ELSE 'Perfect'
END AS 'Rating'
FROM movies_basic;


-- Challenge
SELECT title AS 'Title',
IF(release_year<2000, '20th Century', '21st Century') AS 'Released',
director,
CASE
    WHEN rating <= 5 THEN 'Bad'
    WHEN rating <= 7 THEN 'Decent'
    WHEN rating <  9 THEN 'Good'
    ELSE 'Amazing'
END AS 'Reviews'
FROM movies_basic;