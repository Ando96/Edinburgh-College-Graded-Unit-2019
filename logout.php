<?php # DISPLAY COMPLETE LOGGED OUT PAGE.

# Access users session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Goodbye' ; #Page title
include ( 'includes/headerout.php' ); #Include navigation bar at top of page

# Clear existing variables from the session.
$_SESSION = array() ;
  
# Destroy the users session.
session_destroy() ;

# Display body section informing the user they have been logged out of their account.
echo '<div class="container"> 
<div class="row">
	<div class="col">
			<div class="card mb-3">
  <div class="card-body">
<h1 style="color:white;">Goodbye</h1><p style="color:white;">You are now logged out.</p><p><a href="login.php">Log back in</a></p>
  </div>
			</div>
	</div>
</div>
</div>' ;
?>