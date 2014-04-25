<?php
require_once 'core/init.php';

if(!$username = input::get('user')) {
  redirect::to('index.php');
}else {
$user = new user($username);
if(!$user->exists()){
    redirect::to(404);
}else {
  $data = $user->data();
}
$da= $data->id;
?>		
<!doctype html>
<html lang="en">
<head>

<title>Reviewer Page</title>
<link rel="stylesheet" href="css/layouts/css.css">
<link rel="stylesheet" href="css/layouts/side-menu1.css">
</head>
 
 
<body>

	<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
    <!-- Hamburger icon -->
    <span></span>
    </a>
	<div id="menu">
        <div class="pure-menu pure-menu-open">
            <!-- <a class="pure-menu-heading" href="#">Company</a>-->

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
                <li><a href="live_search.php">Search</a></li>
                <li><a href="archives.php" class="menu-item-divided pure-menu-selected">Archives</a></li>
            </ul>
        </div>
    </div>
    

       <div id="main">
                    
                    <div class="header"><img  src="LGO.png" name="slide" width="80" height="80">
                    <h1>eyond Borders</h1>
					<nav class="navigation" role="navigation" aria-label="main navigation">
		<ul class="navigation-menu" id="horizontal_menu">
					 <li class="navigation-menu-item"><a href="index1.php">Home</a></li>
					 <li class="navigation-menu-item is-selected"><a href="logout.php">Log out</a></li>
			          <li class="navigation-menu-item"><a href="update.php">Update details</a></li>
			          <li class="navigation-menu-item"><a href="changepassword.php">Change Password</a></li>
					 </ul>
					  </nav>
                    </div>
                     

           <div class="content">
                    <!--<h2 class="content-subhead">Admin Page</h2>-->
                   
            <h1 class="content-subhead" style="color:#000000;">Articles to be Reviewed</h1>
		
		<?php
		
$conn_error = 'Could Not Connect.';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'log1';

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db) or die($conn_error);
$fileStorage = 'upl/';
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT * FROM reviewart WHERE rev_id =$da");
  while($row = mysqli_fetch_array($result)):?>
  <p>
		<h3 class="content-subhead" style="color:#008000;"><?php
  echo "Title :" . $row['article_path'] .'<br>';
  echo '<a href="'. $fileStorage . $row['article_path'] .'">Full pdf</a><br />';?>
  </p>
  <?php endwhile;
		}
		?>
		         </div>
    </div>
</div>




<script src="js/ui.js"></script>


</body>
</html>