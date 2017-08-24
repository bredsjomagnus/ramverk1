-- CREATE DATABASE ramverk1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- show databases;
-- use ramverk1;
-- show tables;

DROP TABLE IF EXISTS ramverk1comments;

CREATE TABLE IF NOT EXISTS ramverk1comments (
     id INT AUTO_INCREMENT NOT NULL,
     created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     username varchar(100) NOT NULL default 'NA',
     email VARCHAR(200) NOT NULL DEFAULT 'na@email.com',
     comm VARCHAR(1000),
      PRIMARY KEY  (id)
  ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
  
  INSERT INTO ramverkcomments (user, comm) VALUES ('Janne Banan', 'åäö rules');
  SELECT * FROM ramverk1comments;