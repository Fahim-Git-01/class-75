-- trigger
drop table student_logs;
create table if not exists student_logs(
id int unsigned  auto_increment primary key,
student_id int,
status varchar(20),
time timestamp
);


drop trigger if exists add_student;
create trigger add_student
after insert on students
for each row 
insert into student_logs(student_id, status, time)
values(new.id,"Added", Now());

insert into students(full_name,email)
values("Masum", "masum@gmail.com");

-- After update

create trigger update_student
after update on students
for each row
insert into student_logs
(student_id, status, time)
values(old.id, "Updated", now());

drop trigger if exists remove_student;
create trigger remove_student
after delete on students
for each row
insert into student_logs(student_id, status, time)
values(old.id, 'deleted', now());

update students
set full_name ="Raju"
where id =7;


delete from students where id=1;

