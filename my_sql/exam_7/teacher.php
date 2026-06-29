<?php
require_once "config.php";
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $qulifiaction = $_POST['qulifiction'];
    $contact_no = $_POST['contact'];
    // echo $name.''.$qulifiaction.''.$contact_no;

    $sql->query("call addteacher('$name', '$qulifiaction', '$contact_no')");
}
$result = $sql->query("select * from teacher");
$row = $result->fetch_all(MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher</title>
</head>

<body>
    <form action="" method="POST">
        Name <br>
        <input type="text" name="name"> <br><br>

        Qulifiaction <br>
        <input type="text" name="qulifiction"><br><br>

        Contact No. <br>
        <input type="number" name="contact"><br><br>

        <button name="btn">Add Teacher</button>
    </form>

    <br><br>

    <h1>Teacher List</h1>
    <table border="1" width="500" cellspacing="">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Qulifiaction</th>
            <th>Contact</th>
        </tr>
        <?php
        foreach($row as $item):?>
        <tr>
            <td><?=$item['id'] ?></td>
            <td><?=$item['name'] ?></td>
            
            <td><?=$item['contact_no'] ?></td>
       
        <td>
            <form action="" method="post">
                <input type="hidden" name="delete_btn" value="<?=$item['id'] ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
        </tr>

        <?php endforeach ?>
    </table>




</body>

</html>