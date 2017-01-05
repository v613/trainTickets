<?php
class DatabaseConnect
	{
		var $user;
		var $passwd;
		var $database;
		var $host;
		function __construct($host,$database,$user,$passwd)
			{
				global $connect;
				/* Asignarea datelor necesare pentru conectarea la baza de date*/
				$this->host=$host;
				$this->database=$database;
				$this->user=$user;
				$this->passwd=$passwd;

				$connect=mysql_connect($host,$user,$passwd);
				mysql_select_db($database,$connect);
			}
	}

/* Model */
class Model
	{
		var $PageTitle;
		function __construct()
			{
				$this->PageTitle='ROTT';
			}
	}
?>