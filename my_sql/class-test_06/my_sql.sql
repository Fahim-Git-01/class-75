-- creating table
create DATABASE my_new_db

use my_new_db;

create table manufacture(
    id int auto_increment primary key,
    name VARCHAR(50),
    address VARCHAR(100),
    contact_no VARCHAR(50)
);

show tables;
INSERT INTO manufacture(name, address, contact_no)
 VALUES('abc', 'Dhaka', '123'),
 ('def', 'ctg', '456'),
 ('ghj', 'rj', '789');

 
CREATE table product (
id int auto_increment primary key,
name VARCHAR(50),
price int(5),
manufacture_id int(10)
);

show tables;

DROP PROCEDURE IF EXISTS add_manufacture;
DELIMITER ??
CREATE PROCEDURE add_manufacture(pname VARCHAR(50), paddress VARCHAR(50), pcontact VARCHAR(50))
BEGIN
INSERT INTO manufacturer (name,address,contact_no) VALUES (pname, paddress, pcontact);
END ??
DELIMITER ;

call add_manufacture;


DROP TRIGGER IF EXISTS tri_manufacture;
CREATE TRIGGER tri_manufacture 
AFTER DELETE ON manufacturer
FOR EACH ROW
DELETE FROM product WHERE manufacturer_id= old.id;


DROP view if EXISTS vw_product;
create view vw_product
