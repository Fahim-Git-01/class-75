<?php
require_once "config.php";

if(isset($POST["btn"])){
    $name = $POST["name"];
    $address = $POST["address"];
    $contact_id = $POST["contact"];

    $sql->query("$name", "$address", "$contact_id");

}

if(isset($POST["delete_btn"])){
    $delete_id = $POST["new"];
    $sql->query("delete from manufature where id =$delete_id");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manufacture</title>
</head>
<body>
    <form method="post">
        Name <br>
        <input type="text" name="name"> <br><br>

        Address <br>
        <input type="text" name="address"><br><br>

        Contact No. <br>
        <input type="number" name="contact"><br><br>

        <button name="btn">Add Manufacture</button> 
    </form>
    
    <br>
    <table broder="1", cellspacing="0", cellpaddign="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>

        <?php
        foreach($row as $item):
        ?>
        <tr>
            <td><?=$item['id'] ?></td>
            <td><?=$item['name'] ?></td>
            <td><?=$item['address'] ?></td>
            <td><?=$item['contact_no'] ?></td>
        </tr>
        <td>
            <form action="" method="post">
                <input type="hidden" name="new" value="<?=$item['id'] ?>">
                <button type="submit" name="delete_btn">Delete</button>
            </form>
        </td>

        <?php endforeach?>

    </table>
    
</body>
</html>