
<?php

session_start();

include 'includes/db.php';

if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];

$result=mysqli_query(
$conn,
"SELECT * FROM users
WHERE email='$email'"
);

$user=mysqli_fetch_assoc($result);

if($user &&
password_verify(
$password,
$user['password']
))
{
$_SESSION['id']=$user['id'];
$_SESSION['role']=$user['role'];

if($user['role']=="admin")
{
header("location:admin/dashboard.php");
}
elseif($user['role']=="employer")
{
header("location:employer/dashboard.php");
}
else
{
header("location:seeker/dashboard.php");
}
}
else
{
echo "Invalid Login";
}
}
?>

<form method="post">

<input type="email"
name="email"
placeholder="Email">

<br><br>

<input type="password"
name="password"
placeholder="Password">

<br><br>

<button name="login">
Login
</button>

</form>