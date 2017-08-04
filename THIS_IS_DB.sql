CREATE TABLE IF NOT EXISTS users(
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	login VARCHAR(50) NOT NULL,
	email VARCHAR(150) NOT NULL,
	password VARCHAR(150) NOT NULL
	is_admin TINYINT DEFAULT 0,
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS posts(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    description TEXT DEFAULT NULL,
    cover_img VARCHAR(200) DEFAULT NULL,
    youtube_url VARCHAR(300) DEFAULT NULL,
    admin_id INT(11) NOT NULL,
    is_result TINYINT DEFAULT 0,
    FOREIGN KEY(admin_id) REFERENCES admins.id    
);

CREATE TABLE IF NOT EXISTS coaches(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    surname VARCHAR(200) NOT NULL,
    name VARCHAR(200) NOT NULL,
    last_name VARCHAR(200) NOT NULL,
    description TEXT DEFAULT NULL,
    photo VARCHAR(200) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS athletes(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    surname VARCHAR(200) NOT NULL,
    name VARCHAR(200) NOT NULL,
    description TEXT DEFAULT NULL,
    photo VARCHAR(200) DEFAULT NULL
);