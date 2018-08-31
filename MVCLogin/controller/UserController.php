<?php
	require_once "model/userModel.php";

	class UserController
	{
		private $userModel;

		function __construct()
		{
			$this->userModel = new userModel();
		}

		public function index()
		{
			$encontrado = false;

			if(isset($_POST['login']))
			{
				$user = $_POST['user'];
				$pwd = $_POST['pwd'];
				$remember = (isset($_POST['remember'])?1:0);

				$encontrado = $this->userModel->VerifyUser($user, $pwd, $remember);
			}

			require_once "view/user/login/login.php";
		}
	}
?>