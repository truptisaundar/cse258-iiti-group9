	<?php
$conn = mysql_connect("localhost", "root", "") or die("error");
$dbname = 'log1';
mysql_select_db($dbname);

$id=$_GET['q'];

$a= 0;
$m="";
if(isset($_GET['form']))
{
	$conn = mysql_connect("localhost", "root", "") or die("error");
	mysql_select_db('log1')or die("error");
	
	
	if(!empty($_GET['check_list']))
	{	
		foreach($_GET['check_list'] as $check)
	
		{
			
			$qu="INSERT INTO reviewart VALUES ('', $check ,'$id')";
			mysql_query($qu) or die ("error4");
			$a=1;
		}
		if($a==1)
		{	
			$m ="Selected reviewers are assigned.";
			$page = $_SERVER['PHP_SELF'];
			$sec = "2";
			header("Refresh: $sec; url='http://localhost/final/admin.php'");
		}
	}
	else 
	{
		$m = "Select Reviewers to assign.";
	}
}

?>
<html>
<html>
<head>
<title>Assign reviewer</title>
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
                    <h2 class="content-subhead">Assign Reviewer</h2>
                    <p>
	 				<form action="assignre.php" id="formId" method="get" >
	 						<table class="width100" border="1" style="border-color:#E3E3E3;">
	      		     		<col class="width5" style="background-color:#fff;">
	      		   			<col class="width6" style="background-color:#fff;"/>
							<col class="width7" style="background-color:#fff;"/>
							<col class="width10" style="background-color:#fff;"/>
							<tr>
							<td style="background-color:#cbcbcb;"></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>Name</strong></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>Email</strong></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>affiliation</strong></td>
							</tr>&nbsp;
					
							<tr>
			      		     <?php 
			      		     $query="SELECT * FROM users WHERE reviewer=1";
			      		     $query_run=mysql_query($query)or die(error);
							while($row=mysql_fetch_assoc($query_run)):?>
							<td><input type="checkbox" id="<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>" name="check_list[]"></td>
							<td><?php echo $row['firname']." ". $row['lastname'];?></td>
							<td><?php echo $row['email'];?></td>
		      		    	<td><?php echo $row['affiliation'];?></td>
		      		    	</tr><?php endwhile ;?>
		      		    	</table>
		      		   		<input type="hidden" name="q" value="<?php echo $id;?>">
		      		   		<br><button type="submit" name="form" class="pure-button pure-button-primary">Assign</button>
		      		   		<div class="pure-controls">
							 <span class="error" style="color:#008000;"><?php echo $m;?></span><br>
							</div>
		      		   		
	      	  </form>
      		 </p>
   
        </div>
    </div>
</div>

<script src="js/ui.js"></script>

</body>

</html>