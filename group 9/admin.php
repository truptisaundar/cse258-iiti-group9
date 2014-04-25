<?php

include_once('includes/connection.php');
include_once('includes/article.php');
require_once 'core/init.php';

$article = new Article;
$articles= $article->fetch_all();
$fileStorage = '/final/upl/';
$user = new user();
if(!$user->isLoggedIn()) {
    redirect::to('index1.php');
}
if(!$user->hasPermission('admin')) {
	redirect::to('index1.php');
}
?>
<!doctype html>
<html lang="en">
<head>

<title>Admin Page</title>

<link rel="stylesheet" href="css/layouts/css.css">
<link rel="stylesheet" href="css/layouts/side-menu.css">

<script type="text/javascript">
      		function delete1(formId){
      			
      			var theForm = document.getElementById(formId); // get the form
      			
      			var cb = document.getElementsByTagName('input'); // get the inputs
      			
      			
      			for(var i=0;i<cb.length;i++){ 
      			    if(cb[i].type=='checkbox' && cb[i].checked)  // if this is an unchecked checkbox
      			    {
      			       
	      			   if (window.XMLHttpRequest){
		      			   xmlhttp=new XMLHttpRequest();
		      			   }else{
			      			   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		      			   }  
	      				
	      			   xmlhttp.onreadystatechange=function(){
		      			   if (xmlhttp.readyState==4 && xmlhttp.status==200){
		      			   
		      			    location.href="http://localhost/final/admin.php";
		      			   
		      			  
		      			   }
	   			  		 } 	   
	      			   xmlhttp.open("GET","delete.php?q="+cb[i].value,true);
	      			   xmlhttp.send();
	      			   
      			}
  			  }
      			
  }
      		function sendReview(formId){
    			
    			var theForm = document.getElementById(formId); // get the form
    			
    			var cb = document.getElementsByTagName('input'); // get the inputs
    			
    			for(var i=0;i<cb.length;i++){ 
    			    if(cb[i].type=='checkbox' && cb[i].checked)  // if this is an unchecked checkbox
    			    {
    			      
	      			   if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();} 
	      			   else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	      			   
	      				xmlhttp.onreadystatechange=function(){
	 	      			   if(xmlhttp.readyState==4 && xmlhttp.status==200)
	 	      			   {
	 							document.getElementById('ts').innerHTML=xmlhttp.responseText;
	 		      			   }
	 	      			   }
	       			
	      			   xmlhttp.open("GET","sendreview.php?q="+cb[i].value,true);
	      			   xmlhttp.send();
	      			    
    			}
    			}}
				function uploadArticle(formId){
    			
    			var theForm = document.getElementById(formId); // get the form
    			
    			var cb = document.getElementsByTagName('input'); // get the inputs
    			
    			for(var i=0;i<cb.length;i++){ 
    			    if(cb[i].type=='checkbox' && cb[i].checked)  // if this is an unchecked checkbox
    			    {
    			       
	      			   if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();} 
	      			   else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	      			   
	      			 		xmlhttp.onreadystatechange=function(){
	 	      			   if(xmlhttp.readyState==4 && xmlhttp.status==200)
	 	      			   {
	 							document.getElementById('ts').innerHTML=xmlhttp.responseText;
	 		      			   }
	 	      			   }
	      			   
	      			   xmlhttp.open("GET","uploadarticle.php?q="+cb[i].value,true);
	      			   xmlhttp.send();
	      			    
    			}
    			}}
				function assignreviewer(formId){
	    			
	    			var theForm = document.getElementById(formId); // get the form
	    			
	    			var cb = document.getElementsByTagName('input'); // get the inputs
	    			
	    			for(var i=0;i<cb.length;i++){ 
	    			    if(cb[i].type=='checkbox' && cb[i].checked)  // if this is an unchecked checkbox
	    			    {
	    			       
		      			   if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();} 
		      			   else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		      			   
		      			     xmlhttp.onreadystatechange=function(){
		 	      			   if(xmlhttp.readyState==4 && xmlhttp.status==200)
		 	      			   {
		 							document.getElementById('ts').innerHTML=xmlhttp.responseText;
		 		      			   }
		 	      			   }
		      			
		      			   xmlhttp.open("GET","assignre.php?q="+cb[i].id,true);
		      			    
		      			   xmlhttp.send();
		      			    
	    			}
	    			}}
				function add_volume(formId){
	    			  			       
		      			   if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();} 
		      			   else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		      			     xmlhttp.onreadystatechange=function(){
		 	      			   if(xmlhttp.readyState==4 && xmlhttp.status==200)
		 	      			   {
		 							document.getElementById('ts').innerHTML=xmlhttp.responseText;
		 		      			   }
		 	      			   }
		      			   xmlhttp.open("GET","addvolume.php");
		      			    
		      			   xmlhttp.send();
		      			    			
	    			}
				function sendForm(formId){
	    			
	    			var theForm = document.getElementById(formId); // get the form
	    			
	    			var cb = document.getElementsByTagName('input'); // get the inputs
	    		
	    			
	    			for(var i=0;i<cb.length;i++){ 
	    			    if(cb[i].type=='checkbox' && cb[i].checked)  // if this is an unchecked checkbox
	    			    {
	    			    	params="q="+cb[i].value;  
		      			   if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();} 
		      			   else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		      			
		      				xmlhttp.onreadystatechange=function(){
		 	      			   if(xmlhttp.readyState==4 && xmlhttp.status==200)
		 	      			   {
		 							document.getElementById('ts').innerHTML=xmlhttp.responseText;
		 		      			   }
		 	      			   }
		       			
		      			   xmlhttp.open("POST","sendform.php",true);
		      			 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		      			//xmlhttp.setRequestHeader("Content-length", params.length);
		      			//xmlhttp.setRequestHeader("Connection", "close");
		      			   xmlhttp.send(params);
		      			    
	    			}
	    			}}
				function viewVolume(formId){
	  			       
	      			   if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();} 
	      			   else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	      			     xmlhttp.onreadystatechange=function(){
	 	      			   if(xmlhttp.readyState==4 && xmlhttp.status==200)
	 	      			   {
	 							document.getElementById('ts').innerHTML=xmlhttp.responseText;
	 		      			   }
	 	      			   }
	      			   xmlhttp.open("GET","viewvolumes.php");
	      			    
	      			   xmlhttp.send();
	      			    			
 			}
				function ShowVolume(formName){
					document.getElementById('VolumeTable').style.display='block';
					document.getElementById('VolumeForm').style.display='none';
				}		
				function AddVolume(tableName){
					document.getElementById('VolumeForm').style.display='block';
					document.getElementById('VolumeTable').style.display='none';
				}	
				  				
	      		
      		</script>
      		
    </head>
    <body id='ts'>

	 <div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
    <!-- Hamburger icon -->
    <span></span>
    </a>

    

                    <div id="main">
                    
                    <div class="header"> <img  src="LGO.png" name="slide" width="80" height="80">
                    <h1>eyond Borders</h1>
			      	
			      	<nav class="navigation" role="navigation" aria-label="main navigation">
		       		 
		       		 <ul class="navigation-menu">
					 
			          <li class="navigation-menu-item is-selected"><a href="logout.php">Log out</a></li>
			          <li class="navigation-menu-item"><a href="update.php">Update details</a></li>
			          <li class="navigation-menu-item"><a href="changepassword.php">Change Password</a></li>
			          <li class="navigation-menu-item"><a href="permitrev.php">Permit Reviewer</a></li>
					  <li class="navigation-menu-item"><a href="#">Home</a></li>
        			</ul>
        			</nav>
                   
                    </div>
                     

                    <div class="content">
                    <h2 class="content-subhead">Admin Page</h2>
                    <p>
                   
                    <form action="tocheckcss.php" id="formId" method="post">
      		     		<table class="width100" border="1" style="border-color:#E3E3E3;">
      		     		<col class="width1" style="background-color:#fff;">
      		     		<col class="width2" style="background-color:#fff;"/>
      		     		<col class="width21" style="background-color:#fff;"/>
      		     		<col class="width3" style="background-color:#fff;"/>
						<col class="width4" style="background-color:#fff;"/>
						
						<tr>
							<td style="background-color:#cbcbcb;"></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>Article Title</strong></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>Author Name</strong></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>Abstract</strong></td>
							<td style="color:#008000;background-color:#cbcbcb;"><strong>Pdf</strong></td>
							</tr>&nbsp;
						<tr>

      		   			 <?php foreach($articles as $article):?>
      		    		<tr>
      		    		<td><input type="checkbox" id="<?php echo $article['article_name'];?>" value="<?php echo $article['article_id'];?>" name="cb[]" ></td>
      		    		<td><?php echo $article['article_title'];?></td>
      		    		<td><?php echo $article['author_name'];?></td>
      		    		<td><?php echo $article['article_content'];?></td>
      		    		<td><?php echo '<a href="'. $fileStorage . $article['article_name'] .'">pdf</a><br />'?></td>
      		   			 </tr>
      		   			 <?php endforeach; ?>
      		   			</table>
						
		   					<br>
		   					 <div id="menu">
        						<div class="pure-menu pure-menu-open">
           							 <a class="pure-menu-heading" href="#" style="background-color:#000000;">Options</a>

           								 <ul>
		   						
								      		    <input type="button" class="button-secondary pure-button"  value="Delete" onclick="delete1(formId);">
								      		    <input type="button" class="button-secondary pure-button" value="Send review" onclick="sendReview(formId);">
								      		    <input type="button" class="button-secondary pure-button" value="Assign reviewer" onclick="assignreviewer(formId);">
								      		    <input type="button" class="button-secondary pure-button" value="Publish article" onclick="uploadArticle(formId);" >
								      		    <input type="button" class="button-secondary pure-button" value="Add volume" onclick="add_volume(formId);">
								      		    <input type="button" class="button-secondary pure-button" value="Send Form" onclick="sendForm(formId);">
								      		    <input type="button" class="button-secondary pure-button" value="View volumes" onclick="viewVolume(formId);">
								      		    
			      		   				 </ul>
			      		 	   </div>
   						    </div>
			      		 
			      	 </form>
            </p>
            
        </div>
    </div>
</div>




<script src="js/ui.js"></script>


</body>
</html>
