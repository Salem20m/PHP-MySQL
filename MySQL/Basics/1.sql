-- creating a database
CREATE DATABASE test;

-- Show all Databases
SHOW DATABASES;

-- Delete a table
DROP TABLE movies_basic;

-- creating a table
create table movies_basic
(
    id int auto_increment,
    title varchar(100) null,
    genre varchar(20) null,
    release_year int null,
    director varchar(40) null,
    studio varchar(40) null,
    critic_rating decimal(2,1) default 0 null,
    constraint movies_basic_pk
        primary key (id)
);

-- ALTER a column
alter table movies_basic alter column critic_rating set default 0;

-- change more than one change in one ALTER
ALTER TABLE movies_basic
    -- ALTER COLUMN critic_rating SET DEFAULT 0,
    ADD COLUMN box_office_gross FLOAT,
    CHANGE COLUMN critic_rating rating decimal(2,1), -- renaming critic_rating TO rating
    CHANGE COLUMN director director VARCHAR(50);

ALTER TABLE movies_basic
    ALTER COLUMN rating SET DEFAULT 0;

-- DELETE a column
ALTER TABLE movies_basic
    DROP COLUMN box_office_gross;



-- CREATING ANOTHER TABLES
CREATE TABLE movies_studios
(
    id int AUTO_INCREMENT PRIMARY KEY,
    studio_name varchar(40) NULL,
    city        varchar(30) NULL
);

CREATE TABLE movies_genre
(
    id int AUTO_INCREMENT PRIMARY KEY,
    genre varchar(30) NULL
);

CREATE TABLE movies_directors
(
    id int AUTO_INCREMENT PRIMARY KEY,
    director_name varchar(30) NULL
);

CREATE TABLE movies_titles
(
    id          int AUTO_INCREMENT
        PRIMARY KEY,
    title       varchar(40) NULL,
    genre_id    int         NULL,
    year        int         NULL,
    director_id int         NULL,
    studio_id   int         NULL,
    CONSTRAINT movies_titles_movies_directors_id_fk
        FOREIGN KEY (director_id) REFERENCES movies_directors (id),
    CONSTRAINT movies_titles_movies_genre_id_fk
        FOREIGN KEY (genre_id) REFERENCES movies_genre (id),
    CONSTRAINT movies_titles_movies_studios_id_fk
        FOREIGN KEY (studio_id) REFERENCES movies_studios (id)
);

CREATE TABLE movies_ratings
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title_id INT NULL,
    rating DECIMAL(2,1) NULL,

    CONSTRAINT movies_ratings_movies_titles_id_fk
        FOREIGN KEY (title_id) REFERENCES movies_titles (id)
);

-- If we want to add the forien keys later
ALTER TABLE movies_ratings
    ADD CONSTRAINT title_id_fk
        FOREIGN KEY (title_id) REFERENCES movies_titles (id)

-- TABLE WITH MOPRE THAN ONE PRIMARY KEY
CREATE TABLE auto_feature
(
    auto_id INT,
    feature_id INT,
    PRIMARY KEY (auto_id, feature_id),
    CONSTRAINT auto_id_fk
        FOREIGN KEY (auto_id) REFERENCES auto (id),
    CONSTRAINT feature_id_fk
        FOREIGN KEY (feature_id) REFERENCES feature (id)
);