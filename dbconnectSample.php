<?php
$dbc; //database connection
$dbc = mysql_connect("host", "username", "password");
if($dbc) $db = mysql_select_db("Library");
else("error");
?>