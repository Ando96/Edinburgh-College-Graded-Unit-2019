<?php # DISPLAY ADDITIONS PAGE.
# Set page title and display header section.
$page_title = 'Event View' ;
include ( 'includes/headeroutLog.php' ); #Includes navigation bar at top of page

#If the user attempting to access this page is not a subscriber or contains 0 in subscriber, load the subnow page instead.
if( $_SESSION['subscriber'] == '0' )
{
	require ( 'subnow.php' ) ; load() ; 	
}
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language -->

	<head> <!-- Head begins -->

		<!-- Styling for this page only -->
		<style>
		h1 {text-decoration: underline;}
		h3 {text-decoration: underline;}
		</style>

	</head> <!-- End of head -->

	<!-- Beadcrumb under nav bar letting user know what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Event View</li>
		</ol>
	</nav> 
	<!-- End of breadcrumb -->
	
   <body> <!-- Body begins -->
   
    <div class="container"> <!-- Bootstrap container begins -->
   
<?php

# Access session.
session_start() ;

# Get passed player id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

# Open database connection.
require ( 'connect_db.php' ) ;

# Select all fields from events table where id = $_GET/ id from event page 
$q = "SELECT * FROM events WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
  	
  echo ' <div class="row">
	<div class="col">
			<div class="card mb-3">
  <div class="card-body">
<img src="images/badge.svg" width="100" height="100" class="d-inline-block align-top" alt="">
<img src="images/badge.svg" width="100" height="100" class="d-inline-block" align="right" alt="">
<h1 class="card-title text-center">' . $row["event_title"] .'</h1>
<hr>
<br>
<h3 class="card-title text-center">' . date('d-m-Y', strtotime($row["event_date"])) . ' </h3>
<hr>
<br>
<div class="b"><p class="card-title text-center" style="white-space: pre-line">' . $row["event_content"] . ' </p></div>
<hr>
<img src="images/badge.svg" width="100" height="100" class="d-inline-block align-top" alt="">
<img src="images/badge.svg" width="100" height="100" class="d-inline-block" align="right" alt="">
  </div>
			</div>
	</div>
</div> ';		
}

# Close database connection.
mysqli_close($link);
?>
   
		</div> <!-- End of bootstrap container -->
	</body> <!-- End of body -->
</html> <!-- End of HTML -->