CREATE TABLE IF NOT EXISTS booking (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, date VARCHAR(64) NOT NULL, status INT(2) NOT NULL, fullName VARCHAR(128) NOT NULL, emailAddress VARCHAR(128) NOT NULL, phoneNumber VARCHAR(128) NOT NULL, inqury VARCHAR(128) NOT NULL);