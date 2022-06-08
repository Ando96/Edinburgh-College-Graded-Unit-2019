<?php
# Set page title
$page_title = 'Sub Now'; #Page title 
#As this page is included within another, nav bar is not required here.
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
<!-- End of page styling -->

</head> <!-- Head ends -->
 
	<!-- breadcrumb under nav bar to inform the user what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Sub Now</li>
		</ol>
	</nav> 
	<!-- End of breadcrumb -->
	
<body> <!-- Body begins -->

	<div class="container"> <!-- Bootstrap container begins -->

		<div class="row"> <!-- Row begins -->
			<div class="col"> <!-- Col begins -->
				<div class="card mb-3"> <!-- Card begins -->
					<div class="card-body"> <!-- Card body begins -->

						<h3 class="card-title text-center">Sub Now And Get Access To More Content!</h3>
						<br>
						<h4 class="card-title text-center">View Content Such As:</h3>

						<ul class="list-group list-group-flush align-items-center">
							<li class="list-group-item">Match Reports</li>
							<li class="list-group-item">Events</li>
							<li class="list-group-item">Team And Players</li>
						</ul>
						<br>

						<p class="card-title text-center">Click The PayPal Button To Subscribe!</p>

<!-- PayPal button begins -->
<!-- Clicking opens a PayPal window but keeps the user on the site, after payment the user is directed to thankyou page -->
<div id="paypal-button-container"style="text-align:center;">
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
// Render the PayPal button
paypal.Button.render({
// Set your environment
env: 'sandbox', // sandbox | production

// Specify the style of the button
style: {
  layout: 'vertical',  // horizontal | vertical
  size:   'medium',    // medium | large | responsive
  shape:  'rect',      // pill | rect
  color:  'gold'       // gold | blue | silver | white | black
},

// Specify allowed and disallowed funding sources
//
// Options:
// - paypal.FUNDING.CARD
// - paypal.FUNDING.CREDIT
// - paypal.FUNDING.ELV
funding: {
  allowed: [
    paypal.FUNDING.CARD,
    paypal.FUNDING.CREDIT
  ],
  disallowed: []
},

// Enable Pay Now checkout flow (optional)
commit: true,

// PayPal Client IDs - replace with your own
// Create a PayPal app: https://developer.paypal.com/developer/applications/create
client: {
  sandbox: 'AYhEhwugpIN3_FbNec9qRBDwPOtrGk-ePMI3y1QEp-GyuLZjla3MmhThG7oohh39RCWUx1maj9tLsycl',
  production: '<insert production client id>'
},

payment: function (data, actions) {
  return actions.payment.create({
    payment: {
      transactions: [
        {
          amount: {
            total: '5.00',
            currency: 'GBP'
          }
        }
      ]
    }
  });
},

onAuthorize: function (data, actions) {
  return actions.payment.execute()
    .then(function () {
	  document.cookie = "valid =1";
	  window.location.href = "thankyou.php";
	   window.alert('Payment Complete!');
    });
}

}, '#paypal-button-container');
</script>
</div>
<!-- End of PayPal button -->

<p class="card-title text-center">Not Interested? Click Here To Go Home<a href="indexLog.php" style="margin-left:20px;><button type="button" class="btn btn-primary" class='test'>Home</button></a></p>

					</div> <!-- End of card body -->
				</div> <!-- End of card -->
			</div> <!-- End of col -->
		</div> <!-- End of row -->
	</div> <!-- End of bootstrap container -->
</body> <!-- End of body -->

<!-- Include newsletter subscription at the bottom of the page -->   
<?php
include ( 'includes/footer.php' );
?>  

</html> <!-- End of HTML -->