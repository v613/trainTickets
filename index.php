<?php
require_once 'model.php';
require_once 'controller.php';
require_once 'view.php';
//conectare la o baza de date
$db=new DatabaseConnect("localhost","trainTickets","root","");
$model=new Model();
$controller=new Controller($model);
$view=new View($model,$controller);

if(isset($_GET['action']) && $_GET['action']=='changeTitle')
	{
		$view->refreshTitle();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>ROTT</title>
	<link rel="icon" type="image/png" href="../favicon.png">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/owl.carousel.css">
  	<script src="../js/jquery.quovolver.min.js"></script>
	<!--[if lt IE 9]-->
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<!--[endif]-->
</head>
	<body>
		<!--header starts-->
		<header class="main-header">
			<div class="backbg-color">
				<div class="navigation-bar">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<!--navigation starts-->
								<nav class="navbar navbar-default">
									<div class="navbar-header">
									    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
									       <span class="icon-bar"></span>
									       <span class="icon-bar"></span>
									       <span class="icon-bar"></span>
									    </button>
									    <a class="navbar-brand" href="index.php?action=changeTitle"><span class="grey">RO</span>TT</a>
									</div>
									<div class="collapse navbar-collapse navbar-right" id="myNavbar">
									    <ul class="nav navbar-nav">
									     	<li class="active"><a href="index.php">Principala</a></li>
									        <li><a href="index.php?#listed">Preturi</a></li>
									        <li><a href="index.php?#mapsy">Harta</a></li>
									        <li><a href="index.php?action=regulament">Regulament</a></li>
									        <li><a href="index.php?action=news">Stiri</a></li>
									        <li><a href="admin/index.php">Administrare</a></li>
									    </ul>
									</div>
								</nav>
								<!--navigation ends-->
							</div>
						</div>
					</div>
				</div>
				<!--banner starts-->
				<div class="banner-text">
					<div class="container">
						<?php
						if(isset($_GET['action']) && $_GET['action']=='news')
							{
								$view->getPage('news');
							}
						if(isset($_GET['action']) && $_GET['action']=='regulament')
						{
							$view->getPage('regulament');
						}
						?>
						<div class="row">
							<div class="banner-info text-center">
								<h2><span class="grey">ROTT</span> - Reserve Online Train Tickets</h2>
							</div>
							
							<div class="banner-heading text-center">
								<h3>Cea mai simpla cale de a calatori cu trenul.</h3>
							</div>
							<div class="banner-search col-md-offset-2 col-md-8 ">
								<div class="col-md-4">
									<select class="form-control sellone" name="citySelect">
										<?php 
											$Query = mysql_query("SELECT * FROM city");
											$result = mysql_fetch_array($Query);
											do{
												echo "<option>$result[0]</option>";
											}while($result = mysql_fetch_array($Query));
										?>
									</select>
								</div>
							
								<div class="col-md-4">
									<select class="form-control sellone" name="citySelect">
										<option></option>
										<?php 
											$Query = mysql_query("SELECT * FROM city");
											$result = mysql_fetch_array($Query);
											do{
												echo "<option>$result[0]</option>";
											}while($result = mysql_fetch_array($Query));
										?>
									</select>
								</div>

								<div class="col-md-3">
									<div class="form-btn">
										<button type="submit" onclick="shedule()">Cauta</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--banner ends-->
		</header>
		<!--header ends-->
		<div class="container"><div id="response" class="col-md-offset-3 col-md-6"></div></div>
		<script>
function shedule() {
	var city1=document.getElementsByName("citySelect")[0].value;
	var city2=document.getElementsByName("citySelect")[1].value;
    xmlhttp = new XMLHttpRequest();// code for IE7+, Firefox, Chrome, Opera, Safari       
    xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                document.getElementById("response").innerHTML = xmlhttp.responseText;            
        };
        xmlhttp.open("GET","shedule.php?c1="+city1+"&c2="+city2,true);
        xmlhttp.send();
}
</script>
		<section class="intro-one">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="intro-text text-center">
							<h3>Suntem alaturi atunci cind calatoresti</h3>
							<p>Fie ca pleci acasa sau cauti un loc pitoresc,<br>noi iti oferim tot comfortul pentru a savura orice moment</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--listing section-->
		
		<section class="feature" id="mapsy">
			<div class="container">
					<iframe src="https://www.google.com/maps/d/embed?mid=1vu7N1LgPW_CRaa8YkfLLZe8Z2q0" width="1150" height="680"></iframe>
			</div>
		</section>
		<footer class="footer">
			<div class="container">
				<div class="row text-center">
					<ul class="footer-social">
						<li><a href="https://www.facebook.com/Bilete-Tren-MD-516991975176715/"><i class="fa fa-facebook" id="blue"></i></a></li>
						<li><a href="#"><i class="fa fa-vk" id="red"></i></a></li>
						<li><a href="https://www.youtube.com/user/TrainsInRomania/videos" target="_blank"><i class="fa fa-youtube" id="light-blue"></i></a></li>
						<li><a href="https://www.instagram.com/explore/tags/trainrailway/?hl=en" target="_blank"><i class="fa fa-instagram" id="blue"></i></a></li>
					</ul>
				</div>
			</div>
		</footer>
		<section class="footer-line">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>2016 &copy; All Rights Reserved. Designed By <a href="http://www.html5layouts.com">Petru Focsa</a> using <a href="https://pixabay.com">freedigitalphotos</a> and <a href="https://picjumbo.com">picjumbo</a> images</a></p>
					</div>
				</div>
			</div>
		</section>
		<script src="../js/jquery.min.js"></script>
    	<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/jquery-1.9.1.min.js"></script> 
    	<script src="../js/owl.carousel.js"></script>
    	<script src="../js/jquery.mixitup.js" type="text/javascript"></script>
    	<script type="text/javascript" src="../js/jquery.quovolver.js"></script>
    	<!--for smooth scrolling-->
		    	<script>
			$(function() {
			  $('a[href*=#]:not([href=#])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html,body').animate({
			          scrollTop: target.offset().top
			        }, 1000);
			        return false;
			      }
			    }
			  });
			});
			</script>
			
    	<!--demo-->
    	<script>
	    $(document).ready(function() {
	      $("#owl-demo").owlCarousel({
	        autoPlay: 4000,
	        items : 4,
	        itemsDesktop : [1199,3],
	        itemsDesktopSmall : [979,3]
	      });

	    });

    	</script>

    	<script type="text/javascript">
		   

		    $(document).ready(function() {
		     
		      var owl = $("#owl-demo");
		     
		      owl.owlCarousel();
		     
		      // Custom Navigation Events
		      $(".next").click(function(){
		        owl.trigger('owl.next');
		      })
		      $(".prev").click(function(){
		        owl.trigger('owl.prev');
		      })
		     
		    });




    	</script>

    	<script type="text/javascript">
		    	$(function(){

			// Instantiate MixItUp:

			$('#Container').mixItUp();

		});
    	</script>
    	<script>
		    		jQuery(function ($) {
		    // fancybox
		    $(".fancybox").fancybox({
		        modal: true, // disable regular nav and close buttons
		        // add buttons helper (requires buttons helper js and css files)
		        helpers: {
		            buttons: {}
		        } 
		    });
		    // filter selector
		    $(".filter").on("click", function () {
		        var $this = $(this);
		        // if we click the active tab, do nothing
		        if ( !$this.hasClass("active") ) {
		            $(".filter").removeClass("active");
		            $this.addClass("active"); // set the active tab
		            // get the data-rel value from selected tab and set as filter
		            var $filter = $this.data("rel"); 
		            // if we select view all, return to initial settings and show all
		            $filter == 'all' ? 
		                $(".fancybox")
		                .attr("data-fancybox-group", "gallery")
		                .not(":visible")
		                .fadeIn() 
		            : // otherwise
		                $(".fancybox")
		                .fadeOut(0)
		                .filter(function () {
		                    // set data-filter value as the data-rel value of selected tab
		                    return $(this).data("filter") == $filter; 
		                })
		                // set data-fancybox-group and show filtered elements
		                .attr("data-fancybox-group", $filter)
		                .fadeIn(1000); 
		        } // if
		    }); // on
		}); // ready
    	</script>
    	<!--texitimonial-->
    	<script>$('.quotes').quovolver({equalHeight:true});
    	</script>
    	<script>function redirect(id) {window.open("order.php?sch="+id, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=500,left=400,width=600,height=700");}</script>
	</body>
</html>
