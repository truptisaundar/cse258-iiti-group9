<?php
require_once 'core/init.php';

if(input::exists()) {
  if(token::check(input::get('token'))) {

    $validate = new validate();
    $validation =$validate->check($_POST,array(
    'username' =>array('required' =>true),
    'password' => array('required' =>true)
    ));
    if($validation->passed()) {
      $user = new user();
      
      $remember=(input::get('remember') == 'on') ? true : false;
      $login = $user->login(input::get('username'),input::get('password'),$remember);
    if($login) {
      redirect::to('index.php');
    }else {
      echo '<p>Sorry,logging in failed.</p>';
    }
    }else {
       foreach($validation->errors() as $error) {
         echo $error, '<br>';
       }
    }
  }
 }
?>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style3.css"/>
</head>
<body>
<div id="divWrapper">
		<div id="divHeader"><img src="bb.jpg" width="975" height="100"></div>
		<div id="divLinks">
		<nav>
		<ul>
			<li><a href="mainpage.php">Home</a></li>
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
		    <li><a href="search.php">Search</a></li>
		    <li><a href="page2.php">OnlineSubmission</a></li>
		</ul>
	    </nav>
		</div>
		<div id="divAbout">
		<div id="divContent">
		<center>
		<h1>Login Page</h1>
		</center>
		
		<form action="" method="post">
		   <div class ="field">
		     <label for="username">username</label>
		     <input type="text" name="username" id="username" autocomplete="off">
		     </div>
		
		   <div class="field">
		     <label for="password">password</label>
		     <input type="PASSWORD" name="password" id="password" autocomplete="off">
		    </div>
		    
		    <div class="field">
		       <label for="remember">
		           <input type="checkbox" name="remember" id="remember">Remember me
		           </label>
		           </div>
		
		    <input type="hidden" name="token" value="<?php echo token::generate(); ?>">
		    <input type="submit" value="Log in">
		   </form>
		   </div>
		</div>
	</div>
   </body>
   </html>