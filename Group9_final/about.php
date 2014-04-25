<?php
require_once 'core/init.php';
if(session::exists('home')) {
   echo '<p>' . session::flash('home') .'</p>' ;
$user =new user();
}

//echo session::get(config::get('session/session_name'));
$user = new user();
//echo $user->data()->username;
?>
<!doctype html>
<html lang="en">
<head>
<title>About</title>
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
                <li class="menu-item-divided pure-menu-selected"><a href="#">About</a></li>

                <li >
                    <a href="login.php">Login</a>
                </li>

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
     <h1> About the Journal </h1>
     <h3>People</h3>
     <ul>
     <li><a href="#">Contact</a></li>
     <li><a href="#">Editorial Team</a></li>
     </ul> 
     <h3>Policies</h3>
     <ul>
     <li><a href="#">Focus and Scope</a></li>
     <li><a href="#">Section Policies</a></li>
     <li><a href="#">Peer Review Process</a></li>
     <li><a href="#">Publication Frequency</a></li>
     <li><a href="#">Open Access Policy</a></li>
     <li><a href="#">Indexes and Affiliations</a></li>
     </ul> 
     <h3>Submissions</h3>
     <ul>
     <li><a href="#">Online Submissions</a></li>
     <li><a href="#">Author Guidelines</a></li>
     <li><a href="#">Copyright Notice</a></li>
     <li><a href="#">Privacy Statement</a></li>
     </ul> 
     <h3>Other</h3>
     <ul>
     <li><a href="#">Journal Sponsorship</a></li>
     <li><a href="#">Journal History</a></li>
     <li><a href="#">About this Publishing System</a></li>
     <li><a href="#">About this Publishing System</a></li>
     </ul> 
    
    
    
    
     </div>
    </div>
</div>




<script src="js/ui.js"></script>


</body>
</html>