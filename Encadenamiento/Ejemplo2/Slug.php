<?php
	/**
	* 
	*/
	class Slug
	{
		
		public function render($original)
		{
			// Replace " " by - into variable
			$slug = str_replace(" ", "-",$original);
			// with a regular expresion we can validate the datas
			// \w: letters \d: digitos \-: - \_: _ /i: Sensible a minúsculas y mayúsculas 
			// Any other character deleting, to allow the character in regular expresion
			$slug = preg_replace('/[^\w\d\-\_]/i','',$slug);
			// return the lower variable
			return strtolower($slug);
		}
	}
	
?>