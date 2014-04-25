<?php
require_once 'core/init.php';
$user = new user();
if($user->isLoggedIn()) {
    redirect::to('index1.php');
}
$e=array("","","","","","","");
$i=0;
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
			  'email' => array(
			    'required' =>true
				),
		   		
		   ));
		   
		   
		   if($validation->passed()) {
		        $user = new user();
		        
		       $salt=hash::salt(32);
			   /*$grp=0;
				if(isset($_POST['opt1'])) {
				$grp=1;
				}
				if(isset($_POST['opt2'])) {
				$grp=2;
				}
				if(isset($_POST['opt3'])) {
				$grp=3;
				}
				if(isset($_POST['opt1']) && isset($_POST['opt2'])) {
				$grp=4;
				}
				if(isset($_POST['opt1']) && isset($_POST['opt3'])) {
				$grp=5;
				}
				if(isset($_POST['opt2']) && isset($_POST['opt3'])) {
				$grp=6;
				}
				if(isset($_POST['opt1']) && isset($_POST['opt2']) && isset($_POST['opt3'])) {
				$grp=7;
				}*/
				$rea=0;$aut=0;$rev=0;
				if(!empty($_POST['cb'])) {
				  foreach($_POST['cb'] as $check) {
				   if($check==1) {
				   $rea=1;
				   }
				   if($check==2) {
				   $aut=1;
				   }
				   if($check==3) {
				   $rev=1;
				   }
				  }
				}
				if($rea && !$aut && !$rev)
				{$grp=1;}
				if(!$rea && $aut && !$rev)
				{$grp=4;}
				if(!$rea && !$aut && $rev)
				{$grp=5;}
				if($rea && $aut && !$rev)
				{$grp=4;}
				if($rea && !$aut && $rev)
				{$grp=5;}
				if(!$rea && $aut && $rev)
				{$grp=6;}
				if($rea && $aut && $rev)
				{$grp=7;}
				$req = $_POST['gend'];
		        try {
				$var=1;
		        $user->create(array(
		             'username' => input::get('username'),
		             'password' => hash::make(input::get('password'),$salt) ,
		             'salt' => $salt,
		             'firname'=>input::get('name'),
					 'lastname'=>input::get('lname'),
		             'joined' => date('Y-m-d H:i:s'),
					 'email' =>input::get('email'),
					 'affiliation' =>input::get('affiliation'),
					 'reader' => $rea,
					 'author' => $aut,
					 'request' => $rev,
					 'Gender' => $req,
					 'group' => $grp
		             ));
					 
		             //session::flash('home' , 'You have been registered and now can log in!');
		             Redirect::to('index1.php');
		
		
		        } catch(Exception $e) {
		             die($e->getMessage());
		        }
		   } else{
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
<title>Registration Page</title>
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
                <li><a href="login.php">Login</a></li>
			    <li class="menu-item-divided pure-menu-selected"><a href="#">Register</a></li>
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
                   
            <h2 class="content-subhead">Register</h2>
            <p>
			<span>Please fill all the texts in the fields.</span><br>
			
			<form action="#" method="post" class="pure-form pure-form-aligned">
			    <fieldset>
			        <div class="pure-control-group">
			            <label for="username">Username</label>
			            <input name="username"  id="username" type="text" placeholder="Username" value="<?php echo escape(input::get('username')); ?>" autocomplete="off">
			        </div>
			
			        <div class="pure-control-group">
			            <label for="password">Password</label>
			            <input name ="password" id="password" type="password" placeholder="Password">
			        </div>
			        
			        <div class="pure-control-group">
			            <label for="password_again">Confirm password</label>
			            <input name ="password_again" id="password_again" type="password" placeholder="Confirm password">
			        </div>
			        
			        <div class="pure-control-group">
			            <label for="name">First name</label>
			            <input name ="name" id="name" type="text" placeholder="First name" value="<?php echo escape(input::get('name')); ?>">
			        </div>
			        
			        <div class="pure-control-group">
			            <label for="lname">Last name</label>
			            <input name ="lname" id="lname" type="text" placeholder="Last name" value="<?php echo escape(input::get('lname')); ?>">
			        </div>
			
			        
					<div class="pure-control-group">
			            <label for="email">Email Address</label>
			            <input id="email" name ="email" type="email" placeholder="Email Address" value="<?php echo escape(input::get('email')); ?>">
			        </div>
					<div class="pure-control-group">
			            <label for="affiliation">Affiliation</label>
			            <input id="affiliation" name ="affiliation" type="text" placeholder="Affiliation" value="<?php echo escape(input::get('affiliation')); ?>">
			        </div>
			
			       <div class="pure-control-group">
			         <label for="gender">Gender</label>
			         <select name ="gend">
					 <option value ="male">Male</option>
					 <option value ="female">Female</option>
					 <option value ="other">Other</option>
					 </select>
			         </div>
			         
			        <div class="pure-controls">
				             <label for="group" name="category">Category</label><br>
				                <input type="checkbox" name ="cb[]" value="1">Reader<br>
								<input type="checkbox" name ="cb[]" value="2">Author<br>
								<input type="checkbox" name ="cb[]" value="3">Reviewer<br>
				            </label>

							<input type="hidden" name="token" value="<?php echo token::generate(); ?>">
				
				            <button type="submit" class="pure-button pure-button-primary">Register</button>
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

	  