<?php
include "connect" ;
if (isset($_POST['submit']))
	{
		$train = $_POST['train'];
		$train=mysql_fetch_row(mysql_query("SELECT id FROM train WHERE name='$train'"));
		$train=$train[0];
		$cityFrom = $_POST['cityFrom'];
		$cityTo = $_POST['cityTo'];
		$date = $_POST['date'];
		$date2 = $_POST['date2'];
		$insert = "INSERT INTO schedule (id_train, start,destination,start_time,destination_time)
				   VALUES ('$train','$cityFrom','$cityTo','$cityTo','$date','$date2')";
		$result=mysql_query($insert);
			if($result === FALSE)
				die(mysql_error());	
		
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Adaugare Orar</title>
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
			<form name="add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<div class="form-group">
					<div class="col-md-2">
				    	<label>Tren</label>
				    		<select class="form-control" name="train" required>
	                      		<option ></option>
	                      		<?php
                      			$T = mysql_query("SELECT name FROM train ");
								$t = mysql_fetch_array($T);
								do
									{
										echo "<option>$t[0]</option>";
									}while ($t = mysql_fetch_array($T));
							?>
	        	            </select>
	        	    </div>
	        	    <div class="col-md-2">
        	        <label>Din</label>
        	        	<select class="form-control" name="cityFrom" required>
                      		<option ></option>
                      		<?php
                      			$FROM = mysql_query("SELECT * FROM city ");
								$f = mysql_fetch_array($FROM);
								do
									{
										echo "<option>$f[0]</option>";
									}while ($f = mysql_fetch_array($FROM));
							?>
        	            </select></div>
        	        <div class="col-md-2">
        	        <label>Spre</label>
        	        	<select class="form-control" name="cityTo" required>
                      		<option ></option>
                      		<?php
                      			$TO = mysql_query("SELECT * FROM city ");
								$t = mysql_fetch_array($TO);
								do
									{
										echo "<option>$t[0]</option>";
									}while ($t = mysql_fetch_array($TO));
							?>
        	            </select></div>
        	        <div class="col-md-3">
        	        	<label>Data Pornire</label>
            			<div class="form-group">
  							<div class="input-group date" id="datetimepicker1" >
    							<input type="text" class="form-control"name="date" />
    							<span class="input-group-addon">
      								<span class="glyphicon glyphicon-calendar"></span>
    							</span>
  							</div>
						</div>
 
					<script type="text/javascript">$(function () {$('#datetimepicker1').datetimepicker();});</script>
        	       	</div>
				</div>
				<div class="col-md-3">
        	        	<label>Data Sosire</label>
            			<div class="form-group">
  							<div class="input-group date" id="datetimepicker2" >
    							<input type="text" class="form-control"name="date2" />
    							<span class="input-group-addon">
      								<span class="glyphicon glyphicon-calendar"></span>
    							</span>
  							</div>
						</div>
 
					<script type="text/javascript">$(function () {$('#datetimepicker2').datetimepicker();});</script>
        	       	</div>
				</div>
				<p></p>
			  <button type="submit" class="btn btn-primary btn-block" name="submit">Adauga</button>
			</form>
		</div>
		</body>
	</html>
