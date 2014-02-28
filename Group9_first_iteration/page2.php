
<html>
<head>
	<title>Online submission</title>
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
		    <li><a href="search.php">Search</a></li>
		    <li><a href="page2.php">OnlineSubmission</a></li>
		</ul>
	    </nav>
		</div>
		<div id="divAbout">
		<div id="divContent">
		<center>
		<h1>Online Submission</h1>
		</center>
		<form action="page2.php" method="post" enctype="multipart/form-data">
			Author name:<input type="text"  name="author_name"><br>
			Article name:<input type="text"  name="article_name"><br>
			File:
			<input type="file"  name="article"><br>
			<input type="submit" name="name" value="Upload">
		</form>
		</div>
		</div>
	</div>
<?php
error_reporting(0);
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("log1")or die(mysql_error());
 
$file = $_FILES['article']['tmp_name'];
$name = $_FILES['article']['name'];
$extension= strtolower(substr($name, strpos($name,'.')+1));
$type= $_FILES['article']['type'];


if(isset($file))
{
	if(!empty($file))
	{
		$article=addslashes(file_get_contents($_FILES['article']['tmp_name']));
		$author_name= $_POST['author_name'];
		$article_name= $_POST['article_name'];
		if(($extension=='txt'||$extension=='pdf'||$extension=='docx'||$extension=='doc') && ($type=='text/plain'||$type=='application/pdf'||$type=='application/doc'||$type=='application/docx'))
		{
			if(!$insert = mysql_query("INSERT INTO uploads VALUES('','$author_name','$article_name','$article')"))
			{
				echo "Problem uploading image.";
			}
			else 
			{
				echo "Article uloaded.";
			}
		}
		else 
		{
			echo "File must be txt or pdf or docx.";
		}
	}
	else 
	{
		echo "Please select an article.";
	}

}


 ?>                           

</body>
</html>
