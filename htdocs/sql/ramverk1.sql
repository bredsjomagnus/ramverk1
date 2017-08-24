-- CREATE DATABASE ramverk1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- show databases;
-- use ramverk1;
-- show tables;

-- DROP TABLE IF EXISTS ramverkcomments;

CREATE TABLE IF NOT EXISTS ramverkcomments (
     id INT AUTO_INCREMENT NOT NULL,
     created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     user varchar(100) NOT NULL default 'NA',
     comm VARCHAR(1000),
      PRIMARY KEY  (id)
  ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;