<?php

//update_data.php

include('database_connection.php');

if(isset($_POST["opposition"]))
{
 $error = '';
 $success = '';
 $opposition = '';
 $score = '';
 $fixture_date = '';
 $competition = '';
 $images = '';
 
 if(empty($_POST["opposition"]))
 {
  $error .= '<p>Away team is Required</p>';
 }
 else
 {
  $opposition = $_POST["opposition"];
 }
 if(empty($_POST["score"]))
 {
  $error .= '<p>Home Score is Required</p>';
 }
 else
 {
  $score = $_POST["score"];
 }
 if(empty($_POST["fixture_date"]))
 {
  $error .= '<p>Fixture date is Required</p>';
 }
 else
 {
  $fixture_date = $_POST["fixture_date"];
 }
 if(empty($_POST["competition"]))
 {
  $error .= '<p>Competition is Required</p>';
 }
 else
 {
  $competition = $_POST["competition"];
 }
 
 $images = $_POST['hidden_images'];

 if(isset($_FILES["images"]["opposition"]) && $_FILES["images"]["opposition"] != '')
 {
  $image_name = $_FILES["images"]["opposition"];
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
   $images = rand() . '.' . $extension;
   move_uploaded_file($temporary_name, 'images/' . $images);
  }
 }
 if($error == '')
 {
  $data = array(
   ':opposition' => $opposition,
   ':score'   => $score,
   ':fixture_date'   => $fixture_date,
   ':competition'   => $competition,
   ':images'  => $images,
   ':id'   => $_POST["id"]
  );

  $query = "
  UPDATE fixtures 
  SET opposition = :opposition,
  score = :score, 
  fixture_date = :fixture_date, 
  competition = :competition, 
  images = :images 
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Fixture Data Updated';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>