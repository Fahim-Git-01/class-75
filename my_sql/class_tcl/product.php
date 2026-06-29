<?php
require_once 'config.php';
$query = "
select p. *, m.name as mfg
 from products as p, manufacturers as m
 where p.manufacture_id = m.id
";

$result_a = $sql->query($query);
$row = $result_a->fetch_all(MYSQLI_ASSOC);


$result_view = $sql->query("select * from vw_product");
$rows_view = $result_view->fetch_all(MYSQLI_ASSOC);





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
</head>
<body>
    
    <h3>Product view (More than 5000 tk)</h3>
   <table border="1" width="500" cellspacing="0" cellpadding="5">
       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Price</th>
           <th>Mfg</th>
       </tr>
       <?php foreach($rows_view as $item) : ?>
       <tr>
           <td><?=$item['id']?></td>
           <td><?=$item['name']?></td>
           <td><?=$item['price']?></td>
           <td><?=$item['mfg']?></td>
           
       </tr>
       <?php endforeach ; ?>
   </table>


    
    <h3>Product List</h3>
    <table border="1" width="500" cellspacing="0" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Mfg</th>
        </tr>
        <?php foreach($row as $item) : ?>
        <tr>
            <td><?=$item['id']?></td>
            <td><?=$item['name']?></td>
            <td><?=$item['price']?></td>
            <td><?=$item['mfg']?></td>
            
        </tr>
        <?php endforeach ; ?>
    </table>
    <br>
    <br>
    <br>


</body>
</html>