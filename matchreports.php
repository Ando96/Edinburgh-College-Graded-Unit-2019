<?php
# Set page title and display header section.
$page_title = 'Match Reports' ; #Page title
include ( 'includes/headeroutLog.php' ); #Include navigation bar at the top of page

#If the user that is attempting to access the page is not a subscriber load the subnow page instead of match reports
if( $_SESSION['subscriber'] == '0' )
{
	require ( 'subnow.php' ) ; load() ; 	
}
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

	<head> <!-- Head begins -->

	</head> <!-- Head begins -->
	
		<!-- Breadcrumb under navigation bar to inform users where they are -->
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Match Reports</li>
			</ol>
		</nav> 
		<!-- Breadcrumb ends -->
		
		<body> <!-- Body begins -->

			<div class="container"> <!-- Bootstrap container begins -->

				<table class="table table-striped text-center"> <!-- Table begins with striped style and text center -->                     
					<div class="table responsive"> <!-- Boostrap table responsive -->
						<thead>
							<tr>             
								<th>Report Title</th>
								<th>Report Date</th>
								<th>View Report</th>                      
							</tr>
						</thead>
							<tbody> <!-- Table to be filled with information in the database -->
							
<?php	  	  
#Open databae connection
require ('connect_db.php');
	  
# Retrieve match_reports for matchreports database table.
$q = "SELECT * FROM match_reports" ;
$r = mysqli_query( $link, $q ) ;

#If there is 1 or more report in the database 
#Create a entry in the table for each one
if ( mysqli_num_rows( $r ) > 0 )
{
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '      <tr>
                  <td scope="row">' . $row["report_title"]. '</td>
                  <td>' . date('d-m-Y', strtotime($row["report_date"])) .'</td>				                 
				  <td> <a href="report_view.php?id='.$row['id'].'"><button type="button" class="btn btn-primary">View report</button></a> </td>
                </tr>';
 }
  
  # Close database connection.
  mysqli_close( $link ) ; 
}
# Or display message if there are no reports in the database.
    else  
      { 
	   echo '<p>There are no reports in the database</p>' ; 
	  }
?>
							</tbody> <!-- End of table body -->
							
					</div> <!-- End of table responsive -->
						
				</table> <!-- End of table -->

			</div> <!-- End of boostrap container --> 
				
		</body> <!-- End of body -->
   
</html> <!-- End of HTML -->