
<?php 

$id=$_POST['q'];

$conn = mysql_connect("localhost", "root", "") or die("error");
$dbname = 'log1';
mysql_select_db($dbname);
$query="SELECT * FROM articles WHERE article_id=$id";
if($query_run=mysql_query($query)){

	$query_row=mysql_fetch_assoc($query_run);
}
else
{
	echo mysql_error();
}
$msg="";
if (isset($_POST["submit"]))
{	
	
	
	$to = $query_row['author_email'];
	$fromEmail = $_POST['fieldFormEmail'];
	$fromName = $_POST['fieldFormName'];
	$subject = $_POST['fieldSubject'];
	$message = $_POST['fieldDescription'];
	$tmpName = $_FILES['attachment']['tmp_name'];
	$fileType = $_FILES['attachment']['type'];
	$fileName = $_FILES['attachment']['name'];
	if(isset($tmpName)  && isset($fromEmail) && isset($fromName))
	{	
		
		if(empty($fromEmail) or empty($fromName))
		{
			$msg = 'your email and your name are Required';		
		
		}
		else
		{	  
			
			if(!empty($tmpName))
			{$headers = "From: $fromName";
	
				if (file($tmpName)) {
					
					/* Reading file ('rb' = read binary)  */
					$file = fopen($tmpName,'rb');
					$data = fread($file,filesize($tmpName));
					fclose($file);
				
					/* a boundary string */
					$randomVal = md5(time());
					$mimeBoundary = "==Multipart_Boundary_x{$randomVal}x";
				
					/* Header for File Attachment */
					$headers .= "\nMIME-Version: 1.0\n";
					$headers .= "Content-Type: multipart/mixed;\n" ;
							$headers .= " boundary=\"{$mimeBoundary}\"";
				
							/* Multipart Boundary above message */
							 $message = "This is a multi-part message in MIME format.\n\n" .
							 "--{$mimeBoundary}\n" .
							 "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
							 "Content-Transfer-Encoding: 7bit\n\n" .
							 $message . "\n\n";
				
							/* Encoding file data */
							$data = chunk_split(base64_encode($data));
				
							/* Adding attchment-file to message*/
							$message .= "--{$mimeBoundary}\n" .
							"Content-Type: {$fileType};\n" .
							" name=\"{$fileName}\"\n" .
							"Content-Transfer-Encoding: base64\n\n" .
							$data . "\n\n" .
							"--{$mimeBoundary}--\n";
				}
	
				$flgchk = mail ("$to", "$subject", "$message", "$headers");
	
				if($flgchk){
				
				$msg= "A email has been sent to: $to";
				$page = $_SERVER['PHP_SELF'];
				$sec = "3";
				header("Refresh: $sec; url='http://localhost/final/admin.php'");
				
				}
				else{
				$msg="Error in Email sending";
				}
			}
			else 
			{
				$msg= "Attach a form.";
			}
		}
	}
}
?>
<!-- <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email Attachment Without Upload - Excellent Web World</title>
<style>
body{ font-family:Arial, Helvetica, sans-serif; font-size:13px;}
th{ background:#999999; text-align:right; vertical-align:top;}
input{ width:181px;}
</style>
</head> -->

<html>
<head>
<title>Send form</title>
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
                    <h2 class="content-subhead">Send Form</h2>
                    <p>

					    <form action="sendform.php" method="post" name="mainform" enctype="multipart/form-data">
					    <table width="500" border="0" cellpadding="5" cellspacing="5">
					       <tr>
					        <th>Your Name</th>
					        <td><input name="fieldFormName" type="text"></td>
					    </tr>
					    <tr>
					    <tr>
					        <th>Your Email</th>
					        <td><input name="fieldFormEmail" type="email"></td>
					    </tr>
					    
					    <tr>
					        <th>Subject</th>
					        <td><input name="fieldSubject" type="text" id="fieldSubject"></td>
					    </tr>
					    <tr>
					        <th>Comments</th>
					        <td><textarea name="fieldDescription" cols="20" rows="4" id="fieldDescription"></textarea></td>
					    </tr>
					    <tr>
					      <th>Attach Your File</th>
					      <td><input name="attachment" type="file"></td>
					    </tr>
					    <tr>
					         <input type="hidden" name="q" value="<?php echo $id;?>">
					        <td colspan="2" style="text-align:center;"><input type="submit" name="submit" value="Send" class="pure-button pure-button-primary">
					        <input type="reset" name="Reset" value="Reset" class="pure-button pure-button-primary"></td>
					    </tr>
					    
					   	<div class="pure-controls">
					    <span class="error" style="color:#008000"> <?php echo $msg;?></span><br>
					    </div> 
					    
					    </table>
					    </form>
					</p>
               </div>
               
    </div>
    
</div>


<script src="js/ui.js"></script>

						

</body>


</html>