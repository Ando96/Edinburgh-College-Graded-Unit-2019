<?php # DISPLAY ADDITIONS PAGE.
# Set page title and display header section.
$page_title = 'Events' ;
include ( 'includes/headeroutLog.php' ); #Includes nav bar at top of page

# If the user attempting to access the page is not a subscriber, load the subnow page instead of events page
if( $_SESSION['subscriber'] == '0' )
{
	require ( 'subnow.php' ) ; load() ; 	
}
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

	<head> <!-- Head begins -->

	</head> <!-- Head ends -->
	
	<!-- breadcrumb under nav bar informing the user what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Events</li>
		</ol>
	</nav> 
	<!-- End of breadcrumb -->
	
   <body> <!-- Body begins -->

		<div class="container"> <!-- Bootstrap container begins -->

			<table class="table table-striped text-center"> <!-- Striped table style with text center -->                    
				<div class="table responsive"> <!-- Responsive bootstrap table -->
					<thead>
						<tr>             
							<th>Event Title</th>
							<th>Event Date</th>
							<th>View Event</th>                      
						</tr>
					</thead>
			<tbody>

<?php
#Open connection to database	  	  
require ('connect_db.php');
	  
# Query to retrieve all records from events database table.
$q = "SELECT * FROM events" ;
$r = mysqli_query( $link, $q ) ;

if ( mysqli_num_rows( $r ) > 0 )
{
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '      <tr>
                  <td scope="row">' . $row["event_title"]. '</td>
                  <td>' . date('d-m-Y', strtotime($row["event_date"])) .'</td>				                 
				  <td> <a href="event_view.php?id='.$row['id'].'"><button type="button" class="btn btn-primary">View Event</button></a> </td>
                </tr>';
 }
  
  # Close database connection.
  mysqli_close( $link ) ; 
}
# Or display message if nothing contained within database.
    else  
      { 
	   echo '<p>There are no events in the database</p>' ; 
	  }
?>

    </tbody> <!-- End of body for table -->
    </div> <!-- End of table responsive -->
</table> <!-- End of bootsrap table -->

</div> <!-- End of bootstrap container -->

   </body> <!-- End of body -->
</html> <!-- End of HTML -->