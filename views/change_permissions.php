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

$blogger_username=$_GET['username'];
$sql = "SELECT blogger_is_active, blogger_username FROM blogger_info WHERE blogger_username='$blogger_username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$temp = $row['blogger_is_active'];
$temp = 1 - $temp;

$sql = "UPDATE blogger_info SET blogger_is_active='$temp' WHERE blogger_username='$blogger_username'";

if (mysqli_query($conn, $sql)) {
    
	header("location: admin_index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>