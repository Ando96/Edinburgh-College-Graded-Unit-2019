<?php
//insert_data.php

//Requires database connection 
include('database_connection.php');

if(isset($_POST["name"]))
{
 #Variables to hold entered values
 $error = '';
 $success = '';
 $name = '';
 $username = '';
 $age = '';
 $gender = '';
 $address = '';
 $phone = '';
 $email = '';
 $images = '';

 #Check for name
 if(empty($_POST["name"]))
 {
  $error .= '<p>Name is Required</p>'; #If nothing is present provide error message
 }
 else
 {
  $name = $_POST["name"]; #Else assign to variable
 }
 #Check for username
 if(empty($_POST["username"]))
 {
  $error .= '<p>Username is Required</p>'; #If nothing is present provide error message
 }
 else
 {
  $username = $_POST["username"]; #Else assign to variable
 }
 #Check for age
 if(empty($_POST["age"]))
 {
  $error .= '<p>Age is Required</p>'; #If nothing is present provide error message
 }
 else
 {
  $age = $_POST["age"]; #Else assign to variable
 }
 #Check for gender
 if(empty($_POST["gender"]))
 {
  $error .= '<p>Gender is Required</p>'; #If nothing is present provide error message
 }
 else
 {
  $gender = $_POST["gender"]; #Else assign to variable
 }
 #Check for address
 if(empty($_POST["address"]))
 {
  $error .= '<p>Address is Required</p>'; #If nothing is present provide error message
 }
 else
 {
  $address = $_POST["address"]; #Else assign to variable
 }
 #Check for phone
 if(empty($_POST["phone"]))
 {
  $error .= '<p>Phone Number is Required</p>'; #If nothing is present provide error message
 }
 else
 {
  $phone = $_POST["phone"]; #Else assign to variable
 }
 #Check for email
 if(empty($_POST["email"]))
 {
  $error .= '<p>Email is Required</p>'; #If nothing is present provide error message
 }
 else
 {
  $email = $_POST["email"]; #Else assign to variable
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
   $images = rand() . '.' . $extension;
   move_uploaded_file($temporary_name, 'images/' . $images);
  }
 }
 if($error == '')
 {
#Assign variables to database values
  $data = array(
   ':name'   => $name,
   ':username' => $username,
   ':age'   => $age,
   ':gender'   => $gender,
   ':address'   => $address,
   ':phone'   => $phone,
   ':email'   => $email,
   ':images'  => $images
  );

  #Query to insert new information in the database table users
  $query = "
  INSERT INTO users 
  (name, username, age, gender, address, phone, email, images) 
  VALUES (:name, :username, :age, :gender, :address, :phone, :email, :images)
  ";
  #Execute the query
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'User Data Inserted';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}
?>