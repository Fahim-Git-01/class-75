<?php
if(isset($_POST['submit'])){
    $file= $_FILES['file'];

    if (empty($file["tmp_name"]))
    {
        $fileMsg ='<p style="color:red;">Please select a file</p>';
    }
    else
    {
        $type= mime_content_type($file['tmp_name']);
        $file_path = "upload/" . $file["name"];

        if ($file["size"] >(400 * 1024))
        {
            $fileMsg = "<p style='color:red;'>File size cannot be more than 500kb</p>";
            
        }
        elseif(!($type == "image/jpg" || $type == "image/png"|| $type == "image/jpeg"))
        {
            $fileMsg = '<p style="color:red;">Image must be Jpg/Png/Jpeg</p>';
        }
        else{
        $msg = "File Uploaded successfully";
        move_uploaded_file($file['tmp_name'], $file_path);
        // move_uploaded_file($file['tmp_name'], $file_path);
        $imgPrev ="<img src='$file_path' style='height: 400px; width:auto;'>";
    }
    
}
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        Upload a file <br>
        <input type="file" name="file" ><br><br>
        <button type="submit" name="submit">Upload</button>
    </form>
    <p><?= $fileMsg ?? "" ?></p>
    <?= $msg ?? "" ?>
    <P><?= $imgPrev ?? "" ?></P>
    

    
</body>
</html>