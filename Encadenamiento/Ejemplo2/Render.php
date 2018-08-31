<?php
	require 'Slug.php';

	/**
	* 
	*/
	class Render
	{
		
		public function sanitize()
		{
			$slug = new Slug;
			// Permite retornar lo que queremos mantener vivo a lo largo del encadenamiento. EJ. class Slug
			return $slug;
		}
	}