<?php 
	class Render
	{
		Protected $data = [];
		Protected $built = null;

		public function words(array $data)
		{
			foreach ($data as $word) {
				$this->data[] = $word;
			}

			// This code allows us to return the class with the values in the differente variables
			// for following with the encadenamiento
			return $this;
		}

		public function link($character)
		{
			foreach ($this->data as $word) {
				$this->built .= $word . $character;
			}

			return $this;
		}

		public function get()
		{		
			return $this->built;
		}
	}
?>