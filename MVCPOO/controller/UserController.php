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
			// INstance and execute function
			$user = new userModel();
			$users = $user->ListUsers();
			// Showing view
			require_once "view/user/list.php";
		}

		public function edit()
		{
			$user = new userModel();

			if(isset($_REQUEST['id']))
			{
				$user = $user->getUser($_REQUEST['id']);
			}

			require_once "view/user/edit.php";
		}

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