<?php
/* Controller */
class Controller
	{
		var $Model;
		function __construct($model)
			{
				$this->Model=$model;
			}
		public function changeTitle($NewTitle)
			{
				$this->Model->PageTitle="$NewTitle";
				return $this->Model->PageTitle;
			}
	}
?>