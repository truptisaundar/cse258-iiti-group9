<?php
require_once 'core/init.php';
$user = new user();
$var ='';

  if (isset($_POST["Submit"]))
    {
		$from = $_POST["from"]; 
		$subject = $_POST["subject"];
		$message = $_POST["detail"];
		
		$to_address=$_POST["To"];
	
		if(empty($from) or empty($to_address))
		{
			$var = 'To and form fields are required';
		}
		else 
		{
		$message = wordwrap($message, 70);
		$var = mail($to_address,$subject,$message,"From: $from\n");
			if($var) {
			$var = 'Email has been Sent..!!';
			}
			else {
			$var = 'Error in Email Sending';
			}
		}
	   }
   ?>
<html>
<head>
<title> Contact form</title>
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
<table width="300" border="0" align="centre" cellpadding="3" cellspacing="1">
<tr>
<td></br></br><strong>Contact form</strong></td>
</tr>
</table>
<table width="300" border="0" align="centre" cellpadding="0" cellspacing="1">
<tr>
<td><form name="forum" method="post" action="retrieval_contact.php">
<table width="100%" border="0" align="centre" cellpadding="3" cellspacing="1">

<tr>
<td>To </td>
<td>:</td>
<td><input name="To" type="email" id="To" size="50"></td>

</tr>
<tr>
<td width="14%">Subject</td>
<td width="2%">:</td>
<td width="84%"><input name="subject" type="text" id="subject" size="30"></td>
</tr>
<tr>
<td>Detail</td>
<td>:</td>
<td><textarea name="detail" cols="50" rows="6" id="detail"></textarea></td>
</tr>
<tr>
<td>From</td>
<td>:</td>
<td><input name="from" type="text" id="from"  size="50"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit" class="pure-button pure-button-primary"> 
<input type="reset" name="Submit2" value="Reset" class="pure-button pure-button-primary"></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
					<div class="pure-controls">
					    <span class="error" style="color:#008000"> <?php echo $var;?></span><br>
					    </div> 
</div>
    </div>
</div>
</body>


</html>

