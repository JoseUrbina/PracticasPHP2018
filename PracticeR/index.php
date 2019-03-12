<!DOCTYPE html>
<?php
	require_once "conexion.php";

	try
	{
		$con = Conexion::conectar();
		$usuarios = array();

		$amount = 3;
		$page = 1;

		if(isset($_GET["page"]))
			$page = (int)$_GET["page"];

		$start = ($page - 1) * $amount;

		$sql_all = "SELECT COUNT(*) as Total FROM Usuarios WHERE active = 1";

		$result_total = $con->prepare($sql_all);

		$total_reg = 0;

		if(!$result_total->execute())
		{
			header("location:index.php?m=3");
		}
		else
		{
			while($reg = $result_total->fetch(PDO::FETCH_ASSOC))
			{
				$total_reg = $reg["Total"];
			}
		}

		$total_pages = ceil($total_reg / $amount);

		$sql = "SELECT * FROM Usuarios WHERE active = 1 LIMIT :start, :fin";

		$result_all = $con->prepare($sql);
		$result_all->bindValue(":start", $start, PDO::PARAM_INT);
		$result_all->bindValue(":fin", $amount, PDO::PARAM_INT);

		if(!$result_all->execute())
		{
			header("location:index.php?m=3");
		}
		else
		{
			while($reg = $result_all->fetch(PDO::FETCH_ASSOC))
			{
				$usuarios[] = $reg;
			}
		}
	}
	catch(Exception $e)
	{
		die("Error: {$e->getMessage()}");
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Listado de usuarios</title>
		<style type="text/css">
			#tabla td
			{
				border: 1px dotted red;
			}

			h2{
				margin-bottom: 5px;
			}

			#frmDelete
			{
				display:inline;
			}
		</style>
	</head>
	<body>
		<h2>Listado de usuarios</h2>

		<a href="addUser.php"><button>Agregar</button></a>

		<?php
			if(isset($_GET["m"]))
			{
				switch ($_GET["m"]) 
				{
					case 1:
		?>
						<h3 style="color:green;">Record saved successfully!</h3>		
		<?php
						break;
					case 2:
		?>
						<h3 style="color:green;">Record edited successfully!</h3>
		<?php
						break;
					case 3: 
		?>
						<h3 style="color:red;">Failed query!</h3>
		<?php
						break;
					case 4:
		?>
						<h3 style="color:red;">It's not been done any query!</h3>
		<?php
						break;
					case 5:
		?>
						<h3 style="color:green;">Record deleted successfully!</h3>
		<?php
						break;				
				}
			}
		?>
		<hr>
		<table id="tabla">
			<thead>
				<tr>
					<td>ID</td>
					<td>Nickname</td>
					<td>Age</td>
					<td>Opciones</td>
				</tr>
			</thead>
			<tbody>
				<?php
					if(count($usuarios) > 0)
					{
						foreach($usuarios as $user)
						{
				?>
					<tr>
						<td><?php echo $user["idUsuario"];?></td>
						<td><?php echo $user["nickname"];?></td>
						<td><?php echo $user["age"];?></td>
						<td>
							<a href="addUser.php?idUsuario=<?php echo $user["idUsuario"];?>"><button>Edit</button></a>
							<form id="frmDelete" action="delete.php" method="POST">
								<input type="hidden" 
									   value="<?php echo $user["idUsuario"];?>"
									   name="idUsuario">
								<input type="submit" name="delete" value="Delete">
							</form>
						</td>
					</tr>
				<?php
						}

						echo "<tr><td colspan='4'>";

						for($i=0; $i < $total_pages; $i++)
						{
							echo " <a href='index.php?page= " . ($i + 1) ."'>" . ($i + 1) . "</a>";
						}

						echo "</td></tr>";
					}
				?>
			</tbody>
		</table>
	</body>
</html>