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
		public function GenerateNewBlock($block)
			{
				switch ($block) {
					case 'add_1':
						$this->Model->Add_Block('add_1');
						break;
					
					default:
						# code...
						break;
				}
			}
	}
?>