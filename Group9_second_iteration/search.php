	<form action="search.php" method="post">
   <div class ="field">
     <label for="Search">Search By ArticleTitle</label>
     <input type="text" name="article" id="Search" autocomplete="off">
     </div>

    <input type="submit" value="Go">
   </form>
<?php
$conn_error = 'Could Not Connect.';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'log1';

// initialize searchvar with a value
//$searchvar = 'it';
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db) or die($conn_error);

	mysql_select_db("log1");
	if(isset($_POST['article']))
	{
		$key = $_POST['article'];
	    if($key=='')
		{echo "<script>alert('Please enter your search key!')</script>";
		 exit();
		}
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT * FROM articles
WHERE article_title LIKE '%".$key."%'");

  while($row = mysqli_fetch_array($result))
  {
  echo "Article Id :" . $row['article_id'] .'<br>';
   echo "Article Name :" . $row['article_title'] . '<br>';
   echo "Article Details:". $row['article_content'];
	echo "<br>";
  }
}



?>