<?php
$conn_error = 'Could Not Connect.';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'log1';

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db) or die($conn_error);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT * FROM articles");

  while($row = mysqli_fetch_array($result))
  {
  echo "Id_no :" . $row['article_id'] .'<br>';
   echo "Article Name :" . $row['article_title'] . '<br>';
   echo "Abstract:". $row['article_content'];
  echo "<br>";
  }



?>