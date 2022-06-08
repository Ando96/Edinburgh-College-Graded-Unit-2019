<?php
# Set page title and display header section.
$page_title = 'Unsubscribe' ; #Page title
include ( 'includes/headerout.php' ); #Include the navigation bar at the top of the page.

# Get passed user email address and assign it to a variable.
if ( isset( $_GET['email'] ) ) $email = $_GET['email'] ; 

require ('connect_db.php'); #Establish database connection 

#Delete record in email table where email = $email, 'unsubscribing the user'
$q = "DELETE FROM email WHERE email='$email'";
$r = mysqli_query( $link, $q );

mysqli_close( $link ) ; #Close database connection 
?>