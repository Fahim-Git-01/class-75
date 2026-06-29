<?php
require_once "db-config.php";
if(isset($_POST["add_mfg"])){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $active = isset( $_POST["active"]) ? 1 : 0 ;

    $db->query("insert into manufactures(name, address, is_active) values ('$name', '$address', '$active')");
}


$result = $db->query("select * from manufactures");
if ($result) {
    $mfg = $result->fetch_all(MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($mfg);
    // echo "</pre>";
} else {
    echo $db->error;
}


// delete data

if(isset($_POST["delete_id"])){
   $id = $_POST["delete_id"];
   $db -> query("delete from manufactures where id = $id");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manafacture</title>
</head>

<body>
    <br><br>
    <nav>
        <a href="manafacture.php">Manufacture</a> ||
        <a href="product.php">Product</a>
    </nav>
    <h1>Add New Manufacture</h1>

    <form action="" method="POST">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name">
        <br>
        <label for="address">Address</label><br>
        <input type="text" name="address" id="address"><br> <br>
        <input type="checkbox" name="active" id="active">
        <label for="active">Is active</label>
        <br><br>

        <button type="submit" name="add_mfg">Save</button>
    </form>


    <h3>Manufactures List</h3>
    

    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            <?php
            if (isset($mfg)) {
                foreach ($mfg as $item) { ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['address'] ?></td>
                        <td><?= $item['is_active'] ? "Active" : "Inactive"; ?></td>

                        <td>
                            
                            <form method="GET"
                            action="manufacture_details.php"> 
                                <input type="hidden" name="id" value ="<?= $item['id'] ; ?>">
                                <button type="submit" >view</button>
                            </form>
                            <form method="GET"
                            action="manufacture_edit.php"> 
                                <input type="hidden" name="id" value ="<?= $item['id'] ; ?>">
                                <button type="submit" >Update</button>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="delete_id" value ="<?= $item['id'] ; ?>">
                                <button type="submit">Delete</button>
                            </form>                            
                            
                        </td>
                    </tr>    
                <?php
                }
            }
                ?>
        </tbody>
        </tbody>
    </table>
</body>

</html>