<?php

//update_data.php

//Requires a connection to the database 
include('database_connection.php');

if(isset($_POST["name"]))
{
//Variables to store updated information 
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
  $error .= '<p>Name is Required</p>'; #Error message if not present
 }
 else
 {
  $name = $_POST["name"]; #Else assign to variable
 }
 #Check for name 
 if(empty($_POST["username"]))
 {
  $error .= '<p>Username is Required</p>'; #Error message if not present
 }
 else
 {
  $username = $_POST["username"]; #Else assign to variable
 }
 #Check for age
 if(empty($_POST["age"]))
 {
  $error .= '<p>Age is Required</p>'; #Error message if not present
 }
 else
 {
  $age = $_POST["age"]; #Else assign to variable
 }
 #Check for gender
 if(empty($_POST["gender"]))
 {
  $error .= '<p>Gender is Required</p>'; #Error message if not present
 }
 else
 {
  $gender = $_POST["gender"]; #Else assign to variable
 }
 #Check for address
 if(empty($_POST["address"]))
 {
  $error .= '<p>Address is Required</p>'; #Error message if not present
 }
 else
 {
  $address = $_POST["address"]; #Else assign to variable
 }
 #Check for phone
 if(empty($_POST["phone"]))
 {
  $phone .= '<p>Phone Number is Required</p>'; #Error message if not present
 }
 else
 {
  $phone = $_POST["phone"]; #Else assign to variable
 }
 #Check for email address
 if(empty($_POST["email"]))
 {
  $email .= '<p>Email is Required</p>';
 }
 else
 {
  $email = $_POST["email"]; #Else assign to variable
 }
 
 $images = $_POST['hidden_images'];
 #Check for image 
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
 #If no errors occur the update process will continue
 if($error == '')
 {
	 //Assign the variables to the database values
  $data = array(
   ':name'   => $name,
   ':username' => $username,
   ':age'   => $age,
   ':gender'   => $gender,
   ':address'   => $address,
   ':phone'   => $phone,
   ':email'   => $email,
   ':images'  => $images,
   ':id'   => $_POST["id"]
  );

//Update users with the new information 
  $query = "
  UPDATE users 
  SET name = :name,
  username = :username, 
  age = :age, 
  gender = :gender, 
  address = :address,
  phone = :phone,
  email = :email,
  images = :images 
  WHERE id = :id
  ";
  #Execute the query to update the information 
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'User Data Updated';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}
?>