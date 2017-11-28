/**
 * Author:  Flores
 * Created: Nov 27, 2017
 */

-- The code below outlines the dataset in use by PHP throughout the 
use dbstore;

CREATE TABLE customers(
    id int(6) unsigned auto_increment primary key,
    firstName varchar(200) not null,
    lastName varchar(200) not null,
    birthDay date
);

CREATE TABLE categories(
    id int(6) unsigned auto_increment primary key,
    cName varchar(200) not null
);

CREATE TABLE products(
    id int(6) unsigned auto_increment primary key,
    categoryId int(6) unsigned,
    pName varchar(200) not null,
    productRelease date
);

ALTER TABLE products
    ADD CONSTRAINT cate_prod FOREIGN KEY
    products(categoryId) 
    REFERENCES categories(id)
    ON UPDATE CASCADE;

CREATE TABLE helpinfo (
    id int(6) unsigned auto_increment primary key,
    info TEXT
);