<?php
# Set page title and display header section.
$page_title = 'Register Now'; #Page title 
include ( 'includes/headerout.php' ); #Include navigation bar at the top of the page 
?>
<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

<head> <!-- Head begins -->

<!-- Styling for this page only -->
<style>
.list-group {
	background-color:#b0aeca;
}

.list-group-item{
	background-color:#b0aeca;
	font-size: 25px;
}
</style>
<!-- Style ends -->

</head> <!-- Head ends -->
 
	<!-- Breadcrumb under navigation bar informing the user what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Register Now</li>
		</ol>
	</nav> 
	<!-- Breadcrumb ends -->
	
<body> <!-- Body begins -->

	<div class="container"> <!-- Bootstrap container begins -->

		<div class="row"> <!-- Row begins -->
			<div class="col"> <!-- Col begins -->
				<div class="card mb-3"> <!-- Card begins -->
					<div class="card-body"> <!-- Card body begins -->

						<!-- Displays information for the user to register an account -->
						
						<h3 class="card-title text-center">Register Now And Get Access To The Site!</h3>
						<br>
						<h4 class="card-title text-center">View Content Such As:</h3>

						<ul class="list-group list-group-flush align-items-center">
						<li class="list-group-item">League Table</li>
						<li class="list-group-item">Fixtures And Results</li>
						</ul>
						<br>
						<p class="card-title text-center">Click Here To Register!<a href="register.php" style="margin-left:20px;" ><button type="button" class="btn btn-primary">Register</button></a></p>

						<p class="card-title text-center">Already Have An Account?<a href="login.php" style="margin-left:20px;><button type="button" class="btn btn-primary" class='test'>Login</button></a></p>

					</div> <!-- End of card body -->
				</div> <!-- End of card -->
			</div> <!-- End of col -->
		</div> <!-- End of row --> 		
	</div> <!-- End of bootstrap container -->
</body> <!-- End of body -->
   
<?php
include ( 'includes/footer.php' ); #Include newsletter subscription at bottom of the page
?>  
</html> <!-- End of HTML -->