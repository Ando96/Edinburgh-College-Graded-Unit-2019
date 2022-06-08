<?php
# Set page title and display header section.
$page_title = 'League Table' ;
include ( 'includes/headeroutLog.php' ); #Include navigation bar at top of page
?>

<!doctype html> <!-- HTML begins -->

<html lang="en"> <!-- Set page language to english -->

<head> <!-- Head begins -->

<!-- Styling for this page only -->
<style>
.container{
  border: 10px solid gray; 
}
</style>
<!-- End of styling -->

</head> <!-- End of head -->

	<!-- Breadcrumb under nav bar informing user what page they are on -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">League Table</li>
		</ol>
	</nav> 
	<!-- End of breadcrumb -->
	
   <body> <!-- Body begins -->

<!-- Data stream containing live league table from FCTables website -->   
<!-- There are two different league tables due to the table being too large on phones and overlowing out of the screen -->
<!-- A bootstrap class is used to show and hide different content depending on the screen size -->
<span class="border border-primary">
	<div class="d-none d-sm-none d-md-block"> <!-- Displays only on medium sized screens and above -->
		<div class="container"> <!-- Bootstrap container begins -->
			<div class="row"> <!-- Row begins -->
				<!-- Data stream contained within iframe -->
				<iframe frameborder="0"  scrolling="no" width="100%" height="310" 
				src="https://www.fctables.com/scotland/3-division/iframe/?type=table&lang_id=2&country=187&template=597&team=183083&timezone=Europe/London&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=1&form=1&width=100%&height=325&font=Arial&fs=13&lh=24&bg=FFFFFF&fc=002366&logo=0&tlink=0&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=002366&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=0&hfb=1&hbc=3b427e&hfc=3b427e">
				</iframe> 
				<!-- End of data stream -->
			</div> <!-- End of row -->
		</div> <!-- Bootstrap container ends -->
	</div> <!-- End of medium screen and above display -->
</span>

<!-- Data stream containing live league table fro FCTables website -->   
<span class="border border-primary">
	<div class="d-block d-sm-block d-md-none"> <!-- Only display on small screens -->
		<div class="container"> <!-- Bootstrap container begins -->
			<div class="row"> <!-- Row begins -->
				<!-- Data stream contained within iframe -->
				<iframe frameborder="0"  scrolling="no" width="100%" height="325" 
				src="https://www.fctables.com/scotland/3-division/iframe/?type=table&lang_id=2&country=187&template=597&team=183083&timezone=Europe/London&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=0&form=0&width=100%&height=325&font=Arial&fs=13&lh=24&bg=FFFFFF&fc=002366&logo=0&tlink=0&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=002366&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=0&hfb=1&hbc=3b427e&hfc=3b427e">
				</iframe>
				<!-- End of data stream -->
			</div> <!-- End of row -->
		</div> <!-- Bootstrap container ends -->
	</div> <!-- End of small screen display -->
</span>

   </body> <!-- End of body -->
</html> <!-- End of HTML --> 