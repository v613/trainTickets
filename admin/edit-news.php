<?
include "connect";
$range=1;
if(isset($_POST['submit']))
	{
		$var=$_POST['var'];
		$title=$_POST['title'];
		$description=$_POST['description'];
		$text=$_POST['text'];
		$Update = mysql_query("UPDATE news 
							   SET title='$title', description='$description',text='$text',date=now()
				 			   WHERE id='$var'");
		if($Update === FALSE)
			die(mysql_error());
	}
function getsched()
	{
		$Q = mysql_query("SELECT * FROM news ORDER BY id DESC");
		$q = mysql_fetch_array($Q);
		echo "<table class='table table-hover'><thead><tr><th>Titlu</th><th>Descriere</th><th>Data</th></tr></thead>";
		echo "<tbody>";
		do
			{
				echo "<tr><td><a class='nav-link' href='edit-news.php?id=$q[0]'>$q[1]</a></td><td>$q[2]</td><td>$q[4]</td><tr>";
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
						$N = mysql_fetch_row(mysql_query("SELECT * FROM news WHERE id=$var"));
						echo '<form name="update" action="edit-news.php" method="POST">';
						echo '<div class="form-group">';
				    	echo '<label>Titlu</label>';
	                    echo "<input type='text' name='title'class='form-control' value='$N[1]' required>";

				    	echo '<label>Descriere</label>';
				    	echo "<input type='text' name='description'class='form-control' value='$N[2]' required>";
						echo "<input type='hidden' name='var' value=$var>";
						echo "<label>Textul Stirei</label>";
						echo "<textarea name='text'class='form-control'>$N[3]</textarea>";

			  			echo '<button type="submit" class="btn btn-primary btn-block" name="submit">Update</button>';
						echo "</form>";
                    
					}
				else
					{
						getsched();
						$p=$range;
						$n=$range+1;
						echo '<ul class="pager">';
						echo "<li><a href=\"edit-news.php?p=$p\">Previous</a></li>";
						echo "<li><a href=\"edit-news.php?p=$n\">Next</a></li>";
						echo '</ul>';
					}
				?>
			</div>
			<script>$(function () {$('#datetimepicker1').datetimepicker();});</script>
			<script>$(function () {$('#datetimepicker2').datetimepicker();});</script>
		</body>
	</html>
