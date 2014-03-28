<?php
error_reporting(0);
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("log1")or die(mysql_error());
$fileStorage = '/g9/upl/';

$result = mysql_query("
    SELECT
        author_name
		,article_title
        ,article_name
		,article_content
    FROM
        articles

    ORDER BY
        article_id
") or die(mysql_error());
if (mysql_num_rows($result) > 0) {
	while ($row = mysql_fetch_assoc($result)) {
		echo htmlentities($row['article_title'], ENT_COMPAT, 'UTF-8').'</br>';
		echo  'Abstract:'.htmlentities($row['article_content'], ENT_COMPAT, 'UTF-8').'</br>';
		echo '<a href="'. $fileStorage . $row['article_name'] .'">Full pdf</a><br />';
	}
}
?>