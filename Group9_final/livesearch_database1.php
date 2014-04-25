<!doctype html>
<html lang="en">
<body>
<?php
	require_once 'core/init.php';
	$user = new user();
	$check_con=mysql_connect("127.0.0.1","root","");	$con = mysqli_connect('localhost','root','', 'log1');	
	$db_selection=mysql_select_db("log1",$check_con);
	$what=$_GET['what'];
	$q=$_GET['q'];
	$q=preg_replace('#[^a-z0-9]#i', '',$q);
	$content = false;
	$fileStorage = '/final/upl/';
	switch($what){
		case 'text': $what = 'author_name'; break;
		case 'titles': $what = 'article_title'; break;
		case 'content': $content = true;
	}
	
	
	if($content){
		$query="SELECT * FROM articles WHERE article_content LIKE '% ".$q." %' OR article_content LIKE '".$q." %' OR article_content LIKE '% ".$q."' OR article_content LIKE '".$q."';";
		$action=mysql_query($query,$check_con);
		$result=mysql_num_rows($action);
		
		while($res=mysql_fetch_array($action)){?>
		<table class="width100" border="1" style="border-color:#E3E3E3;">
      		     		<col class="width1" style="background-color:#fff; width : 250px;">
      		     		<col class="width2" style="background-color:#fff;width : 550px;"/>
      		     		<col class="width3" style="background-color:#fff;width : 200px;"/>
						<col class="width4" style="background-color:#fff;width : 150px;"/>
			<tr>
			<td><?php echo  $res[1];?></td>
			<td><?php echo  $res[3];?></td>
			<td><?php echo  $res[5];?></td>
			<td><?php echo '<a href="'.$fileStorage.$res[2].'">Full pdf</a><br />';?></td>
		</tr>	<br>
		</table>
		<?php
		}
	}else{
		$query="SELECT * FROM articles WHERE ".$what." LIKE '".$q."%' OR ".$what." LIKE '% ".$q."%';";
		
		$action=mysql_query($query,$check_con);
		$result=mysql_num_rows($action);
		
		while($res=mysql_fetch_array($action)){  ?>
		<table class="width100" border="1" style="border-color:#E3E3E3;">
      		     		<col class="width1" style="background-color:#fff; width : 250px;">
      		     		<col class="width2" style="background-color:#fff;width : 550px;"/>
      		     		<col class="width3" style="background-color:#fff;width : 200px;"/>
						<col class="width4" style="background-color:#fff;width : 150px;"/>
			<tr>
			<td><?php echo  $res[1];?></td>
			<td><?php echo  $res[3];?></td>
			<td><?php echo  $res[5];?></td>
			<td>
			<?php if($user->isLoggedIn()) { ?>
			<?php echo '<a href="'.$fileStorage.$res[2].'">Full pdf</a><br />';?>
			<?php } else {
				echo 'You need to <a href="login.php">log in</a> to view full pdf';
			} ?>
			</td>
		</tr>	
		</table>
		<?php
		}
	}
	
	
	?>	
	
       	   </body>
       	   </html>