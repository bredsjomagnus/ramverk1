-- CREATE DATABASE ramverk1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
show databases;
use ramverk1;
-- show tables;

-- DROP TABLE IF EXISTS ramverk1comments;
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
  -- SELECT * FROM ramverk1comments;
  SELECT * FROM ramverk1accounts;
  -- UPDATE ramverk1accounts SET active = 'yes' WHERE id = 1;
-- UPDATE ramverk1accounts SET role = 'admin' WHERE id = 1;

-- ALTER TABLE ramverk1accounts
-- ADD COLUMN address varchar(100) AFTER surname;
-- ADD COLUMN phone varchar(50) AFTER postnumber,
-- ADD COLUMN mobile varchar(50) AFTER phone,
-- ADD COLUMN city varchar(100) AFTER mobile,
-- ADD COLUMN inlogged TIMESTAMP NULL AFTER city,
-- ADD COLUMN notes varchar(10000) AFTER inlogged;

-- CREATE TABLE IF NOT EXISTS smarisaccounts 
-- (
-- id int(5) auto_increment primary key,
-- active char(5) default 'yes',
-- role char(20) not null,
-- username varchar(20) not null unique,
-- pass char(100) not null,
-- firstname char(20) not null,
-- surname char(20) not null,
-- address varchar(100),
-- email varchar(50) not null unique,
-- postnumber varchar(50),
-- phone varchar(50),
-- mobile varchar(50),
-- city varchar(100),
-- inlogged TIMESTAMP NULL,
-- notes varchar(10000),
-- created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;