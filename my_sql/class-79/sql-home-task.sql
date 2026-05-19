drop database if exists inventory_system;

create database inventory_system;
use inventory_system;
CREATE TABLE brands (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
);
insert into brands(name) values('Apple');
insert into brands(name) values('samsung');
insert into brands(name) values('techno');


CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
);
insert into categories(name) values("Mobile"),("Smart Watch"),("Laptop");

create table products (
    id int auto_increment primary key,
   name varchar(100),
   brand_id int,
   category_id int,
   price float,
   is_active tinyint
);
insert into products (name,brand_id,category_id,price,is_active)
 values("iphone 14", 1, 1, 800,1),
 ("samsung", 2, 1, 600,1),
 ("iphone 14", 3, 2, 300,1),
 ("iphone 14", 1, 3, 2000,1),
 ("iphone 14", 2, 2, 400,1);

 drop view if exists vw_active_products;

 create view vw_active_products as 
 select p.id, p.name , b.name as brand, c.name as category, p.price
 from products p, brands b , categories c
 where p.brand_id=b.id and p.category_id=c.id and p.is_active=1;

 select * from vw_active_products where price > 1000;
 select * from vw_active_products where price > 500;

select * from vw_active_products where category = "Mobile" and brand = "Apple";

select * from vw_active_products where price > 500 and price < 1500;
select * from vw_active_products where category = "Smart Watch" and brand = "Samsung";

