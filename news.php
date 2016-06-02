<?php include "admin/connect"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>ROTT</title>
	<link rel="icon" type="image/png" href="favicon.png">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
  	<script src="jquery.quovolver.min.js"></script>
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
									    <a class="navbar-brand" href="#"><span class="grey">RO</span>TT</a>
									</div>
									<div class="collapse navbar-collapse navbar-right" id="myNavbar">
									    <ul class="nav navbar-nav">
									     	<li class="active"><a href="index.php">Principala</a></li>
									        <li><a href="regulament.php">Regulament</a></li>
									        <li><a href="news.php">Stiri</a></li>
									        <li><a href="admin/index.php">Administrare</a></li>
									    </ul>
									</div>
								</nav>
								<!--navigation ends-->
							</div>
						</div>
					</div>
				</div>
				
		</header>
		<!--header ends-->
		
	<div class="container text-justify ">
<?php
echo "<div class='container'>";
if(isset($_GET["n"]))
	{
		$news=mysql_fetch_row(mysql_query("SELECT * FROM news WHERE id='$_GET[n]'"));
		echo("
			<h3>$news[1]</h3>
			Data: $news[4]<hr width='80%'>
			<p>$news[3]</p>
			");
	}
else
{
$news=mysql_query("SELECT * FROM news");
$n=mysql_fetch_array($news);

do
	{	
		echo '<div class="bs-callout bs-callout-info news">';
		echo "<div class='col-md-offset-1 col-md-10'><a href='news.php?n=$n[0]'><h4>$n[1]</h4></a>Data $n[4]<p>$n[2]</p></div></div>";
	}while($n=mysql_fetch_array($news));	
}
echo "</div>";
?>
	</div>	
	
		<footer class="footer">
			<div class="container">
				<div class="row text-center">
					<ul class="footer-social">
						<li><a href="#"><i class="fa fa-facebook" id="blue"></i></a></li>
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
		<script src="js/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
	</body>
</html>