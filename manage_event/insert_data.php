<?php
//insert_data.php

include('database_connection.php');

if(isset($_POST["event_title"]))
{
 $error = '';
 $success = '';
 $event_title = '';
 $event_date = '';
 $event_content = '';
 $images = '';

 if(empty($_POST["event_title"]))
 {
  $error .= '<p>Event Title is Required</p>';
 }
 else
 {
  $event_title = $_POST["event_title"];
 }
 if(empty($_POST["event_date"]))
 {
  $error .= '<p>Event Date is Required</p>';
 }
 else
 {
  $event_date = $_POST["event_date"];
 }
 if(empty($_POST["event_content"]))
 {
  $error .= '<p>Event Content is Required</p>';
 }
 else
 {
  $event_content = $_POST["event_content"];
 }

 if(isset($_FILES["images"]["event_title"]) && $_FILES["images"]["event_title"] != '')
 {
  $image_name = $_FILES["images"]["event_title"];
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
   ':event_title'   => $event_title,
   ':event_date'   => $event_date,
   ':event_content'   => $event_content,
   ':images'  => $images
  );

  $query = "
  INSERT INTO events
  (event_title, event_date, event_content, images) 
  VALUES (:event_title, :event_date, :event_content, :images)
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Event Data Inserted';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}
?>