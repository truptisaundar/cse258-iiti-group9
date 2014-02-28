<?php
require_once 'core/init.php';
if(input::exists()) {
  if(token::check(input::get('token'))) {
   $validate =new validate();
   $validation =$validate->check($_POST,array(
      'username' => array(
            'name' => 'Username',
          'required' =>true,
          'min' => 2,
          'max' =>  20,
          'unique' => 'users'
      ),
      'password' => array(
          'required' =>true,
          'min' => 6
      ),
      'password_again' => array(
        'required' =>true,
        'matches' => 'password'
      ),
      'name' => array(
         'required' => true,
         'min' =>2,
         'max' =>50
      ),
   ));
   
   if($validation->passed()) {
        $user = new user();
        
       $salt=hash::salt(32);

        try {

        $user->create(array(
             'username' => input::get('username'),
             'password' => hash::make(input::get('password'),$salt) ,
             'salt' => $salt,
             'name'=>input::get('name'),
             'joined' => date('Y-m-d H:i:s'),
             'group' => 1
             ));
             
             session::flash('home' , 'You have been registered and now can log in!');
             Redirect::to('index.php');


        } catch(Exception $e) {
             die($e->getMessage());
        }
   } else{
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
		<h1>Registration Page</h1>
		</center>
		
			<form action="" method="post">
			    <div class ="field">
			       <label for="username">Username</label>
			       <input type="text" name="username" id="username" value="<?php echo escape(input::get('username')); ?>" autocomplete="off">
			       </div>
			       
			     <div class="field">
			         <label for="password">Choose a password</label>
			         <input type="password" name ="password" id="password">
			         </div>
			     <div class="field">
			         <label for="password_again">Enter your password again</label>
			         <input type="password" name ="password_again" id="password_again">
			         </div>
			      <div class="field">
			         <label for="name">Your Name</label>
			         <input type="text" name ="name" value="<?php echo escape(input::get('name')); ?>" id="name">
			         </div>
			      <input type="hidden" name="token" value="<?php echo token::generate(); ?>">
			    <input type="submit" value ="Register">
			</form>
		
		</div>
		</div>
	</div>
</body>
</html>