<!doctype html> <!-- HTML Begins -->
<html lang="en"> <!-- Set page language to english -->

<head> <!-- Head begins -->

</head> <!-- Head ends -->

<?php
#Checks to see if the user attempting to access the page is a subscriber, if not they are redirected to subnow  
if( $_SESSION['subscriber'] == '0' )
{
	require ( 'subnow.php' ) ; load() ; 	
}
?>

<?php
# Access session.
session_start() ;

# Set page title and display header section.
$page_title = 'Player View' ; #Page title
include ( 'includes/headeroutLog.php' ) ; #Includes the nav bar at the top of the page

# Get passed player id and assign it to a variable from the team page.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve player from player database table where id = $id
$q = "SELECT * FROM players WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;

#If the id matches in database
if ( mysqli_num_rows( $r ) == 1 )
{
	$row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
  
	#Displays the player with image and information from the database.
    echo '
	<br>
	
	<div class="container"> <!-- Bootstrap container begins -->
	
		<div class="col-md-3 col-sm-12 mx-auto">		
			<div class="card w-100 text-white bg-dark mb-4"><img class="card-img-top" src='. $row['images'].'></div>			
		 </div>
		 
		<div class="row"> <!-- Row begins -->
			<div class="col"> <!-- Col begins -->
				<div class="card mb-3"> <!-- Card begins -->
					<div class="card-body"> <!-- Card body begins -->
					
						<h6 class="card-title text-center">Name: ' . $row['name'] . '<hr></h2> <!-- Displays players name -->
						<h6 class="card-title text-center">Position: ' . $row['position'] . '<hr></h2> <!-- Displays player postion -->		
						<h6 class="card-title text-center">Age: ' . $row['age'] . '<hr></h2> <!-- Displays players age -->
						
					</div> <!-- End of card body -->
				</div> <!-- End of card -->
			</div> <!-- End of col -->
		</div>	<!-- End of row -->
	</div>'; #End of bootstrap container 
}
# Close database connection.
mysqli_close($link);
?>