<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manafacture</title>
</head>
<?php
require_once "db-config.php";
$result = $db->query("select * fro manufacture");
if ($result) {
    $mfg = $result->fetch_all(MYSQLI_ASSOC);
    echo "<pre>";
    print_r($mfg);
    echo "</pre>";
} else {
    echo $db->error;
}

?>

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
    <table border="1" width="100%" cellspacing="0" cellpadding="5">
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
            <tr>
                <?php
                if(isset($mfg)){
                    foreach($mfg as $item){
                        $status = $item['is_active'] ? 'Active' : 'Inactive';
                        echo "<tr>";
                        echo "<td>{$item['id']}</td>";
                        echo "<td>{$item['name']}</td>";
                        echo "<td>{$item['address']}</td>";
                        echo "<td>$status</td>";
                         echo "</tr>";
                    }
                }
                
                ?>
            </tr>
        </tbody>
    </table>
</body>

</html>