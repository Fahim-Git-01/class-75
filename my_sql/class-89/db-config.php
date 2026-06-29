<?php

// manufacture


$db = new mysqli('localhost', 'root','','mid');
$sql = 'select count(*) from products';
$sql = 'select count(*) from products where price > 5000';
$sql = 'select sum(price) from products';
$sql = 'select max(price) from products ';
$sql = 'select min(price) from products';
$sql = 'select p.name, m.name, MIN(price) AS low_Price
from products AS p, manufacturers AS m
where m.id = p.manufacture_id;';
$sql = "select avg(price) from products";
$sql = "select avg(price) products_price from products group by manufacture_id ";



// working with student result

$sql = "select max(score) from results";
$sql = "select student_id, max(score) as max_score from results where exam_type='Mid-2' ";
$sql = "select student_id, max(score) as max_score from results where exam_type='Mid-1' ";
$sql = "select r.student_id, max(r.score) max_score , s.full_name from results r, students s where exam_type ='mid-2'";
$sql = "select r.student_id, s.full_name, r.score
from results r, students s
where r.exam_type = 'Mid-2' and r.student_id = s.id and
r.score = (select max(score) from results where exam_type = 'Mid-2')
";

$sql = "select avg(score) from results where exam_type='Mid-1'";
$sql = "select avg(score) from results where exam_type='Mid-2'";

$sql = "select exam_type, avg(score) avg_score from results group by exam_type";




?>

