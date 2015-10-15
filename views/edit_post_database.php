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

$id_sql = "SELECT blogger_id FROM blogger_info WHERE blogger_username='$u_name'";
//$blogger_id = mysqli_result(mysqli_query($id_sql), 0);
$result = mysqli_query($conn, $id_sql);
$array = mysqli_fetch_row($result);
$blogger_id = $array[0];
$blog_id = $_SESSION['blog_id'];

$blog_title = $_POST["blog_title"];
$blog_desc = $_POST["blog_desc"];
$blog_desc = mysqli_real_escape_string($conn, $blog_desc);
echo $blog_desc;
echo "\n";
$blog_category = $_POST["blog_category"];
//$blog_author = $u_name;
//$blog_is_active = true;
//$creation_date = date("Y-m-d");
$updated_date = date("Y-m-d");

$sql = "UPDATE blog_master SET blog_title='$blog_title', blog_desc='$blog_desc', blog_category='$blog_category', updated_date='$updated_date' WHERE blog_id='$blog_id'";

if (mysqli_query($conn, $sql)) {
    ?> <script> alert("Blog Posted Successfully."); </script>
	<h1>
	<?php echo 'Click '?> <a href="my_posts.php"> here</a> 
	<?php echo 'to view all your posts.';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
</h1>