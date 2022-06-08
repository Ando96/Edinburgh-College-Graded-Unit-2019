<?php
# Set page title and display header section.
$page_title = 'Register' ; #Page title
include ( 'includes/headerout.php' ); #Include the navigation bar at the top of the page 

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
   $errors[] = 'Enter your name.' ;  #If no name entered, display an error
  }
  else
  { 
   $n = mysqli_real_escape_string( $link, trim( $_POST[ 'name' ] ) ) ; #Else if name is present assign to $n variable
  }
   
  # Check for a gender.
  if (empty( $_POST[ 'gender' ] ) )
  { 
    $errors[] = 'Enter your gender.' ; #If no gender entered, display an error
  }  
  else
  { 
   $gen = mysqli_real_escape_string( $link, trim( $_POST[ 'gender' ] ) ) ; #If gender entered assign it to $gen variable 
  }
  
  # Check for a date of birth.
  if (empty( $_POST[ 'age' ] ) )
  { 
    $errors[] = 'Enter your age.' ; #If no age entered, display an error
  }  
  else
  { 
   $dob = mysqli_real_escape_string( $link, trim( $_POST[ 'age' ] ) ) ; #Else if age entered assign it to $dob variable 
  }
  
  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { 
  $errors[] = 'Enter your email address.'; #If no email address entered, display and error
  }
  else
  { 
  $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; #Else if email address entered assign it to $e variable 
  }
  
  # Check for a username:
  if ( empty( $_POST[ 'username' ] ) )
  { 
  $errors[] = 'Enter your username.'; #If no username entered, display an error
  }
  else
  { 
  $usrnme = mysqli_real_escape_string( $link, trim( $_POST[ 'username' ] ) ) ; #Else if username entered assign it to $usernme variable
  }
  
  # Check for a phone number:
  if ( empty( $_POST[ 'phone' ] ) )
  { 
  $errors[] = 'Enter your phone number.'; #If no phone number entered, display an error 
  }
  else
  { 
  $num = mysqli_real_escape_string( $link, trim( $_POST[ 'phone' ] ) ) ; #If phone number entered, assign it to $num variable 
  }
     
  # Check for a phone number:
  if ( empty( $_POST[ 'address' ] ) )
  { 
  $errors[] = 'Enter your address.'; #If no address entered, display an error 
  }
  else
  { 
  $addrs = mysqli_real_escape_string( $link, trim( $_POST[ 'address' ] ) ) ; #Else if address entered assign it to $addrs variable 
  } 
    	  	 
 # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { 
		$errors[] = 'Passwords do not match.' ; #Error message if pass1 and pass2 do not match 		
	}
    else
    { 
		$p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; #If they do assign the password to $p variable
	}
  }
	else 
	{ 
		$errors[] = 'Enter your password.' ; #If no password entered, display an error 
	}
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php">Login</a>' ;
  }
  
  # Check if username already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT id FROM users WHERE username='$usrnme'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'username already registered. <a href="login.php">Login</a>' ;
  }
    
# On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (username, name, gender,age,phone, address, email, pass,reg_date,usertype , subscriber) VALUES ('$usrnme', '$n','$gen', '$dob', '$num' , '$addrs', '$e', SHA1('$p'), NOW() , 0 , 0 )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<div class="container"><h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>'; }

 # Close database connection.
    mysqli_close($link); 
 exit();
  }
  
  # Or report errors to the user.
  else 
  {
    echo '<div class="container"><h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg ) #Error message 
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p></div>';
	
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

	<head> <!-- Head begins -->

	</head> <!-- Head ends -->
	
	<!-- Breadcrumb under navigation bar to inform users what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Register</li>
		</ol>
	</nav> 

	<body> <!-- Body begins -->

		<form action="register.php" method="post"> <!-- User registration form begins -->
		
		<div class="container"> <!-- Bootstrap container begins -->
			
		<h1>Create Account</h1>
		
		<!-- Input field for username -->
		<input type="text" 
		class="form-control" 
		placeholder="Username" 
		name="username" 
		required 
		size="20" 
		value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
		<hr>	
		
		<!-- Input field for name -->
		<input type="text" 
		class="form-control" 
		placeholder="name"
		name="name" 
		required size="50" 
		value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"> 
		<hr>
		
		<!-- Input field for gender -->
		<input type="text" 
		class="form-control" 
		placeholder="Gender"
		name="gender" 
		required size="10"	 
		value="<?php if (isset($_POST['gender'])) echo $_POST['gender']; ?>">
		<hr>	

		<!-- Input field for age -->
		<input type="text" 
		class="form-control" 
		placeholder="Age"
		name="age" 
		required size="2" 
		value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>">
		<hr>		

		<!-- Input field for phone nunber -->
		<input type="text" 
		class="form-control" 
		placeholder="Phone Number" 
		name="phone" 
		required size="15" 
		value="<?php if (isset($_POST['phone'])) echo $_POST['phone_number']; ?>">
		<hr>	

		<!-- Input field for address -->
		<input type="text" 
		class="form-control" 
		placeholder="Address" 
		name="address" 
		required 
		size="50" 
		value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>">
		<hr>		

		<!-- Input field for email -->
		<input type="email" 
		class="form-control" 
		placeholder="Email" 
		name="email" 
		required 
		size="20" 
		value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
		<hr>					
		
		<!-- Input field for password 1 -->
		<input type="password" 
		class="form-control" 
		placeholder="Create Password" 
		name="pass1" 
		required size="20" 
		value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" >
		<hr>
	
		<!-- Input field for password 2 -->
		<input type="password" 
		class="form-control" 
		placeholder="Confirm Password" 
		name="pass2" 
		required size="20" 
		value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
		<hr>	
	
		<!-- Submit button for account registration -->
		<input class="btn btn-primary btn-block" type="submit" value="Create Account">
		<hr>			
		</form> <!-- End of registration form -->
	
		</div> <!-- End of bootstrap container -->

   </body> <!-- End of body -->
</html> <!-- End of HTML -->