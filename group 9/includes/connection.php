<?php

try {
  $pdo =new PDO('mysql:host=localhost;dbname=log1','root','');
} catch(PDOException $e) {
  exit('Database Error.');
}

?>
