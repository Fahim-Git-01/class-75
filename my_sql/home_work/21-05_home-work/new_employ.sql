drop database if exists employe;
create database if not exists employe;
show databases;

use employe;

drop table if not exists posiitions;
create table posiitions(
    id in primary key auto_increment
    position_name VARCHAR (120)
);

show tables;

insert into posiitions (position_name)
value ("Managing Director"), ("Secretary"), ("Cashier"), ("Representive");

select * from posiitions;

drop table if not exists employees;
create table employees(
    id int primary key auto_increment,
    name varchar (33)
    position_id int unsigned,
    salary float,
    hire_date hire_date
);

show tables;

insert into employees(name, position_id, salary, hire_date)
values
("fahim", 1, 30000, 2013-06-15),
("masum", 2, 40000, 2013-9-23),
("Rion", 3, 50000, 2013i-3-23);

select * from employees;

select * from employees where salary > 40000;

select * from position;
 