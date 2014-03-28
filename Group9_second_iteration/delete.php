<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
 
 if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = $pdo->prepare('DELETE FROM articles WHERE article_id = ?'); 
  $query->bindValue(1,$id);
  $query->execute();
  
  header('Location: delete.php');
 }
 $articles = $article->fetch_all();

?>

<html>
 <head>
<link rel="stylesheet" href="swag.css" />
       </head>
       
       <body>
       <div class="container">
      		    <a href="index.php" id="logo">CMS</a>
				
				<br />
				<h4>Select An Article to Delete</h4>
                    
    <form action="delete.php" method="post">
 <select onchange="this.form.submit();" name="id">
  <?php foreach($articles as $article) { ?>  
  <option value="<?php echo $article['article_id']; ?>"><?php echo $article['article_title']; ?></option>
  <?php } ?>
  </select>
  </form>
      		         </div>

       </body>
       </html>