<?php
require_once 'core/init.php';
$user =new user();
?>
<!doctype html>
<html lang="en">
<head>
<title>Beyond Borders-Home</title>
<link rel="stylesheet" href="css/layouts/css.css">
<link rel="stylesheet" href="css/layouts/side-menu1.css">
</head>
 
 
<body>

	<div id="layout">
    <a href="#menu" id="menuLink" class="menu-link">
  
    <span></span>
    </a>
	<div id="menu">
        <div class="pure-menu pure-menu-open">

            <ul>
                <li class="menu-item-divided pure-menu-selected">
                	<a href="#">Home</a>
                </li>
                <li><a href="about.php">About</a></li>
				<li ><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
                <li><a href="live_search.php">Search</a></li>
                <li><a href="archives.php">Archives</a></li>
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
                  <h2 class="content-subhead">Main Page</h2>
                   
            <h2 class="content-subhead">Log in to continue</h2>
             <p>
To think "beyond borders" is to think in dialogic, transactional and transgressive ways across disparate borders: geographic, sociological, anthropological, cultural, economic, political, philosophical, psychoanalytic and linguistic to name a few. The intersection between different ways or modes of interpretation and understanding, and the kind of borders crossed lead to disparate outcomes for those undertaking the journey. These disparate outcomes suggest both the limitations and the possibilities of border crossings. A few critical questions emerge in this regard: What are the possibilities of writing, thinking and communicating beyond borders? What is at risk, and what is gained and lost in the blurring or dissolution of borders? Are disciplinary borders relevant in our times? What issues and problems do we encounter in such crossovers? Like nations, are interpretive borders imagined and arbitrary? Do they possess subversive potential or are they merely there to be crossed? We invite submissions that engage with any number of diverse notions of "beyond borders". The conference embodies its theme by intersecting disciplinary borders and welcomes papers in diverse disciplines across the Humanities and Social Sciences. 
			 </p>

            <h2 class="content-subhead">Contents</h2>
            <p>
			text
            </p>

            

            <h2 class="content-subhead">Contents-I</h2>
            <p>
			text
            </p>
        </div>
    </div>
</div>




<script src="js/ui.js"></script>


</body>
</html>
