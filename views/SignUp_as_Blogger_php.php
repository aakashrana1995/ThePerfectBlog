<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$u_name = $_POST['u_name'];
$password = $_POST['password'];
$email = $_POST['email'];
$password = md5($password);
$creation_date = date("Y-m-d");
$updated_date = $creation_date;
$end_date = "2016-12-31";
$is_active = true;
$sql = "INSERT INTO blogger_info VALUES ('NULL', '$u_name', '$email', '$password', '$creation_date', '$is_active', '$updated_date', '$end_date')";

if (mysqli_query($conn, $sql)) {
    echo '<script> alert("Sign Up Successful"); </script>';
	//echo 'Click <a href="copy_login.html"> here </a>to login.';
	header("location: copy_login.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>