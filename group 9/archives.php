<?php
require_once 'core/init.php';
error_reporting(0);
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("log1")or die(mysql_error());
$fileStorage = '/final/upl/';

$user =new user();
?>


	<!doctype html>
	<html lang="en">
	<head>
	
	<title>Archives</title>
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
					<li><a href="#" class="menu-item-divided pure-menu-selected">Archives</a></li>
				</ul>
			</div>
		</div>
		

		   <div id="main">
						
						<div class="header"><img  src="LGO.png" name="slide" width="80" height="80">
						<h1>eyond Borders</h1>
					<?php if($user->isLoggedIn()) { ?>
						 
			<nav class="navigation" role="navigation" aria-label="main navigation">
		<ul class="navigation-menu" id="horizontal_menu">
		<?php 
					if($user->hasPermission('admin')){?>
					<li class="navigation-menu-item"><a href="admin.php">Home</a></li>
					<?php } else {
					?>
					 <li class="navigation-menu-item"><a href="index1.php">Home</a></li>
					 <?php } ?>
					 <li class="navigation-menu-item is-selected"><a href="logout.php">Log out</a></li>
			          <li class="navigation-menu-item"><a href="update.php">Update details</a></li>
			          <li class="navigation-menu-item"><a href="changepassword.php">Change Password</a></li>
					 </ul>
					  </nav>
					 
					  <?php } ?> 
					   </div>
			   <div class="content">
						<!--<h2 class="content-subhead">Admin Page</h2>-->
					   
				<h1 class="content-subhead" style="color:#000000;">Archives</h1>
            
                <?php
                $q=mysql_query("SELECT * FROM volume") or die(mysql_error());
                if(mysql_num_rows($q)>0):?>
                  <?php while ($r = mysql_fetch_assoc($q)):?>
				<?php $s=$r['id'];?>
			    <h2 class="content-subhead" style="color:#CC3232;"><?php echo "Volume".$s;?></h2>
                 <?php $result = mysql_query("SELECT * FROM articles WHERE volume_no=$s") or die(mysql_error());
                 
			                if (mysql_num_rows($result) > 0):?>
			                <?php while ($row = mysql_fetch_assoc($result)):?>	                		
			                		<p>
			                			<h2 class="content-subhead" style="color:#008000;"><?php echo htmlentities($row['article_title'], ENT_COMPAT, 'UTF-8'); ?></h2>   
			                		   <?php echo  'Author Name: '.htmlentities($row['author_name'], ENT_COMPAT, 'UTF-8').'</br>';?>
			                		   <?php echo  'Abstract: '.htmlentities($row['article_content'], ENT_COMPAT, 'UTF-8').'</br>';?>
									  <?php if($user->isLoggedIn()) {
			                		   echo '<a href="'. $fileStorage . $row['article_name'] .'">Full pdf</a><br />'; } 
									   else {
									   echo 'You need to <a href="login.php">log in</a> to view full pdf';
									   }
									   ?>
			                		</p>
			                	<?php endwhile;
			                	endif;?>
			                	
			              <?php endwhile;
			            endif;?> 
            

         </div>
    </div>
</div>




<script src="js/ui.js"></script>


</body>
</html>
