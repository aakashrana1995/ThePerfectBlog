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
//$password = md5($password);
$sql = "SELECT admin_username from admin_info where admin_username='$u_name' and admin_password = '$password'";
$result = mysqli_query($conn, $sql);
$cnt = 0;
while($row = mysqli_fetch_array($result))
{
	$cnt++;
}
if ($cnt == 1) 
{
	session_start();
	$_SESSION["u_name"] = $u_name;
	$_SESSION["password"] = $password;
	header('location: admin_index.php');
} 
else 
{
    echo "Error: Wrong Username or Password";
}

mysqli_close($conn);
?>
