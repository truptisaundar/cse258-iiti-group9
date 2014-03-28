<html>
 <head>
	<link rel="stylesheet" href="swag.css" />
  </head>
       
       <body>
       <div class="container">
      		    <a href="index.php" id="logo">CMS</a>
                     <h4>
                        Add Article
      		      </h4>

         <?php if(isset($error)) {?>
         <small style="color:#aa0000;"><?php echo $error; ?>
         <br /> <br />
         <?php } ?>
    <form action="add.php" method="post" autocomplete="off" enctype="multipart/form-data">
<input type="text" name="title" placeholder="Title" /> <br> </br>
<textarea rows="15" cols="50" placeholder="Content" name="content"></textarea> <br /><br />
<input type="text"  name="author_name" placeholder="Authorname"><br><br>
File:
<input type="file"  name="file" value="file"><br>
<input type="submit" name="name" value="Upload">
  </form>
      		         </div>

<?php

include_once('includes/connection.php');
if(isset($_POST['name'])) {if(isset($_POST['file'])) echo 'file working';};
if(isset($_POST['name']));
{$file = $_FILES['file']['tmp_name'];
$F=$_FILES['file']['name'];
$name = $_FILES['file']['name'];
$extension= strtolower(substr($name, strpos($name,'.')+1));
$type= $_FILES['file']['type'];
$filesize= $_FILES['file']['size'];
echo "extension:".$extension;
echo "type:".$type;}


$title=$_POST['title'];
$content=nl2br($_POST['content']);
$author_name=$_POST['author_name'];
$article_name= $name;

  if(isset($title) && isset($_POST['content']) && isset($author_name) && isset($name)) 
  {
    	echo 'hi';
    
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
	    			$location = ' ../upl/';
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
			    
			      header('Location: index.php');
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
  ?>
 </body>
       </html>
