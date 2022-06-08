<?php 
# Set page title and display header section.
$page_title = 'My Profile'; #Page title
include ('includes/headeroutLog.php'); #Include navigation bar at the top of the page
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

<head> <!-- Head begins -->

<!-- Styling for this page only -->
<style> 
h3 {
    color: black !important; 
}
</style>
<!-- End of styling for this page -->

</head> <!-- End of head -->
 
	<!-- Breadcrumb under navigation bar to inform the user what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Home</li>
		</ol>
	</nav>
	<!-- Breadcrumb ends -->
	
		<body> <!-- Body begins -->
		
			<div class="container"> <!-- Bootstrap container begins -->
<?php
# Open database connection.
require ( 'connect_db.php' ) ;

// Attempt update query execution where the id in the user table matches the id within the users session
$q = "SELECT * FROM users WHERE id = {$_SESSION['id']} ";
$r = mysqli_query( $link, $q ) ;

#If the query was successful
if ( mysqli_num_rows( $r ) > 0 )
{	
	$row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
	
	 echo ' <div class="row">
				<div class="col">
					<div class="card mb-3">
						<div class="card-body">
							<img src="images/badge.svg" width="100" height="100" class="d-inline-block align-top" alt="">
							<img src="images/badge.svg" width="100" height="100" class="d-inline-block" align="right" alt="">
						<h2 class="card-title text-center">Name: ' . $row["name"] .'</h1>
						<hr>
						<h3 class="card-title text-center">Username: ' . $row["username"] . ' </h3>
						<hr>
						<h3 class="card-title text-center">Gender: ' . $row["gender"] . ' </h3>
						<hr>
						<h3 class="card-title text-center">Age: ' . $row["age"] . ' </h3>
						<hr>
						<h3 class="card-title text-center">Address: ' . $row["address"] . ' </h3>
						<hr>
						<h3 class="card-title text-center">Email: ' . $row["email"] . ' </h3>
						<hr>
						<h3 class="card-title text-center">Phone Number: ' . $row["phone"] . ' </h3>
						<hr>
						<h3 class="card-title text-center">Registration Date: ' . $row["reg_date"] . ' </h3>
						<hr>
						<h4 class="card-title text-center">Want To Make Changes? Click Here:<a href="editprofile.php" style="margin-left:20px;><button type="button" class="btn btn-primary">Edit</button></a></h3>
						<hr>
							<img src="images/badge.svg" width="100" height="100" class="d-inline-block align-top" alt="">
							<img src="images/badge.svg" width="100" height="100" class="d-inline-block" align="right" alt="">
						</div>
					</div>
				</div>
			</div> ';			
} 

#If an error occurs while displaying user information
else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

			</div> <!-- End of bootsrap container -->

		</body> <!-- End of body --> 

<?php
include ( 'includes/footer.php' ); #Include the newsletter sign-up at the bottom of the page
?>     
   
</html> <!-- End of HTML -->