<!-- Connect_db establishes a connection to the database, where information such as player and user data is stored -->
<?php

$link = mysqli_connect('localhost','HNDSOFT2SA1','33vFmXSEfG','HNDSOFT2SA1'); #Login information for the database 

if(!$link)
{
	die('Could not connect to MySQL:'.mysqli_error());	#If connect_db cannot establish a connection provide an error message
}
?>