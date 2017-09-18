-- CREATE DATABASE ramverk1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- show databases;
use ramverk1;
-- show tables;

DROP TABLE IF EXISTS ramverk1comments;
-- DROP TABLE IF EXISTS ramverk1accounts;

CREATE TABLE IF NOT EXISTS ramverk1comments (
     id INT AUTO_INCREMENT NOT NULL,
     created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     edited TIMESTAMP NULL,
     username varchar(100) NOT NULL default 'NA',
     email VARCHAR(200) NOT NULL DEFAULT 'na@email.com',
     comm VARCHAR(100000),
     likes VARCHAR(1000) DEFAULT '',
      PRIMARY KEY  (id)
  ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS ramverk1accounts
(
id int(5) auto_increment primary key,
active char(5) default 'yes',
role char(20) not null,
username varchar(20) not null unique,
pass char(100) not null,
forname char(20) not null,
surname char(20) not null,
email varchar(50) not null,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


-- INSERT INTO ramverkcomments (user, comm) VALUES ('Janne Banan', 'åäö rules');
--  SELECT * FROM ramverk1comments;
 -- SELECT * FROM ramverk1accounts;
  -- UPDATE ramverk1accounts SET active = 'yes' WHERE id = 1;
-- UPDATE ramverk1accounts SET role = 'admin' WHERE id = 5;
