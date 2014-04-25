<?php

//include_once('includes/connection.php');
//include_once('includes/article.php');

//$article = new Article;
 
//$query=$_GET["query"];
//$result = mysql_query($query);
//now use mysql_fetch_assoc($result) or something similar to get the returned result if applicable.
//if you echo a value, the javascript ajax will receive it
 // $id = $_GET["cb[i].value"];
 // $query = $pdo->prepare('DELETE FROM articles WHERE article_no = ?'); 
 // $query->bindValue(1,$id);
 // $query->execute();
  
  //header('Location: delete.php');
 
// $articles = $article->fetch_all();
$conn = mysql_connect("localhost", "root", "") or die("error");
$dbname = 'log1';
mysql_select_db($dbname);
$id=$_GET['q'];
echo $id;
mysql_query("DELETE FROM articles WHERE article_id =$id");

?>
<html>
<head>hi</head>
<body>
<h1>hello</h1>
</body>
</html>


 xmlhttp.open("GET","sendpdftorev.php?r&a="+cb[i].value,$id,true);