<?php
$msg = "";

if (isset($_GET['submit'])) {
    $num = $_GET['num'];

    if ($num <= 1) {
        $msg = "$num is not Prime";
    } else {
        $isPrime = true;
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $isPrime = false;
                break;
            }
        }
        $msg = $isPrime ? "$num is Prime" : "$num is not Prime";
    }
}
?>

<form>
    Enter Number: <input type="number" name="num" required>
    <button name="submit">Check</button>
</form>

<h3><?= $msg ?></h3>