<?php
$conn = mysql_connect("localhost", "root", "") or die("error2");
$dbname = 'log1';
$a="";
mysql_select_db($dbname);
$query="SELECT * FROM users WHERE request=1";
$query_run=mysql_query($query)or die("error1");
if(isset($_POST['permit']))
{
	if(!empty($_POST['list']))
	{
		foreach($_POST['list'] as $check)
		{
			
			mysql_query("UPDATE users SET reviewer = 1, request= 0  WHERE id = $check") or die("error3");
		}
		
		$a="Selected ones are permitted as reviewer<br>";
		$page = $_SERVER['PHP_SELF'];
		$sec = "3";
		header("Refresh: $sec; url='http://localhost/final/admin.php'");
		
	}
	else 
	{
		$a = "Select the request to permit as reviewer.";
	}
}
?>
<html>
<head>
<title>Permit Reviewer</title>
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
			          <li class="navigation-menu-item"><a href="#">Permit Reviewer</a></li>
					  <li class="navigation-menu-item"><a href="admin.php">Home</a></li>
        			</ul>
        			</nav>
                   
                    </div>              

                    <div class="content">
                    <h2 class="content-subhead">Requests For Reviewer</h2>
                    <p>
					<form action="permitrev.php" id="formId" method="post">
      		     		<table class="width100" border="1" style="border-color:#E3E3E3;">
	      		     		<col class="width5" style="background-color:#fff;">
	      		   			<col class="width6" style="background-color:#fff;"/>
							<col class="width7" style="background-color:#fff;"/>
							<col class="width8" style="background-color:#fff;"/>
							<col class="width9" style="background-color:#fff;"/>
							<tr>
							<td style="background-color:#cbcbcb;"></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>Name</strong></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>Email</strong></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>affiliation</strong></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>joined date</strong></td>
							</tr>&nbsp;
							<tr>
							<?php 
							while($row=mysql_fetch_assoc($query_run)):?>
		      		    		<td><input type="checkbox" id="<?php echo $row['id'];?>" value="<?php echo $row['id'];?>" name="list[]" ></td>
		      		    		<td><?php echo $row['firname']." ". $row['lastname'];?></td>
		      		    		<td><?php echo $row['email'];?></td>
		      		    		<td><?php echo $row['affiliation'];?></td>
		      		    		<td><?php echo $row['joined'];?></td>
		      		    		
		      		   		</tr><?php endwhile ;?>
      		   			</table>
      		   			
      		   			<br><button type="submit" name="permit" class="pure-button pure-button-primary">Permit Reviewer</button>
      		   			<div class="pure-controls">
						<br><span class="error" style="color:#008000"> <?php echo $a;?></span><br>
					    </div>
      		   	</form>
      		    
        </div>
    </div>
</div>

<script src="js/ui.js"></script>

</body>


</html>