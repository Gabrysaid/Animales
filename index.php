<?php include('conexion.php')
	$conexion = mysql_connect('localhost', 'root', '', 'personita') or die(mysql_error($mysqli));

	diferencia($conexion);

	function diferencia($conexion){
		if (isset($_POST['enviar'])) {
			insertar($conexion);
		}
		if (isset($_POST['eliminar'])) {
			eliminar($conexion);
		}
	}

	function insertar($conexion){
		$cedula = $_POST['cedula'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];

		$consulta = "INSERT INTO persona(cedula, nombre, apellidos)"
		VALUES ('$cedula', '$nombre', '$apellidos');
		mysqli_query($conexion, $consulta);
		mysqli_close($conexion);
	}

	function eliminar($conexion){
		$cedula = $_POST['cedula'];

		$consulta = "DELETE FROM persona WHERE cedula='$cedula'";
		mysqli_query($conexion, $consulta);
		mysqli_close($conexion);
		header("Location: index.php");
	}

	function cargarTabla($conexion){
		$query = "SELECT * FROM persona";
		$resultado = mysqli_query($conexion, $consulta);

		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
			echo "<td>".$fila['cedula'];
			echo "<td>".$fila['nombre'];
			echo "<td>".$fila['apellidos'];
			echo "<tr>";
		}
		mysqli_close($conexion);
	}
?>