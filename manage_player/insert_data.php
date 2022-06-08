<?php

//insert_data.php

include('database_connection.php');

if(isset($_POST["name"]))
{
 $error = '';
 $success = '';
 $name = '';
 $position = '';
 $age = '';
 $images = '';

 if(empty($_POST["name"]))
 {
  $error .= '<p>Name is Required</p>';
 }
 else
 {
  $name = $_POST["name"];
 }
 if(empty($_POST["position"]))
 {
  $error .= '<p>Position is Required</p>';
 }
 else
 {
  $position = $_POST["position"];
 }
 if(empty($_POST["age"]))
 {
  $error .= '<p>Age is Required</p>';
 }
 else
 {
  $age = $_POST["age"];
 }

 if(isset($_FILES["images"]["name"]) && $_FILES["images"]["name"] != '')
 {
  $image_name = $_FILES["images"]["name"];
  $array = explode(".", $image_name);
  $extension = end($array);
  $temporary_name = $_FILES["images"]["tmp_name"];
  $allowed_extension = array("jpg","png");
  if(!in_array($extension, $allowed_extension))
  {
   $error .= '<p>Invalid Image</p>';
  }
  else
  {
   $images = 'images/players/' .$image_name;
   move_uploaded_file($temporary_name, 'images/' . $images);
  }
 }

 if($error == '')
 {
  $data = array(
   ':name'   => $name,
   ':position' => $position,
   ':age'   => $age,
   ':images'  => $images
  );

  $query = "
  INSERT INTO players 
  (name, position, age, images) 
  VALUES (:name, :position, :age, :images)
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Player Data Inserted';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>
