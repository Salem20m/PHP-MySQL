SELECT * FROM movies_basic;

-- RESET AUTO INCREMENT COUNTER, So it start directly from last id
ALTER TABLE movies_basic AUTO_INCREMENT = 1;

-- INSERT --

-- directly without specifying the columns
INSERT INTO movies_basic -- we have to increment the id ourselfs
    VALUES (51, 'Salem In The House', 'Comedy', 2021, 'Salem Alhadrami', 'Reem Studios', 9.9);

-- with specifying the columns, so the id inceremnts automatically
INSERT INTO movies_basic
    (title, genre, release_year, director, studio, rating)
    VALUES ('Salem In The House 2', 'Horror', 2022, 'Salem Alhadrami', 'Reem Studios', 9.3);

-- inserting more than one row
INSERT INTO movies_basic
    (title, genre, release_year, director, studio, rating)
    VALUES ('Salem In The House 3', 'Comedy', 2023, 'Salem Alhadrami', 'Reem Studios', 9.1),
           ('Salem In The House 4', 'Horror', 2024, 'Salem Alhadrami', 'Reem Studios', 9.0);



-- UPDATE --

UPDATE movies_basic SET director = 'Mike Watson' -- Change the name to 'Mike Watson'
    WHERE director = 'Miley Watson';


-- DELETE --
DELETE FROM movies_basic
    WHERE id > 50;