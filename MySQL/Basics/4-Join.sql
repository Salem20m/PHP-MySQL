-- Inner join: Will return things that are common between both tables

-- Outer join: Will select all data in 1st table, and only matching data in the second table
--              wil return null if there is no matching data.


-- INNER
SELECT movies_titles.title , movies_studios.studio_name
FROM movies_titles
    INNER JOIN movies_studios
    ON movies_titles.studio_id = movies_studios.id;


SELECT movies_titles.title , movies_studios.studio_name, movies_ratings.rating
FROM movies_titles
    INNER JOIN movies_studios
        ON movies_titles.studio_id = movies_studios.id
    INNER JOIN movies_ratings
        ON movies_titles.id = movies_ratings.title_id
ORDER BY movies_titles.title;



-- OUTER
SELECT movies_titles.title, movies_ratings.rating, movies_posters.poster_name, movies_posters.resolution
FROM movies_titles
    INNER JOIN movies_ratings -- because we only want the rows that have both titles and a rating
    ON movies_titles.director_id = movies_ratings.id
    LEFT OUTER JOIN movies_posters -- This will return all the movies and will show null in the poster name for a missing film
    ON movies_titles.id = movies_posters.title_id;
-- If we used RIGHT OUTER JOIN / INNER JOIN: Only rows that have both a poster and a title will show


-- Challenge: select the best 5 films
SELECT movies_titles.title, movies_directors.director_name, movies_ratings.rating, movies_posters.poster_name
FROM movies_titles
    INNER JOIN movies_directors ON movies_titles.director_id = movies_directors.id
    INNER JOIN movies_ratings ON movies_titles.id = movies_ratings.title_id
    LEFT OUTER JOIN movies_posters ON movies_titles.id = movies_posters.title_id
ORDER BY rating DESC LIMIT 5;

SELECT * FROM movies_basic ORDER BY id DESC;