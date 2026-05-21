-------  create database-----

drop database if exists company;
create database if not exists company;
use company;

show databases;


------- create table(posiitions)-----
drop table if exists positions;
create table positions(
    id int primary key auto_increment,
    position_name varchar(120)
);

show tables;


-------samlple records -------
insert into positions (position_name)
values ("Managing Director"), ("Secretary"), ("Cashier"), ("Representative");

select * from positions;



------- 2.3 create table(employees)-----
drop table if exists employees;
create table employees(
    id int primary key auto_increment,
    name varchar(120),
    position_id int unsigned,
    salary float,
    hire_date datetime
);

show tables;


---------- employees records------------

insert into employees (name,position_id,salary,hire_date)
values
("fahim",1 , 3000.00 ,2013-06-15),
("ruksana",2,2300.00,2014-01-10),
("Sakib",3,5200.00,2022-11-01),
("masum",4,3700.00,2025-09-20),
("hridoy",1,2600.00,2020-02-05),
("adib",2,1800.00,2026-07-12),
("chowa",3,3050.00,2019-03-01),
("Eva",4,2400.00,2016-04-18);

select * from employees;

---------- salary less than 3000------
 select * from employees where salary < 3000;
 
 select * from positions;

update positions set position_name = "officer" where id=3;

select * from positions;

delete from employees where id=5;

select * from employees;

-- Creating a view named employee_summary
DROP VIEW IF EXISTS employee_summary;
CREATE VIEW employee_summary as 
SELECT e.name employee_name, p.position_name, e.salary 
FROM positions p, employees e 
WHERE e.position_id = p.id;

SELECT * FROM employee_summary;

-- Writing a stored procedure named GetEmployeeByPosition 
DROP PROCEDURE IF EXISTS GetEmployeeByPosition;

DELIMITER ??
CREATE PROCEDURE GetEmployeeByPosition(p_positon_name VARCHAR(100))
BEGIN
SELECT * FROM employee_summary WHERE position_name = p_positon_name;
END ??
DELIMITER ;

CALL GetEmployeeByPosition("officer");

-- Create an audit table named employee_log
DROP TABLE IF EXISTS employee_log;
CREATE TABLE employee_log(
    log_id INT PRIMARY KEY AUTO_INCREMENT,
    employee_id INT,
    action VARCHAR(50),
    action_time TIMESTAMP
);

DESC employee_log;

--  Writing trigger
DROP TRIGGER IF EXISTS employee_status_update;

CREATE TRIGGER employee_status_update 
AFTER INSERT ON employees
FOR EACH ROW
INSERT INTO employee_log (employee_id,action,action_time) VALUES
(new.id, "INSERT", now());

SHOW TRIGGERS;
INSERT INTO employees (name,position_id,salary,hire_date) VALUES
("Bruce Wayne ",1 , 5000.00 ,2023-07-15);

SELECT * FROM employees;