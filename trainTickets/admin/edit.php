<?
include "connect";
$range=1;
if(isset($_POST['submit']))
	{
		$train = $_POST['train'];
		$train=mysql_fetch_row(mysql_query("SELECT id FROM train WHERE name='$train'"));
		$train=$train[0];
		$cityFrom = $_POST['cityFrom'];
		$cityTo = $_POST['cityTo'];
		$date = $_POST['date'];
		$date2 = $_POST['date2'];
		$var=$_POST['var'];
		$Update = mysql_query("UPDATE schedule 
							   SET id_train='$train', start='$cityFrom',destination='$cityTo',start_time='$date',destination_time='$date2'
				 			   WHERE id='$var'");
		if($Update === FALSE)
			die(mysql_error());
	}
function getsched()
	{
		$max=$GLOBALS['range']*10;
		$min = $max - 10;
		$Q = mysql_query("SELECT * FROM schedule WHERE id BETWEEN $min AND $max ");
		$q = mysql_fetch_array($Q);
		echo "<table class='table table-hover'><thead><tr><th>Tren</th><th>Din</th><th>Spre</th><th>Ora Plecare</th><th>Ora Sosire</th></tr></thead>";
		echo "<tbody>";
		do
			{
				echo "<tr><td><a class='nav-link' href='edit.php?id=$q[0]'>$q[1]</a></td><td>$q[2]</td><td>$q[3]</td><td>$q[4]</td><td>$q[5]</td><tr>";
			}while($q = mysql_fetch_array($Q));
		echo "</tbody></table>";
	}

?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Editeaza Orar</title>
				<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
				  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
				  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
				  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js" />
    <script type="text/javascript" src="../js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css" />
    		 	<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
    			<meta name="generator" content="Codeply">
		</head>
		<body>
			<div class="container" id="main">
				<?
				if(isset($_GET['id']))
					{
						$var = $_GET['id'];
						$sch = mysql_fetch_row(mysql_query("SELECT * FROM schedule WHERE id=$var"));
						$tren = mysql_fetch_row(mysql_query("SELECT name FROM train WHERE id=$sch[1]"));
						$tren = $tren[0];
						$cityFrom = $sch[2];
						$cityTo = $sch[3];
						$date = $sch[4];
						$date2 = $sch[5];
						echo '<form name="update" action="edit.php" method="POST">';
						echo '<div class="form-group">';
						
						echo '<div class="col-md-2">';
				    	echo '<label>Tren</label>';
				    	echo '<select class="form-control" name="train" required>';
	                    echo "<option>$tren</option>";
                      	$T = mysql_query("SELECT name FROM train ");
						$t = mysql_fetch_array($T);
						do{echo "<option>$t[0]</option>";}while ($t = mysql_fetch_array($T));
						echo "</select></div>";

						echo '<div class="col-md-2">';
				    	echo '<label>Din</label>';
				    	echo '<select class="form-control" name="cityFrom" required>';
	                    echo "<option>$cityFrom</option>";
                      	$FROM = mysql_query("SELECT * FROM city ");
						$f = mysql_fetch_array($FROM);
						do{echo "<option>$f[0]</option>";}while ($f = mysql_fetch_array($FROM));
						echo "</select></div>";

						echo '<div class="col-md-2">';
				    	echo '<label>Spre</label>';
				    	echo '<select class="form-control" name="cityTo" required>';
	                    echo "<option>$cityTo</option>";
                      	$FROM = mysql_query("SELECT * FROM city ");
						$f = mysql_fetch_array($FROM);
						do{echo "<option>$f[0]</option>";}while ($f = mysql_fetch_array($FROM));
						echo "</select></div>";

						echo '<div class="col-md-3">';
        	        	echo '<label>Data Pornire</label>';
            			echo '<div class="form-group">';
  						echo '<div class="input-group date" id="datetimepicker1" >';
    					echo "<input type='text' class='form-control' name='date' value='$date'/>";
    					echo '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></div></div>';

    					echo '<div class="col-md-3">';
        	        	echo '<label>Data Sosire</label>';
            			echo '<div class="form-group">';
  						echo '<div class="input-group date" id="datetimepicker2" >';
    					echo "<input type='text' class='form-control' name='date2' value='$date2'/>";
    					echo '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></div></div>';
						echo "<input type='hidden' value=$var name='var'>";
			  			echo '<button type="submit" class="btn btn-primary btn-block" name="submit">Update</button>';
						echo "</form>";
                    
					}
				else
					{
						getsched();
						$p=$range;
						$n=$range+1;
						echo '<ul class="pager">';
						echo "<li><a href=\"edit.php?p=$p\">Previous</a></li>";
						echo "<li><a href=\"edit.php?p=$n\">Next</a></li>";
						echo '</ul>';
					}
				?>
			</div>
			<script>$(function () {$('#datetimepicker1').datetimepicker();});</script>
			<script>$(function () {$('#datetimepicker2').datetimepicker();});</script>
		</body>
	</html>
