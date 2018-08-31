<?php 
	require_once "model/database.php";

	class ProductModel
	{
		public $db;

		public $CODARTICULO;
		public $SECCION;
		public $NOMBREARTICULO;

		public function __construct()
		{
			try
			{
				$this->db = Database::Conexion();
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}

		public function getProducts($inicio, $fin)
		{
			try
			{
				$query = "SELECT * FROM PRODUCTO LIMIT :inicio, :fin";

				$consulta = $this->db->prepare($query);
				$consulta->bindValue(':inicio', $inicio, PDO::PARAM_INT);
				$consulta->bindValue(':fin', $fin, PDO::PARAM_INT);
				$consulta->execute();

				return $consulta->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}

		public function getATP()
		{
			try
			{
				$query = "SELECT * FROM PRODUCTO";

				$consulta = $this->db->prepare($query);
				$consulta->execute();

				return $consulta->rowCount();
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}

		public function searchProduct($cod, $response = 0)
		{
			try
			{
				$query = "SELECT * FROM PRODUCTO WHERE CODARTICULO = :cod";

				$consulta = $this->db->prepare($query);
				$consulta->bindValue(":cod", $cod);
				$consulta->execute();

				if($response == 0)
				{
					return $consulta->fetch(PDO::FETCH_OBJ);
				}
				else
				{
					return $consulta->rowCount();
				}
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}

		public function deleteProduct($cod)
		{
			try
			{
				$query = "DELETE FROM PRODUCTO WHERE CODARTICULO = :cod";
				$consulta = $this->db->prepare($query);
				$consulta->bindValue(":cod", $cod);
				$consulta->execute();

				return true;
			}	
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}

			return false;
		}

		public function aoeProduct($product)
		{
			try
			{
				// as this table the primary field is not identity
				// we need to kown if the record exist or not
				if($this->searchProduct($product->CODARTICULO, 1))
				{
					$query = "UPDATE PRODUCTO SET SECCION = :seccion,
							 NOMBREARTICULO = :nombre WHERE CODARTICULO = :cod";
				}
				else
				{
					$query = "INSERT INTO PRODUCTO VALUES(:cod, :seccion, :nombre)"; 
				}

				$consulta = $this->db->prepare($query);
				$consulta->bindValue(":cod", $product->CODARTICULO);
				$consulta->bindValue(":seccion", $product->SECCION);
				$consulta->bindValue(":nombre", $product->NOMBREARTICULO);
				$ok = $consulta->execute();

				if($ok)
				{
					if($consulta->rowCount() > 0)
					{
						return true;
					}
					else
					{
						return false;
					}
				}
			}
			catch(Exception $e)
			{
				die("Error: {$e->getMessage()}");
			}
		}
	}
?>