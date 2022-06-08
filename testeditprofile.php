<?php # DISPLAY ADDITIONS PAGE.
# Set page title and display header section.
$page_title = 'Edit Profile' ;
include ( 'includes/headeroutLog.php' );

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
   $errors[] = 'Enter your name.' ; 
  }
  else
  { 
   $n = mysqli_real_escape_string( $link, trim( $_POST[ 'name' ] ) ) ; 
  }
   
  # Check for a gender.
  if (empty( $_POST[ 'gender' ] ) )
  { 
    $errors[] = 'Enter your gender.' ; 
  }  
  else
  { 
   $gen = mysqli_real_escape_string( $link, trim( $_POST[ 'gender' ] ) ) ; 
  }
  
  # Check for a date of birth.
  if (empty( $_POST[ 'age' ] ) )
  { 
    $errors[] = 'Enter your age.' ; 
  }  
  else
  { 
   $dob = mysqli_real_escape_string( $link, trim( $_POST[ 'age' ] ) ) ; 
  }

  # Check for a phone number:
  if ( empty( $_POST[ 'phone' ] ) )
  { 
  $errors[] = 'Enter your phone number.'; 
  }
  else
  { 
  $num = mysqli_real_escape_string( $link, trim( $_POST[ 'phone' ] ) ) ; 
  }
     	
  if ( empty( $_POST[ 'address' ] ) )
  { 
  $errors[] = 'Enter your address.'; 
  }
  else
  { 
  $addrs = mysqli_real_escape_string( $link, trim( $_POST[ 'address' ] ) ) ; 
  }   	  	   
    
# On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "update users SET name = '$n', gender = '$gen' , age = '$dob', address = '$addrs', phone = '$num' WHERE id =".$_SESSION['id']."";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<div class="container"><h1>Updated!</h1>'; }

 # Close database connection.
    mysqli_close($link); 
 exit();
  }
  
  # Or report errors.
  else 
  {
    echo '<div class="container"><h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p></div>';
	
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>

<!doctype html>

<html lang="en">
<head>

 </head>
	<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Register</li>
  </ol>
</nav> 

 <body>

<?php
 # Open database connection.
 require ( 'connect_db.php' ) ;

// Attempt update query execution
$q = "SELECT * FROM users WHERE id = {$_SESSION['id']} ";
$r = mysqli_query( $link, $q ) ;
$row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

?>
<form action="testeditprofile.php" method="post">
	<div class="container">
	<h1>Update Account</h1>
		
	<input type="text" 
	 class="form-control" 
 placeholder= "<?php echo ''. $row["name"] . '';?>"  
 value="<?php echo ''. $row["name"] . '';?>"
	name="name" 
	 required size="50" 
	value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"> 
	<hr>
		
<input type="text" 
	class="form-control" 
 placeholder="<?php echo ''. $row["gender"] . '';?>"
 value="<?php echo ''. $row["gender"] . '';?>"
 name="gender" 
	 required size="10"	 
	value="<?php if (isset($_POST['gender'])) echo $_POST['gender']; ?>">
	<hr>	

<input type="text" 
	class="form-control" 
 placeholder="<?php echo ''. $row["age"] . '';?>"
 value="<?php echo ''. $row["age"] . '';?>"
 name="age" 
	 required size="2" 
	value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>">
	<hr>		

<input type="text" 
 class="form-control" 
 placeholder="<?php echo ''. $row["phone"] . '';?>" 
 value="<?php echo ''. $row["phone"] . '';?>"
	 name="phone" 
	 required 
	 size="15" 
 value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
	<hr>	

<input type="text" 
 class="form-control" 
 placeholder="<?php echo ''. $row["address"] . '';?>" 
 value="<?php echo ''. $row["address"] . '';?>"
	 name="address" 
	 required 
	 size="50" 
 value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>">
	<hr>		
							
<input class="btn btn-primary btn-block" type="submit" value="Update">
	<hr>			
</form>
</div>

   </body>
</html> 