<?php
$conn = mysql_connect("localhost", "root", "") or die("error");
$dbname = 'log1';
mysql_select_db($dbname);
$id=$_GET['q'];

$a=" ";
if(isset($_GET['form']))
{
	$conn = mysql_connect("localhost", "root", "") or die("error");
	mysql_select_db('log1')or die("error");
	if(!empty($_GET['check_list']))
	{
	
		foreach($_GET['check_list'] as $check)
		{
	
			mysql_query("UPDATE articles SET uploaded = 1 , volume_no=$check WHERE article_id =$id") or die("error1");
			
		}
		$a="Selected article is published in volume no ".$check;
		$page = $_SERVER['PHP_SELF'];
		$sec = "1";
		header("Refresh: $sec; url='http://localhost/final/admin.php'");
	}
	else 
	{
		$a="Select a volume for article to publish.";
	}
	
}
?>
<html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
<title>Publish Article</title>
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
                    <h2 class="content-subhead">Select Volume</h2>
                    <p>
	 				<form action="uploadarticle.php" id="formId" method="get" >
	 						<!--  <table class="width100" border="1" style="border-color:#E3E3E3;">
	      		     		<col class="width5" style="background-color:#fff;">
	      		   			<col class="width6" style="background-color:#fff;"/>
							<col class="width10" style="background-color:#fff;"/>
							<col class="width7" style="background-color:#fff;"/>
							<tr>
							<td></td>
							<td style="color:#008000;"><strong>Volume no</strong></td>
							<td style="color:#008000;"><strong>Volume name</strong></td>
							<td style="color:#008000;"><strong>Year</strong></td>
							</tr>&nbsp;
							<tr>-->
							<table  class="pure-table pure-table-bordered" style="width:450px;" id="VolumeTable" >
							
							<thead>
								<tr>
								<th>#</th>
								<th>Volume no</th>
								<th>Volume name</th>
								<th>Year</th>
								</tr>
							</thead>
							
							<tbody>
			      		     <?php 
			      		     $query="SELECT * FROM volume";
			      		     $query_run=mysql_query($query)or die(error);
							while($row=mysql_fetch_assoc($query_run)):?>
							
							<tr>
							<td><input type="checkbox" id="<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>" name="check_list[]"></td>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['name'];?></td>
		      		    	<td><?php echo $row['year'];?></td>
		      		    	</tr><?php endwhile ;?>
		      		    	</tbody>
		      		    	
		      		    	</table>
		      		    	
		      		   		<input type="hidden" name="q" value="<?php echo $id;?>">
		      		   		<br><button type="submit" name="form" class="pure-button pure-button-primary">Publish</button> 
		      		   		
		      		   		<div class="pure-controls">
							<br><span class="error" style="color:#008000"> <?php echo $a;?></span><br>
					    	</div>
	      	  </form>
      		 </p>
   
        </div>
    </div>
</div>

<script src="js/ui.js"></script>

</body>

</html>