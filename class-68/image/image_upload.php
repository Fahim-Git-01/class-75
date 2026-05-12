


<?php
if(isset($_POST['submit'])){
    echo "<pre>";
    print_r($_FILES["image"]);
    echo "</pre>";

    $file= $_FILES["image"];
    echo $file["size"];
    $final_path = "upload/" .$file["name"];


    if($file["size"] > (120 * 1024)) {
        echo "File size should be less than 120kb";
    } elseif(($file["type"] == "image/jpeg" ||
        $file["type"] == "image/jpg" ||
        $file["type"] == "image/png" ||
        $file["type"] == "application/pdf" || 
        $file["type"] ==  "application/vnd.openxmlformats-officedocument.wordprocessingml.document") == false){
            echo "Invalid File type. Please Use jpeg, jpg, png, pdf or dox file";
        }else{
            echo "File uploded successfully";
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
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="">
   <button type="submit" name="submit" >Upload</button>

</form>
    
</body>
</html>