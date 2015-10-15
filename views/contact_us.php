<?php 
session_start();
if(isset($_SESSION["u_name"])) 
{
	$u_name = $_SESSION["u_name"];
}
else
{
	header('location: copy_login.html');
	exit;
}

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

$name = $_POST['name'];
$email_id = $_POST['email_id'];
$phone_no = $_POST['phone_no'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_us VALUES ('$name', '$email_id', '$phone_no', '$message')";

if (mysqli_query($conn, $sql)) {
    ?> <script> alert("Message Sent Successfully."); </script>
<h1>
<?php	echo 'Click '?> <a href="index.php"> here</a> 
	<?php echo 'to view your homepage.';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
</h1>