<?php
# Set page title and display header section.
$page_title = 'Login' ; # Page title
include ( 'includes/headerout.php' ); #Include navigation bar at top of page
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

<head> <!-- Head begins -->
<?php
# Display any error messages if present.
# It is placed in the head so it is at the top of the page making it easier for users to see it.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<div class="container"><p id="err_msg">Oops! There was a problem:<br></div>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; } #Actual error message
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
}
?>
</head> <!-- Head ends -->

	<!-- Breadcrumb under nav bar informing users what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Login</li>
		</ol>
	</nav>
	<!-- End of breadcrumb -->
	
   <body> <!-- Body begins -->

	<div class="container"> <!-- Bootstrap container begins -->

		<h1>Login</h1>
		
		<!-- Form for user login into site -->
		<form action="login_action.php" method="post"> <!-- If user information is posted load login_action to validate information -->
		
		<!-- Field for user's email -->
		<input 
		type="text" 
		class="form-control" 
		placeholder="Email" 
		name="email" 
		required>
		<hr>
		
		<!-- Field for users password -->
		<input 
		type="password" 
		class="form-control" 
		placeholder="Password" 
		name="pass" 
		required>
		<hr>
		
			<!-- Submit/Login button to attempt login to site -->
			<button 
				type="submit" 
				class="btn btn-primary btn-block" 
				role="button"> Login
			</button>
			<hr>
			
		</form> <!-- End of login form -->
		
	</div> <!-- End of bootstrap container -->

   </body> <!-- End of body -->
   
</html> <!-- End of HTML -->