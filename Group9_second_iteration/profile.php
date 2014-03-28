<?php
require_once 'core/init.php';

if(!$username = input::get('user')) {
  redirect::to('index.php');
}else {
$user = new user($username);
if(!$user->exists()){
    redirect::to(404);
}else {
  $data = $user->data();
}

?>
<html>
<head>
	<title>User Details</title>
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
		<h1>User Details</h1>
		</center>
		
		<h3><?php echo escape($data->username); ?></h3>
		<p> Full name: <?php echo escape($data->name); ?></p>

		</div>
		</div>
	</div>
</body>
</html>
<?php 
}
