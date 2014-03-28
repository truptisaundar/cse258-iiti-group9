<?php
require_once 'core/init.php';

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
               echo 'Your current password is wrong';
             }else {
               $salt = hash::salt(32);
               $user->update(array(
                'password' => hash::make(input::get('password_new'),$salt),
                'salt' => $salt
                ));
                   echo 'vgh';
                 session::flash('home','Your Password has been changed!');
                 redirect::to('index.php');
             }
           } else {
              foreach($validation->errors() as $error) {
                  echo $error,'<br>';
              }
           }
   }
}
?>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style3.css"/>
</head>
<body>
<div id="divWrapper">
		<div id="divHeader"><img src="bb.jpg" width="975" height="100"></div>
		<div id="divLinks">
		<nav>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a>
				<ul>
					<li><a href="#">People</a>
						<ul>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Editorial team</a></li>
						</ul>
					
					</li>
					<li><a href="#">Policies</a>
						<ul>
				   			<li><a href="#">Focus and Scope</a></li>
				   			<li><a href="#">Section Policies</a></li>
			           		<li><a href="#">Peer Review Process</a></li>
				   			<li><a href="#">Publication Frequencies</a></li>
				   			<li><a href="#">Open Access Policies</a></li>
				   			<li><a href="#">Indexes and Affilations</a></li>
   						</ul>
					</li>
					<li><a href="#">Other</a>
						<ul>
							<li><a href="#">Journal History</a></li>
							<li><a href="#">About Publishing System</a></li>
							<li><a href="#">Statistics</a></li>
						</ul>
					</li>
				</ul>
			</li>
		    <li><a href="login.php">Login</a></li>
		    <li><a href="register.php">Register</a></li>
		    <li><a href="#">Search</a></li>
		    <li><a href="page2.php">OnlineSubmission</a></li>
		</ul>
	    </nav>
		</div>
		<div id="divAbout">
		<div id="divContent">
		<center>
		<h1>Change Password</h1>
		</center>
		<form action="" method="post">
		  <div class="field">
		     <label for="password_current">Current Password</label>
		     <input type="password" name="password_current" id="password_current">
		     </div>
		     
		<div class="field">
		<label for="password_new">New Password</label>
		     <input type="password" name="password_new" id="password_new">
		     </div>
		     <div class="field">
		<label for="password_new_again">New Password again</label>
		     <input type="password" name="password_new_again" id="password_new_again">
		     </div>
		     
		     <input type="submit" value="Change">
		     <input type="hidden" name="token" value="<?php echo token::generate();?>">
		     </form>
		     
		     </div>
		</div>
	</div>
</body>
</html>