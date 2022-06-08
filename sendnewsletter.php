<?php
$page_title = 'Send Newsletter'; #Page title
include ( 'includes/headeroutLog.php' ); #Include navigation bar at the top of the page

#If the user trying access the page is not an admin, redirect the user to indexLog
if( $_SESSION['usertype'] == '0' )
{	
	header('Location: ../indexLog.php');
}

#Establish connection to the database 
require ('connect_db.php');
 
#Select all from database table email
$q = "SELECT * FROM email" ;
$r = mysqli_query( $link, $q ) ;

#If there are users signed up to the newsletter 
 if ( mysqli_num_rows( $r ) > 0 )
{
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
   $name = $row['name']; #Store name in $name variable 
   $email = $row['email']; #Store email in $email variable 
   
   //call send email function and pass variables
   sendEmail($email, $name);  
 }
  # Close database connection.
  mysqli_close( $link ) ; 
}

# Or display message.
    else  
      { 
	   echo '<p>No users have signed up for the newsletter!</p>' ; 
	  }

#sendEmail begins
function sendEmail($email, $name)
{
#Establish connection to the database 	
require ('connect_db.php');
 
$q = "SELECT * FROM newsletter ORDER BY id DESC LIMIT 0, 1" ;
$r = mysqli_query( $link, $q ) ;
	
$row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
  
$title = $row['title'];
$date = $row['date'];
$content = $row['content'];
 
	
            $to = $email;							 
    		$from = "HNDSOFT2SA1@webdev.edinburghcollege.ac.uk";
    		$subject = 'Website: Account Activation';
    		$message = '<!DOCTYPE html>
						<html>
    		    			<head><meta charset="UTF-8">
														
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
	<link rel="stylesheet" href="css/mystyle.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/solid.css" integrity="sha384-rdyFrfAIC05c5ph7BKz3l5NG5yEottvO/DQ0dCrwD8gzeQDjYBHNr1ucUpQuljos" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-u5J7JghGz0qUrmEsWzBQkfvc8nK3fUT7DCaQzNQ+q4oEXhGSx+P2OqjWsfIRB8QT" crossorigin="anonymous">
							
							<title>Weekly Newsletter</title>
							</head>																					
    							<body>
								
								<div class="container">									
<div class="row">
	<div class="col">
			<div class="card mb-3">		
  <div class="card-body">
<img src="images/badge.svg" width="100" height="100" class="d-inline-block align-top" alt="">
<img src="images/badge.svg" width="100" height="100" class="d-inline-block" align="right" alt="">
<h1 class="card-title text-center">' . $row["title"] .'</h1>
<hr>
<h3 class="card-title text-center">' . date('d-m-Y', strtotime($row["date"])) . ' </h3>
<hr>
<div class="b"><p class="card-title text-center">' . $row["content"] . ' </p></div>
<hr>
Click the link below to unsubscribe from the newsletter:<br><br>
<a href="http://webdev.edinburghcollege.ac.uk/~HNDSOFT2SA1/Graded_Unit_Website/unsubscribe.php?email='.$email.'"><button type="button" class="btn btn-primary">Unsubscribe</button></a>
<img src="images/badge.svg" width="100" height="100" class="d-inline-block align-top" alt="">
<img src="images/badge.svg" width="100" height="100" class="d-inline-block" align="right" alt="">
  </div>
			</div>
	</div>
</div> 									
									</div> 
    							</body>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
						</html>';
																		
																		
    		$headers = "From: ".$from."\n";
    		$headers .= "MIME-Version: 1.0\n";
    		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
    		if(mail($to, $subject, $message, $headers)){     }	
			
#Close database link			
mysqli_close( $link ) ; 
}
#sendEmail ends 

#After newsletter sent include the newsletterSent page 
include ( 'newsletterSent.php' );
?>	