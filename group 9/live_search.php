<?php
require_once 'core/init.php';
$user = new user();
?>
<html>

<head>
    <script type="text/javascript">
        function show(what, q) {
		console.log(what);
            str = "?what=" + what + "&q=" + q;
            if (q.length == 0) {
                document.getElementById(what+"msg").innerHTML = "";
                return;
            }
            //checks if empty

            //checking for the browser
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById(what+"msg").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "livesearch_database1.php" + str, true);
            xmlhttp.send();
        }
    </script>
<!doctype html>
<html lang="en">
<head>

<title>Search</title>
<link rel="stylesheet" href="css/layouts/css.css">
<link rel="stylesheet" href="css/layouts/side-menu1.css">
</head>
 
 
<body>

	<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
    <!-- Hamburger icon -->
    <span></span>
    </a>
	<div id="menu">
        <div class="pure-menu pure-menu-open">
            <!-- <a class="pure-menu-heading" href="#">Company</a>-->

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>

                <li>
                    <a href="login.php">Login</a>
                </li>

                <li><a href="register.php">Register</a></li>
                <li class="menu-item-divided pure-menu-selected"><a href="live_search.php">Search</a></li>
                <li><a href="archives.php">Archives</a></li>
            </ul>
        </div>
    </div>
    

       <div id="main">
                    
                    <div class="header"><img  src="LGO.png" name="slide" width="80" height="80">
                    <h1>eyond Borders</h1>
					<?php if($user->isLoggedIn()) { ?>
						 
			<nav class="navigation" role="navigation" aria-label="main navigation">
		<ul class="navigation-menu" id="horizontal_menu">
		<?php 
					if($user->hasPermission('admin')){?>
					<li class="navigation-menu-item"><a href="admin.php">Home</a></li>
					<?php } else {
					?>
					 <li class="navigation-menu-item"><a href="index1.php">Home</a></li>
					 <?php } ?>
					 <li class="navigation-menu-item is-selected"><a href="logout.php">Log out</a></li>
			          <li class="navigation-menu-item"><a href="update.php">Update details</a></li>
			          <li class="navigation-menu-item"><a href="changepassword.php">Change Password</a></li>
					 </ul>
					  </nav>
					 
					  <?php } ?>
                    </div>
                     
                     
 <div class="pure-control-group">
	<br><br><br>	
	    <input type="text" name="text" id="text" autocomplete="off" onkeyup="show('text',this.value)" placeholder = "Search by Author Name" style="margin-right: 70px; margin-left: 150px;" />

    <input type="text" name="titles" id="titles" autocomplete="off" onkeyup="show('titles',this.value)" placeholder = "Search by Article Title" style="margin-right: 70px; margin-left: 70px;" />
  
    <input type="text" name="content" id="content" autocomplete="off" onkeyup="show('content',this.value)" placeholder = "Search by Keyword" style="margin-right: 50px; margin-left: 50px;" />
    <br><br>
    <table class="width100" border="1" style="border-color:#E3E3E3;">
      		     		<col class="width1" style="background-color:#fff; width : 250px;">
      		     		<col class="width2" style="background-color:#fff;width : 550px;"/>
      		     		<col class="width3" style="background-color:#fff;width : 200px;"/>
						<col class="width4" style="background-color:#fff;width : 150px;"/>
		<tr>
							<td style="color:#008000;"><strong>Article Title</strong></td>
							<td style="color:#008000;"><strong>Abstract</strong></td>
							<td style="color:#008000;"><strong>Author Name</strong></td>
							<td style="color:#008000;"><strong>Pdf</strong></td>
							</tr><br>
		</table>
    <div id="textmsg"></div><div id="titlesmsg"></div><div id="contentmsg"></div>
    </div>
</body>

</html>
