<!DOCTYPE html>
<html>
<body>

<form method="post">
Enter Number: <input type="number" name="num">
<input type="submit" name="fact" value="Find Factorial">
</form>

<?php
if(isset($_POST['fact'])){
    $num = $_POST['num'];
    $fact = 1;

    for($i=1; $i<=$num; $i++){
        $fact *= $i;
    }

    echo "Factorial of $num = $fact";
}
?>

</body>
</html>