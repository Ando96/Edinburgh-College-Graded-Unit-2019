<?php 
# Set page title and display header section.
$page_title = 'Thank You'; #Page title
include ('includes/headeroutLog.php'); #Include the navigation bar at the top of the page 
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

<head> <!-- Head begins -->

</head> <!-- Head ends -->

	<!-- Breadcrumb under nav bar to show user what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Thank You!</li>
		</ol>
	</nav>
	<!-- End of breadcrumb -->
	
   <body> <!-- Body begins -->	
   
<?php
# Open database connection.
require ( 'connect_db.php' ) ;

#Checks to see if user has cookie stored in browser after completing PayPal payment
$valid =  $_COOKIE['valid'];

if ($valid ==1) # If they do have cookie 
{ 
$_SESSION['subscriber'] = 1; #Update session so they do not have to logout and back in to update session

$subexpires = date('Y-m-d', strtotime('+1 month')); #Assign todays date +1 month to $subexpires variable 

#Update subscriber and subexpires records within user database where id = current users id 
$sql = "UPDATE users SET subscriber = 1, subexpires = '$subexpires'  WHERE id = {$_SESSION['id']} ";

	if(mysqli_query($link, $sql))
	{
		#I dont know	
	} 
	else 
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); #If the SQl is unable to excecute provide error message
	}
}

// Close connection to database 
mysqli_close($link);
?>
   
<div class="container"> <!-- Bootstrap container begins -->

	<div class="row"> <!-- Row begins -->
		<div class="col"> <!-- Col begins -->
			<div class="card mb-3"> <!-- Card begins -->
				<div class="card-body"> <!-- Card body begins -->

					<h3 class="card-title text-center">Thank You For Subscribing!</h3>
					<br>
					<h4 class="card-title text-center">All Content Is Now Viewable</h3>
					<br>
					<p class="card-title text-center">Click Here To Go Home<a href="indexLog.php" style="margin-left:20px;><button type="button" class="btn btn-primary" class='test'>Home</button></a></p>

				</div> <!-- Card body ends -->
			</div> <!-- Card ends -->
		</div> <!-- Col ends -->
	</div> <!-- Row end -->	
</div> <!-- Bootstrap container ends -->

	</body> <!-- End of body -->
              
</html> <!-- End of HTML -->