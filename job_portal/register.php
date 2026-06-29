
<?php
include 'includes/db.php';

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];

$password=password_hash(
$_POST['password'],
PASSWORD_DEFAULT
);

$role=$_POST['role'];

$sql="INSERT INTO users
(name,email,password,role)
VALUES
('$name','$email','$password','$role')";

mysqli_query($conn,$sql);

echo "Registration Successful";
}
?>

<form method="post">

<input type="text"
name="name"
placeholder="Name">

<br><br>

<input type="email"
name="email"
placeholder="Email">

<br><br>

<input type="password"
name="password"
placeholder="Password">

<br><br>

<select name="role">
<option value="seeker">
Job Seeker
</option>

<option value="employer">
Employer
</option>
</select>

<br><br>

<button name="submit">
Register
</button>

</form>