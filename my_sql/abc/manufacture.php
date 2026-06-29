<?php
require_once 'config.php';

if(isset($_POST['btn'])){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $contact_id = $_POST["contact"];

    $sql->query( "call addManufacture ('$name', '$address', '$contact_id')");
}

if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_btn'];
    $sql->query( "delete from manufacturers where id = $id ");
}


$result = $sql->query("select * from manufacturers");
$row = $result->fetch_all(MYSQLI_ASSOC);

// echo "<pre>";
// print_r($row);
// echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturer</title>
</head>
<body>
    <h1>Add Manufacture</h1>
    <form action="" method="POST">
         Name <br>
        <input type="text" name="name"> <br><br>

        Address <br>
        <input type="text" name="address"><br><br>

        Contact No. <br>
        <input type="number" name="contact"><br><br>

        <button name="btn">Add Manufacture</button> 
    </form>


    <h3>Manufacturer List</h3>
    <table border="1" width="700" cellspacing="0" cellpadding="5" >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>

        <?php
        foreach($row as $item):?>
        <tr>
            <td><?=$item['id'] ?></td>
            <td><?=$item['name'] ?></td>
            <td><?=$item['address'] ?></td>
            <td><?=$item['contact_no'] ?></td>
       
        <td>
            <form action="" method="post">
                <input type="hidden" name="delete_btn" value="<?=$item['id'] ?>">
                <button type="submit"><b>Delete</b></button>
            </form>
        </td>
        </tr>

        <?php endforeach?>

    </table>

</body>
</html>