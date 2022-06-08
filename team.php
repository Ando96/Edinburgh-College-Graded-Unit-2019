<?php
# Set page title and display header section.
$page_title = 'Team' ; #Page title 
include ( 'includes/headeroutLog.php' ); #Include navigation bar at the top of the page.

#If the user that is attempting to access the page isn't a subscriber, redirect the user to subnow
if( $_SESSION['subscriber'] == '0' )
{
	require ( 'subnow.php' ) ; load() ; 	
}
?>

<!doctype html> <!-- HTML begins -->
<html lang="en"> <!-- Set page language to english -->

<head> <!-- Head begins -->

<!-- Styling for this page only -->
<style>
.card-body {
    background-color: transparent !important;
}
</style>
<!-- End of page styling -->

</head> <!-- End of head -->

	<!-- Breadcrumb under nav bar informing users what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Team</li>
		</ol>
	</nav>
	<!-- End of breadcrumb -->
	
   <body> <!-- Body begins -->

 <?php	  
 #Establish connection to database 
require ('connect_db.php');
	  
# Retrieve all players from 'players' database table.
$q = "SELECT * FROM players" ;
$r = mysqli_query( $link, $q ) ;

#If there are players within the database table
if ( mysqli_num_rows( $r ) > 0 )
{
 # Display body section.
  echo '<div class="container">
			<h1 class="display-4 text-muted" align="center">Team</h1>
				<div class="card-body">
					<div class="row">
			';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '<div class="col-md-3 col-sm-12">
			<div class="card w-100 text-white bg-dark mb-4"><img class="card-img-top" src='. $row['images'].'>
				<div class="card-body">	
													
					<h6 class="card-title text-center">' . $row['name'] . '</h2>
					
					<h6 class="card-title text-center">' . $row['position'] . '</h2>
					
					<h6 class="card-title text-center"> <a href="player_view.php?id='.$row['id'].'"><button type="button" class="btn btn-primary">View Player</button></a>
													
				</div>
			</div>
		 </div>';
 }
 
  echo '</div></div></div>';
  
  # Close database connection.
  mysqli_close( $link ) ; 
}
# Or display message.
else { echo '<p>There are no players in the database</p>' ; }
?>

   </body> <!-- End of body -->
</html> <!-- End of HTML -->