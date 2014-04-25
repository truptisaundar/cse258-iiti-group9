<?php
  if (isset($_POST["Submit"]))
    {
		$from = $_POST["from"]; 
		$subject = $_POST["subject"];
		$message = $_POST["detail"];
		
		$to_address=$_POST["To"];
	
		if(empty($from) or empty($to_address))
		{
			echo 'To and form fields are required';
		}
		else 
		{
		$message = wordwrap($message, 70);
		$var = mail($to_address,$subject,$message,"From: $from\n");
			if($var) {
			echo 'Email has been Sent..!!';
			}
			else {
			echo 'Error in Email Sending';
			}
		}
	   }
   ?>
	
	