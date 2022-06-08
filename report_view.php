<?php
# Set page title and display header section.
$page_title = 'Report View' ; #Page title
include ( 'includes/headeroutLog.php' ); #Include navigation bar at the top of the page 

#If the user attempting to access the page is not a subscriber they are redirected to the subnow page 
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
h1 {text-decoration: underline;}
h3 {text-decoration: underline;}
</style>
<!-- End of styling -->

</head> <!-- End of head -->

	<!-- Breadcrumb under nav bar informing the user what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Report View</li>
		</ol>
	</nav>
	<!-- End of breadcrumb -->
	
   <body> <!-- Body begins -->
    
		<div class="container"> <!-- Bootstrap container begins -->
   
<?php

# Access session.
session_start() ;

# Get passed report id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve report data from 'matchreport' database table. 
$q = "SELECT * FROM match_reports WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 ) #If the id matches what is in the database 
{ 
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
  	
  #Displays report information stored in database table.
	
  echo '<div class="row">
			<div class="col">
				<div class="card mb-3">		
					<div class="card-body">
						<img src="images/badge.svg" width="100" height="100" class="d-inline-block align-top" alt="">
						<img src="images/badge.svg" width="100" height="100" class="d-inline-block" align="right" alt="">
						<h1 class="card-title text-center">' . $row["report_title"] .'</h1>
						<hr>
						<br>
						<h3 class="card-title text-center">' . date('d-m-Y', strtotime($row["report_date"])) . ' </h3>
						<hr>
						<br>
						<hr>
						<div class="b"><p class="card-title text-center" style="white-space: pre-line">' . $row["report_content"] . ' </p></div>
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