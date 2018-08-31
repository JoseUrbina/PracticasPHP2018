<?php
	// Add the class model
	require_once "model/userModel.php";

	class UserController
	{
		function __construct()
		{

		}

		public function index()
		{
			// Set up amount of record by page, and current page
			$paginacion = array('cantidad' => 3, 'pagina' => 1);

			// if we get a determinate number of page
			if(isset($_GET['pag']))
			{
				$value = $_GET['pag'];

				if($value > 1)
				{
					$paginacion['pagina'] = $value;
				}
				else
				{
					header("location:index.php");
				}
			}

			// Set up the beginnig page for our pagination
			$inicio = ($paginacion['pagina'] - 1) * $paginacion['cantidad'];

			// Instance and execute function
			$user = new userModel();
			// Getting the total amount of user
			$total = $user->totalUsers();
			// Getting the number of page that will see the users
			$totalPaginas = ceil($total/$paginacion['cantidad']);

			// Getting the user object
			$users = $user->ListUsers($inicio, $paginacion['cantidad']);
			
			// Showing view
			require_once "view/user/list.php";
		}

		// FUnction by edit or new record
		public function edit()
		{
			$user = new userModel();

			// if we receive an id
			if(isset($_REQUEST['id']))
			{
				// Gettitng the user record
				$user = $user->getUser($_REQUEST['id']);
			}

			require_once "view/user/edit.php";
		}

		// Delete a determinated user
		public function delete()
		{
			if(isset($_REQUEST['id']))
			{
				$user = new userModel();

				if($user->deleteUser($_REQUEST['id']))
				{
					echo "
						<script>
							alert('Record deleted properly');
							window.location.href='index.php';
						</script>
					";
					// header("location:index.php");
				}
			}
		}

		// Save user
		public function save()
		{
			$user = new userModel();
			$user->id = $_POST['id'];
			$user->Nombre = htmlentities(addslashes($_POST['nombre']));
			$user->Apellido = htmlentities(addslashes($_POST['apellido']));
			$user->Direccion = htmlentities(addslashes($_POST['direccion']));

			$objeto = new userModel();

			if($objeto->saveUser($user))
			{
				header("Location:index.php");
			}
		}
	}
?>