<?php
require_once("db.php");
$result = $db->query("select p.*, m.name as mfg  from products as p , manufactures as m where p. manufactures_id = m.id");
if ($result) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($row);
    // "</pre>";
    $view_result =$db->query("select * from vw_product_list");
    $view_rows = $view_result->fetch_all();
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturer</title>
</head>

<body>
    <nav>
        <a href="manufacturer.php">Manufacturers</a> | |
        <a href="product.php">Products</a>
    </nav>

    <h1>Products List</h1>
    <table width="100%" border="1" cellspacing="0" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Manufacturer</th>
            <th>Action</th>
        </tr>
        <?php foreach ($row as $value) : ?>
        <tr>
            <td><?= $value['id'];?></td>
            <td><?= $value['name'];?></td>
            <td><?= $value['mfg'];?></td>
            <td>
                <button>Delete</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>