<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'id' ] ) ) 
{ 
require ( 'login_tools.php' ) ; load() ; 
}
?>

<!doctype html> <!-- HTML begins -->
<html lang="en"> <!-- Set page language to english -->

   <head> <!-- Head begins -->
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<!-- Custom Style -->
	<link rel="stylesheet" href="css/mystyle.css">
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/solid.css" integrity="sha384-rdyFrfAIC05c5ph7BKz3l5NG5yEottvO/DQ0dCrwD8gzeQDjYBHNr1ucUpQuljos" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-u5J7JghGz0qUrmEsWzBQkfvc8nK3fUT7DCaQzNQ+q4oEXhGSx+P2OqjWsfIRB8QT" crossorigin="anonymous">
	
	<!-- Icon -->
	<link rel="icon" href="images/crest.png">
	
	<!-- Title -->
	<title>Focus Football</title>
	
	</head> <!-- Head ends -->
	 
   <body> <!-- Body begins -->
  
  <!-- NAV BAR -->
  
  <nav id="fanzineheader" class="navbar navbar-expand-lg navbar-dark bg-primary">
  
  <!-- Dropdown menu button for small screens -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav">
	<!-- Links to different pages -->
      <li class="nav-item active">
        <a class="nav-link" href="indexLog.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fixtures_results.php">Fixtures and Results</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="leaguetable.php">league Table</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="team.php">Team</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="matchreports.php">Match Reports</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="events.php">Events</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="myprofile.php">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>	
	  
	  <!-- Dropdown menu that is only visable for admins -->
	  <?php
	  if( $_SESSION['usertype'] == '1' )
	  {	  
	  echo'
	 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin 
        </a>
		
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="manage_player/manage_players.php">Manage Players</a>
		<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="manage_user/manage_users.php">Manage Users</a>
        <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="manage_fixture/manage_fixtures.php">Manage Fixtures</a>
		<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="manage_report/manage_report.php">Manage Reports</a>
		<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="manage_event/manage_event.php">Manage Events</a>
		<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="newsletter.php">Newsletter</a>
        </div>
      </li>	 
	  ';
	  }
?>	  
    </ul>
  </div> <!-- End of nav bar collapse -->
  
	<!-- Brand image on right side of nav bar -->
	<a class="navbar-brand" id="badge" href="#">
		<img src="images/badge.svg" width="50" height="50" class="d-inline-block align-top" alt="">
		Cowdenbeath FC
	</a>
</nav>   
<!-- NAV BAR ENDS -->
  
  </body> <!-- Body ends -->
  
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html> <!-- HTML ends -->