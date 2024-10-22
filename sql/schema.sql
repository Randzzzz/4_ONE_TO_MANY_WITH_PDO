CREATE TABLE artist_records (
    artist_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    stage_name VARCHAR (50),
    gender VARCHAR (50),
    email VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE music_records (
    music_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR (50),
    genre VARCHAR (50),
    date_release VARCHAR (50),
    country_area VARCHAR (50),
    artist_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);