<?php 
	require_once "model/ProductModel.php";

	class ProductController
	{
		private $product;

		public function __construct()
		{
			$this->product = new ProductModel();
		}

		public function index()
		{
			$paginacion = array('pagina' => 1, 'cantidad' => 3);

			if(isset($_GET['pag']))
			{
				$v = $_GET['pag'];

				if($v > 0)
				{
					$paginacion['pagina']  = $v;
				}
				else
				{
					header("location:index.php");
				}
			}

			$inicio = ($paginacion['pagina']-1)*$paginacion['cantidad'];

			$total = $this->product->getATP();
			$totalPaginas = ceil($total/$paginacion['cantidad']);

			$products = $this->product->getProducts($inicio, $paginacion['cantidad']);
			require_once "view/Product/list.php";
		}

		public function delete()
		{
			if(isset($_GET['cod']))
			{
				if($this->product->deleteProduct($_GET['cod']))
				{
					header("location:index.php");
				}
			}
		}

		public function edit()
		{
			$p = new ProductModel();

			if(isset($_GET['cod']))
			{
				$p = $this->product->searchProduct($_GET['cod']);
			}

			require_once "view/Product/edit.php";
		}

		public function save()
		{
			$p =  new ProductModel();
			$p->CODARTICULO = $_POST['codigo'];
			$p->SECCION = $_POST['seccion'];
			$p->NOMBREARTICULO = $_POST['nombre'];

			if($this->product->aoeProduct($p))
			{
				header('location: index.php');
			}
		}
	}
?>