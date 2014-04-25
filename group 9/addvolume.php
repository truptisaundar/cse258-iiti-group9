<?php
$conn = mysql_connect("localhost", "root", "") or die("error2");
$dbname = 'log1';
$a="";
mysql_select_db($dbname);
$query="SELECT * FROM volume";
$query_run=mysql_query($query)or die("error1");
if(isset($_POST['add']))
{
	if(!empty($_POST['name']) && !empty($_POST['year'])){
		$name=$_POST['name'];
		$year=$_POST['year'];
		$qu="INSERT INTO volume VALUES ('', '$name',$year)";
		mysql_query($qu) or die ("error is occured please fill a year(integer) value in field year in the form.");
		
		echo $a="New volume is added.<br>";
	}else 
	{
		echo $a="All fields are required.";
	}
	
	$page = $_SERVER['PHP_SELF'];
	$sec = "2";
	header("Refresh: $sec; url='http://localhost/final/admin.php'");
	
}
?>
<html>
<head>
<title>Send Review</title>
<link rel="stylesheet" href="css/layouts/css.css">
<link rel="stylesheet" href="css/layouts/side-menu2.css">
<script type="text/javascript">


</script>

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
                    <h2 class="content-subhead">Volumes</h2>
                    <div class="pure-controls">
				         	<button type="submit" class="pure-button pure-button-primary" name="add" onclick="AddVolume('VolumeForm');">Add Volume</button>
				         	<button type="submit" class="pure-button pure-button-primary" name="Show" onclick="ShowVolume('VolumeTable');">Show Volume</button>
				       
				    </div>
					
      		     		<div><br><br>
      		     		<table  class="pure-table pure-table-bordered" style="display:none;width:295px;" id="VolumeTable" >
							
							<thead>
								<tr>
								<th>Volume no</th>
								<th>Volume name</th>
								<th>Year</th>
								</tr>
							</thead>
							<tbody>
								<?php while($row=mysql_fetch_assoc($query_run)):?>
		      		    		<tr><td><?php echo $row['id'];?></td>
		      		    		<td><?php echo $row['name'];?></td>
		      		    		<td><?php echo $row['year'];?></td> 		    		
		      		   			</tr>
		      		   			<?php endwhile ;?>
							</tbody>
      		   			</table>
      		     		</div>
      		   			
      		   		<form action="addvolume.php" method="post" class="pure-form pure-form-aligned" style="display:none;" id="VolumeForm">
				    <fieldset>
				        <div class="pure-control-group">
				            <label for="username">Volume name</label>
				            <input id="username" name="name" type="text" placeholder="Volume name">
				        </div>
				
				        <div class="pure-control-group">
				            <label for="password">Year</label>
				            <input id="password" name="year" type="text"  placeholder="Year">
				        </div>
				        
				        
				        <div class="pure-controls">
				         	<button type="submit" class="pure-button pure-button-primary" name="add">Add Volume</button>
				        </div>
				        
				        <div class="pure-controls">
					    <span class="error" style="color:#008000"> <?php echo $a;?></span><br>
					    </div>
				
					    		
				    </fieldset>
				</form>
      		   			
      	</div>	    
    </div>
</div>

<script src="js/ui.js"></script>

</body>


</html>