use round_70a;

drop table if exists manufactures;
create table manufactures(
    id int auto_increment primary key,
    name varchar(100),
    address varchar(255)
);

drop table if exists products;
create table products(
    id int auto_increment primary key,
    name varchar(100),
    manufactures_id int,
    price float
);

insert into manufactures(name, address) values("HP", "USA");
insert into manufactures(name, address) values("DELL", "UK");

insert into products(name, manufactures_id, price) values("Mouse", 1, 800);
insert into products(name, manufactures_id, price) values("Monitor", 1, 11000 );
insert into products(name, manufactures_id, price) values("Mouse", 2, 29900);
insert into products(name, manufactures_id, price) values("Speaker", 1, 800);
insert into products(name, manufactures_id, price) values("Sound BOx", 2, 800);

drop procedure if exists createManufacturer;
DELIMITER //
create procedure createManufacturer(pname varchar(100), paddress varchar(255))
begin 
insert into  manufactures(name, address) values (pname, paddress);
end //
DELIMITER ;


drop view if exists vw_product_list;
create view vw_product_list as 
select p.*, m.name as mfg  from products as p , manufactures as m where p. manufactures_id = m.id and p.price > 5000;


create trigger after delete product delete
after delete on manufactures
for each row 
begin
delete from products where manufactures_id = old.id;