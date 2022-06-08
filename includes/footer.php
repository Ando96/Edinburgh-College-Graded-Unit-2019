<?php
# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 

  # Initialize an error array.
  $errors = array();
	
  # Check for a name.
  if ( empty( $_POST[ 'name' ] ) )
  { 
   $errors[] = 'Enter your name.' ; #If no name has been entered display an error
  }
  else
  { 
   $n = mysqli_real_escape_string( $link, trim( $_POST[ 'name' ] ) ) ; #Else if a name has been entered assign it to the $n variable
  }
  
  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { 
  $errors[] = 'Enter your email address.'; #If no email address has been entered provide an error message 
  }
  else
  { 
  $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; #Else if a email address has been entered assign it to the $e variable
  }
  
  # Check if email address already registered. Stops users signing up with the same email address and recieving multiple emails
  if ( empty( $errors ) )
  {
    $q = "SELECT id FROM email WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="index.php"></a>' ;
  }
  
  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO email (name , email) VALUES ('$n', '$e')";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<footer id="footer"><div class="container"><h1 style="color:white;">Thank You!</h1><p style="color:white;">You are now subscribed to the newsletter.</p></div>'; }

 # Close database connection.
    mysqli_close($link); 
 exit();
  }
}
?>

<!-- Styling for this page only -->
<style>
h3{
	color:white;
}
</style>
<!-- End of page styling -->

<!-- Form for newsletter subscription -->
<form action="indexLog.php" method="post">
    
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mx-auto">
  
<?php
#If an error has occured
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<div class="container"><h1 style="color:white;">Error!</h1><p id="err_msg" style="color:white;">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p></div>';
	
# Close database connection.
mysqli_close( $link );
}
?>
	<h3 style="color:white !important;">Newsletter!</h3>
 
	 <!-- Input field for name -->
	 <input type="text" 
	 class="form-control" 
     placeholder="name"
	 name="name" 
	 required size="50" 
	 value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"> 
	 <hr>
  
	 <!-- Input field for email -->
	 <input type="email" 
	 class="form-control" 
	 placeholder="Email" 
	 name="email" 
	 required 
	 size="50" 
	 value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
	 <hr>		
 
	<!-- Submit button to attempt newsletter subscription -->
    <input class="btn btn-primary btn-block" type="submit" value="Subscribe To Newsletter">
  
				</div> <!-- End of col -->
			</div> <!-- End of row -->
		</div> <!-- End of bootstrap container -->
</footer> 
</form> <!-- End of form -->