<?php
//insert_data.php

include('database_connection.php');

if(isset($_POST["report_title"]))
{
 $error = '';
 $success = '';
 $report_title = '';
 $report_date = '';
 $report_content = '';
 $images = '';

 if(empty($_POST["report_title"]))
 {
  $error .= '<p>Report Title is Required</p>';
 }
 else
 {
  $report_title = $_POST["report_title"];
 }
 if(empty($_POST["report_date"]))
 {
  $error .= '<p>Report Date is Required</p>';
 }
 else
 {
  $report_date = $_POST["report_date"];
 }
 if(empty($_POST["report_content"]))
 {
  $error .= '<p>Report Content is Required</p>';
 }
 else
 {
  $report_content = $_POST["report_content"];
 }

 if(isset($_FILES["images"]["report_title"]) && $_FILES["images"]["report_title"] != '')
 {
  $image_name = $_FILES["images"]["report_title"];
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
   ':report_title'   => $report_title,
   ':report_date'   => $report_date,
   ':report_content'   => $report_content,
   ':images'  => $images
  );

  $query = "
  INSERT INTO match_reports
  (report_title, report_date, report_content, images) 
  VALUES (:report_title, :report_date, :report_content, :images)
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Match Report Data Inserted';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}
?>