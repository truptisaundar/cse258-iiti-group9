<?php
require_once 'core/init.php';

$user =new user();

if(!$user->isLoggedIn()) {
    redirect::to('index.php');
}

if(input::exists()) {
  if(token::check(input::get('token'))) {

     $validate=new validate();
     $validation =$validate->check($_POST,array(
        'name' =>array(
        'required'=>true,
        'min' =>2,
        'max' =>50
        )
        ));

        if($validation->passed()) {

          try {
            $user->update(array(
            'name' => input::get('name')
            ));

            session::flash('home','Your details have been updated!.');
            redirect::to('index.php');
          } catch(Exception $e) {
            die($e->getMessage());

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
	<title>Update Profile</title>
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
		    <li><a href="#">Search</a></li>
		    <li><a href="page2.php">OnlineSubmission</a></li>
		</ul>
	    </nav>
		</div>
		<div id="divAbout">
		<div id="divContent">
		<center>
		<h1>Update Profile</h1>
		</center>
		
		<form action="" method="post">
		   <div class="field">
		      <label for="name">Name</label>
		      <input type="text" name="name" value="<?php echo escape($user->data()->name); ?>">
		
		      <input type="submit" value="update">
		      <input type="hidden" name="token" value="<?php echo token::generate(); ?>">
		      </div>
		      </form>
		      </div>
		</div>
	</div>
</body>
</html>