<?php
session_start();
include("../config/database.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(name,email,password)
            VALUES('$name','$email','$password')";

    if(mysqli_query($conn,$sql))
    {
		$last_id = mysqli_insert_id($conn);
        echo "Registration successful";
		$_SESSION['user_id'] = $last_id;
		$_SESSION['user_email'] = $email;
		$_SESSION['user_name'] = $name;
		header("Location: ../dashboard/dashboard.php");exit();
    }
}
?>

<form method="POST">
<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>
</form>