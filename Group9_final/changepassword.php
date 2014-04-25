<?php
require_once 'core/init.php';
$e=array("","","","","","","");
$i=2;

$user = new user();

if(!$user->isLoggedIn()) {
   redirect::to('index.php');
}

if(input::exists()) {
   if(token::check(input::get('token'))) {

       $validate = new validate();
       $validation = $validate->check($_POST,array(
           'password_current'=> array(
              'required' =>true,
              'min' => 6
           ),
           'password_new' =>array(
           'required' =>true,
              'min' => 6
           ),
            'password_new_again' =>array(
           'required' =>true,
              'min' => 6,
              'matches' => 'password_new'
           )
           ));
           if($validation->passed()) {

             if(hash::make(input::get('password_current'),$user->data()->salt)!== $user->data()->password){
               $e[0] = 'Your current password is wrong';
             }else {
               $salt = hash::salt(32);
               $user->update(array(
                'password' => hash::make(input::get('password_new'),$salt),
                'salt' => $salt
                ));
                   
                 $e[1] = 'Your Password has been changed!';
             }
           } else {
              foreach($validation->errors() as $error) {
                  $e[$i]=$error;
                 $i++;
              }
           }
   }
}
?>
<!doctype html>
<html lang="en">
<head>

<title>Change Password</title>
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
                <li><a href="mainpage.php">Home</a></li>
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
					  </div>
           <div class="content">
                    <!--<h2 class="content-subhead">Admin Page</h2>-->
                   
            <h2 class="content-subhead">Change Password</h2>
            <p>
                <form action="#" method="post" class="pure-form pure-form-aligned">
				    <fieldset>
				        <div class="pure-control-group">
				            <label for="password_current">Current Password</label>
				            <input id="password" name="password_current" type="password" placeholder="Current Password">
				        </div>
				
				        <div class="pure-control-group">
				            <label for="password_new">New Password</label>
				            <input id="password" name="password_new" type="password"  placeholder="New Password">
				        </div>
				
				        <div class="pure-control-group">
				            <label for="password_new_again">New Password Again</label>
				            <input id="password" name="password_new_again" type="password"  placeholder="New Password Again">
				        </div>

						<div class="pure-controls">
						    
							<input type="hidden" name="token" value="<?php echo token::generate(); ?>">
				
				            <button type="submit" class="pure-button pure-button-primary">Change</button>
				        </div>
						<div class="pure-controls">
				    <span class="error" style="color:#008000;"><?php echo $e[0];?></span><br>
				    <span class="error" style="color:#008000;"> <?php echo $e[1];?></span><br>
				    <span class="error" style="color:#008000;"> <?php echo $e[2];?></span><br>
				    <span class="error" style="color:#008000;"><?php echo $e[3];?></span><br>
				    <span class="error" style="color:#008000;"><?php echo $e[4];?></span><br>
				    <span class="error" style="color:#008000;"><?php echo $e[5];?></span><br>
				    <span class="error" style="color:#008000;"><?php echo $e[6];?></span><br>
				   </div>
				    </fieldset>
				</form>
               
            </p>

         </div>
    </div>
</div>




<script src="js/ui.js"></script>


</body>
</html>