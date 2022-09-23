<?php include("./template/cabecera.php"); 

$txtArchivo=(isset($_FILES['txtArchivo']['name']))?$_FILES['txtArchivo']['name']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

if($txtUsuario==""){

	header('Location:login.php');
}

switch($accion) {

	case "Agregar":

		$fecha = new DateTime();
		$nombreArchivo = ($txtArchivo!="")?$fecha->getTimestamp()."_".$_FILES['txtArchivo']['name']:"nada";
		$tmpArchivo = $_FILES['txtArchivo']['tmp_name'];

		if($tmpArchivo!="") {

			move_uploaded_file($tmpArchivo,"./repositorio/".$nombreArchivo);
		}

	break;

	case "Cancelar":

	break;

	case "Descargar":
		
		?> <meta http-equiv="refresh" content="0;url=descarga.php?archivo=<?php echo $txtNombre;?>"> <?php

	break;

	case "Borrar":

		$filePath = './repositorio/'.$txtNombre;

		if(!empty($txtNombre) && file_exists($filePath)) {
		
			unlink($filePath);
		}
		
	break;

}
?>

<div class="col-md-5">
	
	<form method="POST" enctype="multipart/form-data">

		<div class = "form-group">
			<label for="txtArchivo">Nombre:</label>
			<input type="file" class="form-control" id="txtArchivo" name="txtArchivo">
		</div>

		<div class="btn-group" role="group" aria-label="">
			<button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
			<button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
		</div>
	</form>
</div>

<div class="col-md-7">
	
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Orden</th>
			<th>Nombre archivo</th>
			<th>Acciones</th>
		</tr>
	</thead>

	<?php

		$archivos = scandir("./repositorio");
		$num=0;

		for ($i=2; $i<count($archivos); $i++) {
			$num++;
	?>
		<tbody>
			<tr>
				<th scope="row"><?php echo $num;?></th>
				<td><?php echo $archivos[$i]; ?></td>
				<td>
					<form method="POST">

						<input type="hidden" name="txtNombre" id="txtNombre" value="<?php echo $archivos[$i]; ?>"/>
						<input type="submit" name="accion" value="Descargar" class="btn btn-primary"/>
						<input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
					</form>
				</td>
			</tr>
		</tbody>
	<?php }?>
</table>

</div>

<?php include("./template/footer.php"); ?>