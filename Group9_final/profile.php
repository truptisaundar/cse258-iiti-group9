<?php
require_once 'core/init.php';

if(!$username = input::get('user')) {
  redirect::to('index1.php');
}else {
$user = new user($username);
if(!$user->exists()){
    redirect::to(404);
}else {
  $data = $user->data();
}

?>
<!doctype html>
<html lang="en">
<head>

<title>Profile Page</title>
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

                <li class="menu-item-divided pure-menu-selected">
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
					
					<nav class="navigation" role="navigation" aria-label="main navigation">
		<ul class="navigation-menu" id="horizontal_menu">
					 <li class="navigation-menu-item"><a href="index1.php">Home</a></li>
					 <li class="navigation-menu-item is-selected"><a href="logout.php">Log out</a></li>
			          <li class="navigation-menu-item"><a href="update.php">Update details</a></li>
			          <li class="navigation-menu-item"><a href="changepassword.php">Change Password</a></li>
					 </ul>
					  </nav>
					  </div>
                    </div>
                     

           <div class="content">
                    <!--<h2 class="content-subhead">Admin Page</h2>-->
                   
            <h2 class="content-subhead" style="color:#008000;">Profile</h2>
            <p>
				 <p>Username:&nbsp; <?php echo escape($data->username); ?><p>
				 <p>Full name:&nbsp; <?php echo escape($data->firname); ?>  <?php echo escape($data->lastname); ?></p>
				 <p>Email:&nbsp; <?php echo escape($data->email); ?><p>
				 <p>Affiliation:&nbsp; <?php echo escape($data->affiliation); ?><p>
		    </p>

         </div>
    </div>
</div>




<script src="js/ui.js"></script>


</body>
</html>
<?php 
}
