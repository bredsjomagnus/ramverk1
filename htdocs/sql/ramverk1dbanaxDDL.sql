-- show databases;
-- CREATE DATABASE ramverk1dbanax CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use ramverk1dbanax;
DROP TABLE IF EXISTS RVDBaccounts;
CREATE TABLE IF NOT EXISTS RVDBaccounts 
(
id int(5) auto_increment primary key,
active char(5) default 'yes',
role char(20) not null,
username varchar(20) not null unique,
pass char(100) not null,
firstname char(20) not null,
surname char(20) not null,
email varchar(50) not null,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated TIMESTAMP NULL,
deleted TIMESTAMP NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

