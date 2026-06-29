DROP DATABASE if exists mid;
create DATABASE mid;

create table manufacturers (
  id int primary key auto_increment,
  name varchar(50),
  address varchar(100),
  contact_no varchar(50)
);

drop table if exists products;
create table products (
  id int primary key auto_increment,
  name varchar(50),
  price varchar(5),
  manufacture_id int(10)
);

insert into manufacturers (name, address, contact_no) values ("HP", "USA", "09865432");
insert into manufacturers (name, address, contact_no) values ("Dell", "USA", "09876543");


insert into products (name, price, manufacture_id) values ("Laptop", "10000", 1);
insert into products (name, price, manufacture_id) values ("Desktop", "15000", 6);
insert into products (name, price, manufacture_id) values ("Tablet", "5000", 6);
insert into products (name, price, manufacture_id) values ("Monitor", "3000", 1);
insert into products (name, price, manufacture_id) values ("Printer", "2000", 1);
insert into products (name, price, manufacture_id) values ("Camera", "7000", 6);



drop procedure if exists addManufacture;
delimiter //
create procedure addManufacture(pname varchar(50), paddress varchar(50), pcontact_no varchar(50))
begin
insert into manufacturers (name, address, contact_no) values (pname, paddress, pcontact_no);
end//
delimiter ;


drop view if exists vw_product;
create view vw_product as
select p. *, m.name as mfg
 from products as p, manufacturers as m
 where p.manufacture_id = m.id and p.price > 5000;

 drop trigger if exists delete_mfg;
 create trigger delete_mfg
 after delete on manufacturers
 for each row
 delete from products where manufacture_id = old.id;
