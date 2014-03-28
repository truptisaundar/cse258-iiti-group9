<?php
  if (isset($_POST["from"]))
    {
    $from = $_POST["from"]; 
    $subject = $_POST["subject"];
    $message = $_POST["detail"];
    
	$to_address=$_POST["To"];
	
	$message = wordwrap($message, 70);
	mail($to_address,$subject,$message,"From: $from\n");
  
	echo "Thank you for sending us feedback";
    }
   ?>
	
	