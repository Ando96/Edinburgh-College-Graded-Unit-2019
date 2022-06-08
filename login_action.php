<?php # PROCESS LOGIN ATTEMPT.

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Open database connection.
  require ( 'connect_db.php' ) ;

  # Get connection, load, and validate functions.
  require ( 'login_tools.php' ) ;

  # Check login.
  list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;

  # On success set session data and display logged in page.
  if ( $check )  
  {
    # Access session.
    session_start();
		
    $_SESSION[ 'id' ] = $data[ 'id' ] ; #Place user id in session 
    $_SESSION[ 'name' ] = $data[ 'name' ] ; #Place user name in session
	$_SESSION[ 'usertype' ] = $data[ 'usertype' ] ; #Place user's usertype in the session (admin/normal user)
	$_SESSION[ 'subscriber' ] = $data[ 'subscriber' ] ; #Place user's subscription status in session
	
	$date = new DateTime(); #Gets current date
	
	#Check to see if users subscription has expired
	if (date("Y-m-d") > $data[ 'subexpires' ])
	{
	 #If it has set remove subscription 
     $q = "UPDATE users SET subscriber = '0' WHERE id = {$_SESSION['id']} ";	
	 $r = @mysqli_query ( $link, $q );
	 
	 #Also reset their subscription expiry date as they do not have one anymore
	 $q= "UPDATE users Set subexpires=null Where id = {$_SESSION['id']}";
	 $r = @mysqli_query ( $link, $q);
	 
	 #Update the session to avoid errors (Being a subscriber till they next logout)
	 $_SESSION[ 'subscriber' ] = '0';
	}

	#On a successfull login load the indexLog page - Home page for logged in users
    load ( 'indexLog.php' ) ;
  }
  # Or on failure set errors.
  else { $errors = $data; } 

  # Close database connection.
  mysqli_close( $link ) ; 
}
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# Added to script:::Continue to display login page on failure.
include ( 'login.php' ) ;
?>