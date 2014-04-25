<?php
?>
<html>
<body>
<iframe src="news.php"
width="40%" height="80"
align="right">
<p>See our <a href="news.html">newsflashes</a>.</p>
</iframe>

</body>

</html>
<?php
error_reporting(0);
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("log1")or die(mysql_error());
$fileStorage = '/final/upl/';

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

<title>View Volumes</title>
<link rel="stylesheet" href="css/layouts/css.css">
<link rel="stylesheet" href="css/layouts/side-menu2.css">
</head>
 
 
<body>

	<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
    <!-- Hamburger icon -->
    <span></span>
    </a>
	<!-- <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="#">Company</a>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
                <li><a href="live_search.php">Search</a></li>
                <li><a href="live_search.php" class="menu-item-divided pure-menu-selected">Archives</a></li>
                <?php 
                
                $q=mysql_query("SELECT * FROM volume") or die(mysql_error());
                if(mysql_num_rows($q)>0):?>
                	<?php  while ($r = mysql_fetch_assoc($q)): ?>
                <li><a href="#">Volume <?php echo $r['id']?></a></li>
                <?php endwhile;
			    endif;?>
                
            </ul>
        </div>
    </div>  -->
    

       <div id="main">
                    
                    <div class="header"><img  src="LGO.png" name="slide" width="80" height="80">
                    <h1>eyond Borders</h1>
                    <nav class="navigation" role="navigation" aria-label="main navigation">
		       		 
		       		 <ul class="navigation-menu">
					 
			          <li class="navigation-menu-item is-selected"><a href="logout.php">Log out</a></li>
			          <li class="navigation-menu-item"><a href="update.php">Update details</a></li>
			          <li class="navigation-menu-item"><a href="changepassword.php">Change Password</a></li>
			          <li class="navigation-menu-item"><a href="permitrev.php">Permit Reviewer</a></li>
					  <li class="navigation-menu-item"><a href="admin.php">Home</a></li>
        			</ul>
        			</nav>
        			
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
			                		   <?php echo '<a href="'. $fileStorage . $row['article_name'] .'">Full pdf</a><br />';?>
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
