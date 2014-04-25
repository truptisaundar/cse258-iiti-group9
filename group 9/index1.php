<?php
require_once 'core/init.php';
$var = 1;
if(session::exists('home')) {
   echo '<p>' . session::flash('home') .'</p>' ;
}

//echo session::get(config::get('session/session_name'));
$user = new user();
//echo $user->data()->username;
?>
<!doctype html>
<html lang="en">
<head>

<title>Index Page</title>
<link rel="stylesheet" href="css/layouts/css.css">
<link rel="stylesheet" href="css/layouts/side-menu1.css">
</head>
 
 
<body id>

	 <div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
    <!-- Hamburger icon -->
    <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
           
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
		       		 
			   <?php
if($user->isLoggedIn()) {
?>

<ul class="navigation-menu" id="horizontal_menu">
					 <li class="navigation-menu-item"><a href="#">Home</a></li>
			          <li class="navigation-menu-item is-selected"><a href="logout.php">Log out</a></li>
			          <li class="navigation-menu-item"><a href="update.php">Update details</a></li>
			          <li class="navigation-menu-item"><a href="changepassword.php">Change Password</a></li>
					  <?php
					 if($user->hasPermission('read')){
		      		?>
						
		                
		                <?php
		    		}
		    		if($user->hasPermission('aut')){
		      		?>
						
		                <li class="navigation-menu-item"><a href="add.php">Submit Article</a></li>
						<li class="navigation-menu-item"><a href="retrieval_contact.php">Email Editor</a></li>
						
		                <?php
						$var = 0;
		    		}
					if($user->hasPermission('rev')){
		      		?>
					    <li class="navigation-menu-item"><a href="reviewer.php?user=<?php echo escape($user->data()->username);?>">Articles to be Reviewed</a></li>
		                <?php if($var) { ?>
						<li class="navigation-menu-item"><a href="retrieval_contact.php">Email Editor</a></li>
						<?php } ?>
						<?php
		    		}
					if($user->hasPermission('admin')){
						Redirect::To('admin.php');
		    		}?>
					  </ul>
					  </nav>
					  
					 </div>
					 
                   <div class="content">
               <h2 class="content-subhead" style="color:#008000;">Profile Page</h2>
            <p>
		
			<h3>Hello &nbsp;<a href="profile.php?user=<?php echo escape($user->data()->username);?>"><?php echo escape($user->data()->username); ?></a></h3>
				
			  <?php  }
				else { ?>
				</div>
				<div>
				<?php
		  			echo '<center><p> You need to <a href="login.php">log in</a> to continue</p></center>';
				 }
                 ?>
				 </p>
         </div>
		 
		 
    </div>
	
</div>




<script src="js/ui.js"></script>


</body>
</html>