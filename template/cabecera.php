<?php 
	session_start();
	$txtUsuario=(isset($_SESSION['nombre']))?$_SESSION['nombre']:"";
?>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="iso-8859-1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Trabajo Práctico - SharePoint Colaborativo</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	
</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<ul class="nav navbar-nav">

			<li class="nav-item">
				<a class="nav-link" href="index.php">Home </a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="nosotros.php">Nosotros </a>
			</li>

			<?php
				if($txtUsuario==""){ ?>

					<li class="nav-item">
					<a class="nav-link" href="login.php">LogIn</a>
					</li>
			<?php } else { ?>

				<li class="nav-item">
					<a class="nav-link px-3 text-white" href="perfilUsuario.php"> <?php echo $txtUsuario; ?></a>
				</li>
			<?php } ?>
		</ul>
	</nav>

	<div class="container">
		
		<br/>
		<div class="row">