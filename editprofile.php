<?php # DISPLAY ADDITIONS PAGE.
# Set page title and display header section.
$page_title = 'Edit Profile' ; #Page name
include ( 'includes/headeroutLog.php' ); #Includes the navigation bar at the top of the page

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();
  
 # Check for a first name.
  if ( empty( $_POST[ 'name' ] ) )
  { 
   $errors[] = 'Enter your name.' ; #If no name provide error
  }
  else
  { 
   $n = mysqli_real_escape_string( $link, trim( $_POST[ 'name' ] ) ) ; #Else if name present put name into $n variable
  }
   
  # Check for a gender.
  if (empty( $_POST[ 'gender' ] ) )
  { 
    $errors[] = 'Enter your gender.' ; #If no gender provide error 
  }  
  else
  { 
   $gen = mysqli_real_escape_string( $link, trim( $_POST[ 'gender' ] ) ) ; #If gender present put gender into $gen variable
  }
  
  # Check for a date of birth.
  if (empty( $_POST[ 'age' ] ) )
  { 
    $errors[] = 'Enter your age.' ; #If no age is present provide error message
  }  
  else
  { 
   $dob = mysqli_real_escape_string( $link, trim( $_POST[ 'age' ] ) ) ; #If age is present put in $dob variable
  }

  # Check for a phone number:
  if ( empty( $_POST[ 'phone' ] ) )
  { 
  $errors[] = 'Enter your phone number.'; #If no phone number is present provide error message
  }
  else
  { 
  $num = mysqli_real_escape_string( $link, trim( $_POST[ 'phone' ] ) ) ; #Else if it is put it into the $num variable
  }
    
  # Check for a address
  if ( empty( $_POST[ 'address' ] ) )
  { 
  $errors[] = 'Enter your address.'; #If no address is present provide an error message
  }
  else
  { 
  $addrs = mysqli_real_escape_string( $link, trim( $_POST[ 'address' ] ) ) ; #Else if a address is present place it in the $addrs variable
  }   	  	   
    
  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "update users SET name = '$n', gender = '$gen' , age = '$dob', address = '$addrs', phone = '$num' WHERE id =".$_SESSION['id']."";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<div class="container"><h1>Updated!</h1>'; } #Success message if all information is updated in the database

 # Close database connection.
    mysqli_close($link); 
 exit();
  }
  
  # Or report errors.
  else 
  {
    echo '<div class="container"><h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg ) #Provides the appropriate error message if the process fails
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p></div>';
	
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set language -->

	<head> <!-- Head begins -->

	</head> <!-- Head ends -->
	
	<!-- Provides a breadrumb under nav bar letting user know where they are -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Edit My Profile</li>
		</ol>
	</nav> 
	<!-- End of breadcrumb -->
	
<body> <!-- Body begins -->

<!-- The following PHP opens a connection to the database and fetches the users information -->
<?php
 # Open database connection.
 require ( 'connect_db.php' ) ;

 // query to select all from users table where id = current users id
 $q = "SELECT * FROM users WHERE id = {$_SESSION['id']} ";
 $r = mysqli_query( $link, $q ) ;
 $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
?>

<!-- Form allowing user to edit their information, the fields what are fill with the data stored on the database, incase the user does not want to re-enter the information -->

<form action="testeditprofile.php" method="post"> <!-- Edit profile begins -->

	<div class="container"> <!-- Bootstrap container begins -->
	
	<h1>Update Account</h1>
		
	<!-- Field for name -->	
	<input type="text" 
	class="form-control" 
	placeholder= "<?php echo ''. $row["name"] . '';?>"  
	value="<?php echo ''. $row["name"] . '';?>" 
	name="name" 
	required size="50" 
	value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"> 
	<hr>
	
	<!-- Field for gender -->
	<input type="text" 
	class="form-control" 
	placeholder="<?php echo ''. $row["gender"] . '';?>"
	value="<?php echo ''. $row["gender"] . '';?>"
	name="gender" 
	required size="10"	 
	value="<?php if (isset($_POST['gender'])) echo $_POST['gender']; ?>">
	<hr>	

	<!-- Field for age -->
    <input type="text" 
	class="form-control" 
    placeholder="<?php echo ''. $row["age"] . '';?>"
    value="<?php echo ''. $row["age"] . '';?>"
    name="age" 
	required size="2" 
	value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>">
	<hr>		

	<!-- Field for phone -->
    <input type="text" 
    class="form-control" 
    placeholder="<?php echo ''. $row["phone"] . '';?>" 
    value="<?php echo ''. $row["phone"] . '';?>"
	name="phone" 
	required 
	size="15" 
    value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
	<hr>	

	<!-- Field for address -->
    <input type="text" 
    class="form-control" 
    placeholder="<?php echo ''. $row["address"] . '';?>" 
    value="<?php echo ''. $row["address"] . '';?>"
	name="address" 
	required 
	size="50" 
    value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>">
	<hr>		
							
<input class="btn btn-primary btn-block" type="submit" value="Update"> <!-- Button the update information if pressed -->
	<hr>			
</form> <!-- End of form -->

	</div> <!-- End of container -->

   </body> <!-- Body ends -->
   
</html> <!-- HTML Ends -->