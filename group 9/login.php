<?php
require_once 'core/init.php';
$e=array("","","","","","");
$i=1;
if(session::exists('home')) {
	echo '<p>' . session::flash('home') .'</p>' ;
}

$user = new user();
if($user->isLoggedIn()) {
    redirect::to('index1.php');
}

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
	if($user->hasPermission('admin')){
    redirect::to('admin.php');
	}else {
      redirect::to('index1.php');
	 } 
    }else {
	$e[0] = 'Sorry,logging in failed.';
      //echo '<p>Sorry,logging in failed.</p>';
    }
    }else {
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
<title>Login</title>
<link rel="stylesheet" href="css/layouts/css.css">
<link rel="stylesheet" href="css/layouts/side-menu1.css">
</head>
 
 
<body>

	<div id="layout">
    <a href="#menu" id="menuLink" class="menu-link">
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
                    </div>
                     

           <div class="content">
                   
            <h2 class="content-subhead">Sign in to continue</h2>
            <p>
                <form action="#" method="post" class="pure-form pure-form-aligned">
				    <fieldset>
				        <div class="pure-control-group">
				            <label for="username">Username</label>
				            <input id="username" name="username" type="text" placeholder="Username">
				        </div>
				
				        <div class="pure-control-group">
				            <label for="password">Password</label>
				            <input id="password" name="password" type="password"  placeholder="Password">
				        </div>
				
				        <div class="pure-controls">
				            <label for="remember" class="pure-checkbox">
				            <input  name="remember" id="remember" type="checkbox"> Remember me
				            </label>

							<input type="hidden" name="token" value="<?php echo token::generate(); ?>">
				
				            <button type="submit" class="pure-button pure-button-primary">Login</button>
				        </div>
						<div class="pure-controls">
				    <span class="error" style="color:#008000;"><?php echo $e[0];?></span><br>
					<span class="error" style="color:#008000;"> <?php echo $e[1];?></span><br>
				    <span class="error" style="color:#008000;"> <?php echo $e[2];?></span><br>
				    <span class="error" style="color:#008000;"><?php echo $e[3];?></span><br>
				    <span class="error" style="color:#008000;"><?php echo $e[4];?></span><br>
				    <span class="error" style="color:#008000;"><?php echo $e[5];?></span><br>
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