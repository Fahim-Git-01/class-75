<?php
require_once "db-config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->query("select * from manufactures where id = $id");

    if ($result) {
        $mfg = $result->fetch_assoc();
        // echo "<pre>";
        // print_r($mfg);
        // echo "</pre>";
    }
}
    if(isset($_POST['update'])){
        $id =  $_POST ['id'];
        $name =  $_POST ['name'];
        $address = $_POST ['address'];
        $active = isset($_POST['active']) ? 1 : 0 ;
        echo $id."<br>";
        echo $name."<br>";
        echo $address."<br>";
        echo $active."<br>";
        $result = $db->query("update manufactures set name = '$name', address = '$address', is_active = $active where id = $id ");

        if($result){
            header("Location: manafacturer.php");
        }else{
            echo $db->error;
        }

    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br><br>
    <nav>
        <a href="manafacture.php">Manufacture</a> | |
        <a href="product.php">Product</a>
    </nav>
    
    <h3>Manufacture Edit</h3>
    <br>

    <?php
    if(isset($mfg)) :
    ?>


    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $mfg['id']; ?> ">

        Name <br>
        <input type="text" name="name" value="<?= $mfg['name']; ?> "><br><br>

        Address <br>
        <textarea name="address" id="" value="<?= $mfg['address']; ?>"></textarea><br><br>

        <input type="checkbox" name="active" <?= $mfg["is_active"] ? "checked" : "" ?>>
        Is Active
        <br><br>

        <button type="submit" name="update">Update</button>
    </form>

    <?php
   else:
        echo "No Data found";
    endif;


?>



</body>

</html>