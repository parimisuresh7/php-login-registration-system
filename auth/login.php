<?php
session_start();
include("../config/database.php");

if(isset($_POST['login']))
{
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$sql);
$user = mysqli_fetch_assoc($result);

if($user && password_verify($password,$user['password']))
{
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

header("Location: ../dashboard/dashboard.php");
}
else
{
echo "Invalid login";
}
}
?>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>
</form>