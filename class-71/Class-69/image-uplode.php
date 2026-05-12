<?php
if(isset($_POST["submit"])){
    // echo "<pre>";
    // print_r($_FILES["image"]);
    // echo "</pre>";

    $file = $_FILES["image"];  
    // echo $file["tmp_name"];

    $final_path = "uploads/".$file["name"];
    $type =!empty($file["tmp_name"]) ? mime_content_type($file["tmp_name"]) : "" ;
    
    if($file["size"] > (2 * 1024 * 1524)){
        echo "File size should be maximum 10mb";
        }elseif(($type == "image/jpeg" ||
             $type == "image/jpg" ||
             $type == "image/png" ||
             $type == "application/pdf" ||
             $type ==  "application/vnd.openxmlformats-officedocument.wordprocessingml.document") == false){
            echo "Invalid File type. Please Use jpeg, jpg, png, pdf or dox file";
        }
        
        else{
            $msg = "File uploded successfully";
            move_uploaded_file($file["tmp_name"], $final_path);
            $img = "<img src='{$final_path}' width='200px' height='200px'>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .msg{
            color : green;
        }

    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" id=""><br><br><br>
        
        <input type="submit" name="submit" id="" value="Upload">
    </form>
    
 <P class="msg"><?= $msg ?? "" ?></P> <br>
<br>
    <?= $img ?? "" ?>
</body>
</html>