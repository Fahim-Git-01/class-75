drop database if exists home_task;
create database home_task;
use home_task;

create table brands(
    id int auto_increment primary key,
    name varchar(100)
);
insert into brands(name) values("Apple"), ("Samsung"), ("Tecno");


create table categories(
    id int auto_increment primary key,
    name varchar(100)
);
insert into categories(name) values("Mobile"), ("Smart Watch"), ("Laptop");


create table products(
    id int auto_increment primary key,
    name varchar(100),
    brand_id int,
    category_id int,
    price float,
    is_active tinyint
);

insert into products(name,brand_id,category_id,price,is_active) 
values("iPhone 14",1,1,1000,1),
("Samsung Galaxy S22",2,1,800,1),
("Techno X2",3,2,600,1),
("Smart Watch 2",1,2,300,1),
("Laptop 2",1,3,2000,1),
("Smart Watch 3",2,2,400,1);

drop view if exists vw_active_products;
create view vw_active_products as select p.id, p.name, b.name as brands, c.name as categories, p.price 
from products p, brands b, categories c 
where p.brand_id=b.id and p.category_id=c.id and p.is_active=1;

select * from vw_active_products where price > 1000;
select * from vw_active_products where categories="Mobile" and brand="Apple";

select * from vw_active_products where categories="Mobile" and price > 500 and price < 1500;


create table if not exists brand_logs(
    id int unsigned auto_increment primary key,
    brand_id int,
    status varchar(20),
    time timestamp
);

drop trigger if exists delete_brands;
create trigger delete_brands
after delete on brands
for each row
insert into brand_logs(brand_id, status, time)
value(old.id, "Delete", now());

-- if delete with brands name
delete from brands where brands.name="Apple";

-- if delete with products id  
delete from products where brand_id = old.id;
delete from brands where id =2;

select * from brand_logs;
select * from vw_active_products;

drop trigger if exists update_active;
create trigger update_active
after delete on categories
for each row 
update products set is_active = 0 where category_id = old.id;

delete from categories where id =3;