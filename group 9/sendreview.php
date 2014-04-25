<?php
$conn = mysql_connect("localhost", "root", "") or die("error");
$dbname = 'log1';
mysql_select_db($dbname);
$id=$_GET['q'];
$query="SELECT * FROM articles WHERE article_id=$id";
if($query_run=mysql_query($query)){

	$query_row=mysql_fetch_assoc($query_run);
	
}
else
{
	echo mysql_error();
}
$msg="";
if (isset($_GET["submit"]))
{
	
	$from = $_GET["from"];
	$subject = $_GET["subject"];
	$message = $_GET["detail"];
	$message = wordwrap($message, 70);
	
		
		if(empty($from) or empty($message))
		{
			$msg = 'Review and from are Required';
		
		}
		else 
		{
			$flgchk = mail($query_row['author_email'],$subject,$message,"From: $from\n");
			if($flgchk){
				$msg= "Review is sent to: ". $query_row['author_email'];
				$page = $_SERVER['PHP_SELF'];
				$sec = "3";
				header("Refresh: $sec; url='http://localhost/final/admin.php'");
			}
			else{
				$msg="Error in Email sending";
			}
		}
	
	
}

?>
<html>
<head>

<title>Send Review</title>
<link rel="stylesheet" href="css/layouts/css.css">
<link rel="stylesheet" href="css/layouts/side-menu2.css">
</head>

<body>

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
    <!-- Hamburger icon -->
    <span></span>
    </a>

    

                    <div id="main">
                    
                    <div class="header"><img  src="LGO.png" name="slide" width="80" height="80">
                    <h1>eyond Borders</h1>
			      	
			      	<nav class="navigation" role="navigation" aria-label="main navigation">
		       		 
		       		 <ul class="navigation-menu">
					 
			          <li class="navigation-menu-item is-selected"><a href="logout.php">Log out</a></li>
			          <li class="navigation-menu-item"><a href="update.php">Update details</a></li>
			          <li class="navigation-menu-item"><a href="changepassword.php">Change Password</a></li>
			          <li class="navigation-menu-item"><a href="permitrev.php">Permit Reviewer</a></li>
					  <li class="navigation-menu-item"><a href="admin.php">Home</a></li>
        			</ul>
        			</nav>
                   
                    </div>
                     

                    <div class="content">
                    <h2 class="content-subhead">Send Review</h2>
                    <p>
						<table width="300" border="0" align="centre" cellpadding="3" cellspacing="1">
						
						</table>
						<table width="300" border="0" align="centre" cellpadding="0" cellspacing="1">
						<tr>
						<td><form name="forum" method="get" action="sendreview.php">
						<table width="100%" border="0" align="centre" cellpadding="3" cellspacing="1">
						
						<!--<tr>
						<td>To </td>
						<td>:</td>
						<td><input name="To" type="text" id="To" size="50" placeholder="<?php echo $query_row['author_email'];?>"></td>
						
						</tr>    -->
						<tr>
						<td width="14%">Subject</td>
						<td width="2%">:</td>
						<td width="84%"><input name="subject" type="text" id="subject" size="30"></td>
						</tr>
						<tr>
						<td>Review</td>
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
						<td>
						<input type="submit" name="submit" value="submit" class="pure-button pure-button-primary">
						<input type="reset" name="Submit2" value="Reset" class="pure-button pure-button-primary">
						</td>
						</tr>
						</table>
						<input type="hidden" name="q" value="<?php echo $id;?>">
						
						</form>
						</td>
						</tr>
						</table>
						<div class="pure-controls">
					    <span class="error" style="color:#008000"> <?php echo $msg;?></span><br>
					    </div> 
					    	
							
					</p>
               </div>
               
    </div>
    
</div>




<script src="js/ui.js"></script>

							
					

</body>


</html>