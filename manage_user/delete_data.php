<?php

//delete_data.php

//Deletes data from the database

//Requires link to database
include('database_connection.php');

//Uses id to delete required data
if(isset($_POST["id"]))
{
 $query = "
 DELETE FROM users 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
}
?>