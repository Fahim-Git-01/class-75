drop database if exists abc;
create database abc;

drop table if exists teacher;
create table teacher(
    id auto_incremet primary key,
    name varchar(50),
    qulification varchar(50),
    contact_no varchar(20)
);

insert into teacher (name, qulification, contact_no) value ("Masum", "MBA", "123456");
insert into teacher (name, qulification, contact_no) value ("Mursalin", "MBA", "78646565");
insert into teacher (name, qulification, contact_no) value ("Rion", "MBA", "324676");

drop table if exists course;
create table course(
    id auto_incremet primary key,
    course_name varchar(50),
    fee int(6),
    teacher_id int(10)
);

insert into course (course_name, fee, teacher_id) value("Accounting", "30000", 1);
insert into course (course_name, fee, teacher_id) value("Marketing", "40000", 2);
insert into course (course_name, fee, teacher_id) value("English", "50000", 3);
insert into course (course_name, fee, teacher_id) value("Bangal", "20000", 1);
insert into course (course_name, fee, teacher_id) value("Computer", "15000", 2);
insert into course (course_name, fee, teacher_id) value("Management", "70000", 3);

drop PROCEDURE  if exists addteacher;
delimiter //
create PROCEDURE  addteacher(t_name varchar(50), t_qulification varchar(50), t_contact_no varchar(20))
begin
insert into teacher (name, qulification, contact_no) values (t_name, t_qulification, t_contact_no);
end //
delimiter ;


drop view if exists vw_course;
create view vw_course as
select * from 












