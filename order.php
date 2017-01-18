<?php
include "admin/connect" ;
if(isset($_GET['sch']))
	{echo "<script>console.log('petros naghibator XXXL');</script>";}
error_reporting(0);

$sch_id=$_GET['sch'];
$querry = mysql_fetch_row(mysql_query("SELECT * FROM schedule WHERE id=$sch_id"));
$querryTrain=mysql_fetch_row(mysql_query("SELECT name,place FROM train WHERE id=$querry[1]"));
$numOfOrders=mysql_fetch_row(mysql_query("SELECT COUNT(sch_id) FROM orders"));
$numOfOrders=$numOfOrders[0];$free=$querryTrain[1] - $numOfOrders;
$price1 = mysql_fetch_row(mysql_query("SELECT distance FROM city WHERE name='$querry[2]'"));$price1 = $price1[0];
$price2 = mysql_fetch_row(mysql_query("SELECT distance FROM city WHERE name='$querry[3]'"));$price2 = $price2[0];
$price = ($price2 - $price1)*0.5;
if (isset($_POST['submit']))
	{session_start();
		$client = $_POST['name'];$_SESSION["client"]=$client;
		$mail = $_POST['mail'];$_SESSION["mail"]=$mail;
		$sch_id = $_POST['id'];$_SESSION["sch_id"]=$sch_id;
		$place = $_POST['phpPOS'];$_SESSION["place"]=$place;
		$plecare = $_POST['plecare'];$_SESSION["plecare"]=$plecare;
		$cursa = $_POST['cursa'];$_SESSION["cursa"]=$cursa;
		$sosire = $_POST['sosire'];$_SESSION["sosire"]=$sosire;
		$price = $_POST['price'];$_SESSION["price"]=$price;
	$insert = "INSERT INTO orders (client, sch_id,price,place)VALUES ('$client','$sch_id','$price','$place')";
	$result=mysql_query($insert);
		if($result === FALSE)die(mysql_error());
		echo ("<script>document.write('\"<hr><h1>Bilet ROTT ADASDASd</h1><label>Nume Prenume: $_SESSION[client] </label><br><label>Email: $_SESSION[mail] </label><br><label>Plecare: $_SESSION[plecare]</label><br><label>Sosire: $_SESSION[sosire]</label><br><label>Locul $_SESSION[place]</label><br><label>Pret:$_SESSION[price] MDL</label>\"');document.documentElement.innerHTML='<hr><h1>Bilet ROTT ADASDASd</h1><label>Nume Prenume: $_SESSION[client] </label><br><label>Email: $_SESSION[mail] </label><br><label>Plecare: $_SESSION[plecare]</label><br><label>Sosire: $_SESSION[sosire]</label><br><label>Locul $_SESSION[place]</label><br><label>Pret:$_SESSION[price] MDL</label>';</script>");

	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Inregistare Bilet</title>
			<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    		 	<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
    			<meta name="generator" content="Codeply">
		</head>
		<body>
		<div class="container" ng-app="" >
			<form name="add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<div class="form-group" >
					<label>Numele Prenumele</label>
    				<input type="text" class="form-control" name="name"placeholder="Focsa Petru" required ng-model="name">
    				<label>Adresa de e-mail</label>
    				<input type="email" id="mail" class="form-control" placeholder="something@mail.com" name="mail"required ng-model="text">
    				<input type="hidden" id="phpPOS" name="phpPOS">
    				<input type="hidden" name="plecare" value="<?php echo "$querry[2] > $querry[4]";?>">
    				<input type="hidden" name="sosire" value="<?php echo "$querry[3] > $querry[5]";?>">
    				<input type="hidden" name="price" value="<?php echo $price;?>">
    				<input type="hidden" name="cursa" value="<?php echo "$querryTrain[0] $sch_id";?>">
    				<input type="hidden" name="id" value="<?php echo $sch_id ?>">
    				<label>Locuri <span class="badge"><?php echo $free;?></span></label>
    				<img src="img/plackart.jpg" class="img-responsive">
    				<div class="btn-group container">
    					<?php
    						for($i=1;$i<55;$i++)
    							echo "<button type='button' class='btn btn-default' onclick='place($i)'>$i</button>";
    					?>
					  
					</div>
				</div>
			  <button type="submit" class="btn btn-primary btn-block" name="submit" onsubmit="sendMail()">Rezerv</button>
			</form>
			<div id="send">
			<hr>
    				<label>Titular: {{name}} </label><br>
    				<label>Plecare: <?php echo "$querry[2] > $querry[4]";?> </label><br>
    				<label>Sosire: <?php echo "$querry[3] > $querry[5]";?> </label><br>
    				<label id="pos">Locul: </label><br>
    				<label>Pret: <?php echo abs($price)?> MDL</label>
    		</div>
		</div>
		<script>
			function place(pos)
				{
					document.getElementById("pos").innerHTML="Locul: "+pos;
					document.getElementById("phpPOS").value=pos;
				}
			function sendMail() 
				{
					console.log("I work");
					var mail=document.getElementById("mail").value;
		   			var link = mail+"&subject=" + escape("Rezervare Bilet ROTT")+ "&body=" + escape("document.getElementById('send').innerHTML");
		   			window.location.href = link;
		        }

  
		</script>
		</body>
	</html>
