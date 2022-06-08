<?php
# Set page title and display header section.
$page_title = 'Newsletter' ; #Page title
include ( 'includes/headeroutLog.php' ); #Include the navigation bar at the top of the page.

#Checks the user's usertype, if the usertype = 0, meaning they are not admins, they are redirected to indexLog
if( $_SESSION['usertype'] == '0' )
{	
	header('Location: ../indexLog.php');
}

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();
  
  # Check for a first name.
  if ( empty( $_POST[ 'title' ] ) )
  { 
   $errors[] = 'Enter title.' ; #If no title is entered an error is displayed
  }
  else
  { 
   $t = mysqli_real_escape_string( $link, trim( $_POST[ 'title' ] ) ) ; #Else if title has been entered assign it to $t variable 
  }
   
  # Check for a gender.
  if (empty( $_POST[ 'date' ] ) )
  { 
    $errors[] = 'Enter date.' ; #If no date has been entered provide an error 
  }  
  else
  { 
   $d = mysqli_real_escape_string( $link, trim( $_POST[ 'date' ] ) ) ; #Else if a date has been entered assign it to the $d variable 
  }
  
  # Check for a date of birth.
  if (empty( $_POST[ 'content' ] ) )
  { 
    $errors[] = 'Enter content.' ; #If no content has been entered provide an error message 
  }  
  else
  { 
   $c = mysqli_real_escape_string( $link, trim( $_POST[ 'content' ] ) ) ; #Else if content has been entered assign it to the $c variable 
  }
   
  # On success insert values into the newsletter database and display two buttons (send and edit)
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO newsletter (title, date, content) VALUES ('$t', '$d','$c')";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<br><div class="container"><h3>Newsletter ready!</h3>
			<a href="sendnewsletter.php"><button type="button" class="btn btn-primary">Send</button></a>
			<br>
			<br>
			<a href="#"><button type="button" class="btn btn-primary">Edit</button></a></div>'; 
    }

 # Close database connection.
 mysqli_close($link); 
 exit();
  }
  
  # Or report errors.
  else 
  {
    echo '<div class="container"><h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</p></div>';
	
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

<head> <!-- Head begins -->

</head> <!-- Head ends -->

	<!-- Breadcrumb under nav bar to infrom the admin what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Newsletter</li>
		</ol>
	</nav>
	<!-- End of breadcrumb -->
	
   <body> <!-- Body begins -->
   
   <form action="newsletter.php" method="post"> <!-- Form for newsletter -->
   
   <div class="container"> <!-- Bootstrap container begins -->
	
	<!-- Input field for title -->
	<input type="text" 
    class="form-control" 
    placeholder="Title" 
	name="title" 
	required 
	size="50" 
    value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
	<hr>	
		
	<!-- Input field for date -->	
	<input type="date" 
	class="form-control" 
    placeholder="Date"
	name="date" 
	required size="50" 
	value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>"> 
	<hr>
	
	<!-- Text area for content -->
	<textarea 
	class="form-control" 
	placeholder="content" 
	name="content" 
	value="<?php if (isset($_POST['content'])) echo $_POST['content']; ?>" ></textarea>	
	<hr>
	
	<!-- Submit button for submitting the newsletter -->
	<input class="btn btn-primary btn-block" type="submit" value="Send Newsletter">
	<hr>			
	
	</form> <!-- End of form -->       

	</div> <!-- End of bootstrap container -->
	
	</body> <!-- End of body -->
	
</html> <!-- End of HTML -->