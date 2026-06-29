create database free;

create table manufacture(
    id int auto_increment primary key,
    name varchar(50),
    address varchar (100),
    contact_no varchar (50)
);

create table product(
    id int auto_increment primary key,
    name varchar(50),
    price int(5),
    manufacture_id int(10)
);

insert into manufacture (name, address, contact_no) values("Pran", "Dhaka", "12345");

insert into product (name, price, manufacture_id) values ("Rice", "10000", 1);
insert into product (name, price, manufacture_id) values ("Oil", "15000", 1);
insert into product (name, price, manufacture_id) values ("Water", "7000", 1);
insert into product (name, price, manufacture_id) values ("Suger", "5000", 1);

drop procudure if exists add_addmanufacture;
delimiter //
create procudure add_addmanufacture (pname, paddress, pcontact_no)
begin 
insert into manufacture (name, address, contact_no) values(pname, paddress,pcontact_no);
end //
delimiter ;

create view vw_product as 
select p.*, m.name as mfg 
from product as p.manufactureas m where p.manufacture_id = m.id and p.price >5000;



