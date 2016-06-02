<?php
include "connect" ;
if (isset($_POST['submit']))
	{
		$title=$_POST['title'];
		$description=$_POST['description'];
		$text=$_POST['text'];
		$insert = "INSERT INTO news (title, description, text, date)
				   VALUES ('$title', '$description','$text',now())";
		$result=mysql_query($insert);
			if($result === FALSE)
				die(mysql_error());
		
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Adaugare Stire</title>
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
			<a href="index.php"><button type="button" class="btn btn-default btn-block" name="back">Inapoi</button></a>
			<div class="container">
			<form name="addNews" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<label>Titlu</label>
				<input type="text" name="title"class="form-control" placeholder="20 caractere" required>
				<label>Descriere</label>
				<input type="text" name="description"class="form-control" placeholder="200 caractere" required>
				<label>Textul Stirei</label>
				<textarea name="text"class="form-control" rows="3"></textarea>
			  <button type="submit" class="btn btn-primary btn-block" name="submit">Adauga</button>
			</form>
		</div>
		</body>
	</html>
