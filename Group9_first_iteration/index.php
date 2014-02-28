<?php
require_once 'core/init.php';
//require_once 'index.html';
//echo config::get('mysql/host');//127.0.0.1

/*$users  = db::getInstance()->query('SELECT username FROM users');
if($users->count()){
    foreach($users as $user){
          echo $user->username;
                            }
                    }
*/
//db::getInstance();

/*$user = db::getInstance()->get('users',array('username','=','Vraj'));

if(!$user ->count()) {
  echo 'No user';
}else {
   echo 'OK';
}
*/

/*$user = db::getInstance()->insert('users' , array(
    'username' => 'Mit' ,
    'password' => 'Shah',
    'salt'     => 'salt'
    ));
*/
/*
$user = db::getInstance()->update('users' ,2, array(

    'password' => 'Shahsa',

    ));
*/
/*
if(session::exists('success')) {
   echo session::flash('success');
}
*/

if(session::exists('home')) {
   echo '<p>' . session::flash('home') .'</p>' ;
}

//echo session::get(config::get('session/session_name'));
$user = new user();
//echo $user->data()->username;

if($user->isLoggedIn()) {
?>
<html>
<head>
	<title>Profile</title>
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
		<h1>Profile</h1>
		</center>
		<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username);?>"><?php echo escape($user->data()->username); ?></a></p>
		   
		   <ul>
		      <li><a href="logout.php">Log out</a></li>
		      <li><a href="update.php">Update details</a></li>
		      <li><a href="changepassword.php">Change Password</a></li>
		   </ul>
			<?php
    		if($user->hasPermission('admin')){
      		echo 'Administrator';
    		}

			} else {
  			echo '<p> You need to <a href="login.php">log in</a> or <a href="register.php">register</a></p>';
			}
			?>
		</div>
		</div>
	</div>
</body>
</html>
