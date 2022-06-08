<?php 
# Set page title and display header section.
$page_title = 'Home';
include ('includes/headeroutLog.php');
?>
<!doctype html>
<html lang="en">
<head>

 </head>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav> 
   <body>	
    
<div class="container">
	
<div class="carousel1">
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/cara1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/cara2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/cara3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<div class="row">
	<div class="col">
			<div class="card mb-3">
  <div id="datalink" class="card-body">
<iframe frameborder="0"  scrolling="no" width="100%" height="100%" src="https://www.fctables.com/teams/cowdenbeath-183083/iframe/?type=team-next-match&lang_id=2&country=187&template=597&team=183083&timezone=Europe/London&time=24&width=100%&height=100%&font=Verdana&fs=12&lh=22&bg=FFFFFF&fc=333333&logo=1&tlink=1&scfs=22&scfc=333333&scb=1&sclg=1&teamls=80&sh=1&hfb=1&hbc=3bafda&hfc=FFFFFF"></iframe>
  </div>
			</div>
	</div>
</div>

<div class="row">
	<div class="col">
			<div class="card mb-3">
  <div id="datalink" class="card-body">
<iframe frameborder="0"  scrolling="no" width="100%" height="100%" src="https://www.fctables.com/teams/cowdenbeath-183083/iframe/?type=team-last-match&lang_id=2&country=187&template=597&team=183083&timezone=Europe/London&time=24&width=100%&height=100%&font=Verdana&fs=12&lh=22&bg=FFFFFF&fc=333333&logo=1&tlink=1&scfs=22&scfc=333333&scb=1&sclg=1&teamls=80&sh=1&hfb=1&hbc=3bafda&hfc=FFFFFF">
</iframe>
  </div>
			</div>
	</div>
</div>

<div class="row">
	<div class="col">
			<div class="card mb-3">
  <div id="datalink" class="card-body">
<iframe frameborder="0"  scrolling="no" width="100%" height="100%" src="https://www.fctables.com/scotland/3-division/iframe/?type=league-scores&lang_id=2&country=187&template=597&team=183083&timezone=Europe/London&time=24&width=100%&height=100%&font=Verdana&fs=12&lh=22&bg=FFFFFF&fc=333333&logo=0&tlink=0&scoreb=f4454f&scorefc=FFFFFF&sgdcoreb=8f8d8d&sgdcorefc=FFFFFF&sh=0&hfb=1&hbc=3bafda&hfc=FFFFFF"></iframe>
  </div>
			</div>
	</div>
</div>

</div>
   </body>
           
  <?php
include ( 'includes/footer.php' );
?>   
        
</html> 