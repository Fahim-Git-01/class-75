<?php
$msg = "";

if (isset($_GET['submit'])) {
    $n1 = $_GET['n1'];
    $n2 = $_GET['n2'];
    $n3 = $_GET['n3'];

    $largest = max($n1, $n2, $n3);
    $msg = "Largest Number: $largest";
}
?>

<form>
    Number1: <input type="number" name="n1"><br>
    Number2: <input type="number" name="n2"><br>
    Number3: <input type="number" name="n3"> <br><br>
    <button name="submit">Find</button>
</form>

<h2><?= $msg ?></h2>