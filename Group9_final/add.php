<html>
<title>Submit Article</title>
 <head>
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
					<nav class="navigation" role="navigation" aria-label="main navigation">
		<ul class="navigation-menu" id="horizontal_menu">
					 <li class="navigation-menu-item"><a href="index1.php">Home</a></li>
					 <li class="navigation-menu-item is-selected"><a href="logout.php">Log out</a></li>
			          <li class="navigation-menu-item"><a href="update.php">Update details</a></li>
			          <li class="navigation-menu-item"><a href="changepassword.php">Change Password</a></li>
					 </ul>
					  </nav>
                    </div>
             </div>
       <div class="content">
      		  
              <h2 class="content-subhead">Add article</h2>
	         
	          <p>
				<form action="add.php" method="post" autocomplete="off" enctype="multipart/form-data">
				<input type="text" name="title" placeholder="Title" /> <br> </br>
				<textarea rows="15" cols="50" placeholder="Abstract" name="content"></textarea> <br /><br />
				<input type="text"  name="author_name" placeholder="Authorname"><br><br>
				File:
				<input type="file"  name="file" value="file" style="color:#aa0000;"><br><br>
				<input type="submit" name="name" value="Upload" class="pure-button pure-button-primary">
				</form>
				<?php if(isset($error)) {?>
		         <small style="color:#aa0000;"><?php echo $error; ?></small>
		         <br /> <br />
	            <?php } ?>
			 </p>
      </div>

<?php

include_once('includes/connection.php');
if(isset($_POST['name']))
{       
		$file = $_FILES['file']['tmp_name'];
		$name = $_FILES['file']['name'];
		$extension= strtolower(substr($name, strpos($name,'.')+1));
		$type= $_FILES['file']['type'];
		$filesize= $_FILES['file']['size'];
		
		$title=$_POST['title'];
		$content=nl2br($_POST['content']);
		$author_name=$_POST['author_name'];
		$article_name= $name;

	  if(isset($title) && isset($_POST['content']) && isset($author_name) && isset($name)) 
	  {
	    	
	    
		    if(empty($title) or empty($content) or empty($author_name))
		     {
		      $error = 'All Fields are Required';
		      echo $error;
		
		    }    
		    else 
		    {
	    	
	    
		    	if(!empty($name))
		    	{
		    		
		    		 if(($extension=='txt'||$extension=='pdf'||$extension=='docx'||$extension=='doc') && ($type=='text/plain'||$type=='application/pdf'||$type=='application/doc'||$type=='application/docx'))
		    		 {
			    			$location = 'upl/';
			    			if(move_uploaded_file($file, $location.$name))
			    			{
			    				echo 'uploaded';
			    			}
			    		    $query = $pdo->prepare('INSERT INTO articles(article_title,article_content,article_timestamp,author_name,article_name) VALUES(?,?,?,?,?)');
					    
						    $query->bindValue(1,$title);
						    $query->bindValue(2,$content);
						    $query->bindValue(3,time());
						    $query->bindValue(4,$author_name);
						    $query->bindValue(5,$article_name);
						    
						    $query->execute();
					    
					   
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
	  }

}
  ?>
  <script src="js/ui.js"></script>
 </body>
       </html>
	   
