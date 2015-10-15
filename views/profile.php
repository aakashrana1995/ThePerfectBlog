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

$username = $_GET['username'];
$sql = "SELECT blogger_id, blogger_username, blogger_email, blogger_creation_date, blogger_is_active, blogger_updated_date, blogger_end_date FROM blogger_info WHERE blogger_username='$username'";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Perfect Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Welcome <?php echo "$u_name" ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="new_post.php">New Post</a>
                    </li>
                    <li>
                        <a href="my_posts.php">My Posts</a>
                    </li>
					<li>
                        <a href="contact_us.html">Contact Us</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('../img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>The Perfect Blog</h1>
                        <hr class="small">
                        <span class="subheading">where thoughts flow and create magic</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
	
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<?php 
					while($row = mysqli_fetch_array($result))
					{
				?>
	
                <div class="post-preview">
                    <a href="post.php?link=<?php echo $row['blog_id'];?>">
                        <h2 class="post-title">
							<?php 
								echo $row['blogger_username'];
							?>
                        </h2>
                    </a>
					
					<article>
						<div class="container">
							<div class="row">
									<p>
									<?php
										echo 'Blogger ID: '.$row['blogger_id'].'<br>';
                    echo 'Email ID: '.$row['blogger_email'].'<br>';
                    echo 'Creation Date: '.$row['blogger_creation_date'].'<br>';
                    echo 'Updated Date: '.$row['blogger_updated_date'].'<br>';
                    echo 'Active Satus: '; if($row['blogger_is_active']==1) echo 'Yes'; else echo 'No';
									?>
									</p>
							</div>
						</div>
					</article>
					
					
               
                </div>
                <hr>
				
				<?php } ?>
				
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p class="copyright text-muted">Copyright &copy; The Perfect Blog 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/clean-blog.min.js"></script>

</body>

</html>
