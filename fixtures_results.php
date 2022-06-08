<?php # DISPLAY ADDITIONS PAGE.
# Set page title and display header section.
$page_title = 'Fixtures And Results' ;
include ( 'includes/headeroutLog.php' ); #Include nav bar at the top the page
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

<head> <!-- Head begins -->

<!-- Styling for this page only -->
<style>
.container{
	padding-right: 0px !important;
    padding-left: 0px !important;
}
</style>
<!--- End of page styling -->

</head> <!-- End of head -->

	<!-- Breadcrumb under nav bar informing users what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Fixtures and Results</li>
		</ol>
	</nav>
	<!-- End of breadcrumb -->
	
   <body> <!-- Body begins -->

		<div class="container"> <!-- Bootstrap container begins -->

			<table class="table table-striped table-bordered text-center"> <!-- Striped bordered table style with center text -->                   
				<div class="table responsive"> <!-- Responsive bootstrap table -->
					<thead>
						<tr>      
							<th>Opposition</th>   
							<th>Score</th>
							<th>Fixture Date</th> 
							<th>Competition</th> 
						</tr>
					</thead>
						<tbody> <!-- Fill table body with database information -->
						
<?php	  	  
require ('connect_db.php');
	  
# Retrieve all fixtures from fixtures database table.
$q = "SELECT * FROM fixtures" ;
$r = mysqli_query( $link, $q ) ;

if ( mysqli_num_rows( $r ) > 0 ) #If the database contains 1 or more fixtures
{
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) #Fills the table above with the fixture information
  {
    echo '<tr>            
				  <td> '.$row["opposition"] .'</td>
                  <td>' . $row["score"] .'</td>				
                  <td>' . date('d-m-Y', strtotime($row["fixture_date"])) .'</td>
				  <td>' . $row["competition"] .'</td>
                </tr>';
 }
  
  # Close database connection.
  mysqli_close( $link ) ; 
}
# Or display message if no fixtures within database.
    else  
      { 
	   echo '<p>There are no fixtures in the database</p>' ; 
	  }
?>
 
					</tbody> <!-- End of table body -->
					
				</div> <!-- End of table respnsive -->
				
			</table> <!-- End of table -->

		</div> <!-- End of boostrap container -->

   </body> <!-- End of body -->
   
</html> <!-- End of HTML -->