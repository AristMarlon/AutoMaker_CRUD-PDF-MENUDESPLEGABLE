<!DOCTYPE html>
<html>
<head>
  <title>Datos Automovilisticos</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="script.js"></script>
</head>
<body>
  <!-- Barra de navegación -->
  <nav>
    <div class="dropdown">
      <button class="dropbtn">Menú</button>
      <div class="dropdown-content">
        
        <a href="leer.php" onclick="mostrarOpcion('Leer')">Leer</a>
        <a href="actualizar.php" onclick="mostrarOpcion('Actualizar')">Actualizar</a>
        <a href="borrar.php" onclick="mostrarOpcion('Borrar')">Borrar</a>
      </div>
    </div>
    <a href="aaa.php" class="logout-btn">Menu Principal</a>
  </nav>
<br>
<br>
<br>
<br>
<br>

	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
		}

		h1 {
			text-align: center;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}

		input[type="text"],
		input[type="number"] {
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			width: 100%;
			margin-bottom: 20px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			width: 100%;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body> 
	<form method="post" action="">
		<center><h1 style="color: green">Registre los Datos de los Vehiculos</h1></center>

		<center><label for="modelo">Modelo del Vehículo:</label></center>
		<input type="text" id="modelo" name="modelo" placeholder="Ingrese el modelo del Vehiculo" required>

		<center><label for="marca">Marca:</label></center>
		<input type="text" id="marca" name="marca" placeholder="Ingrese la marca del vehículo" required>

		<center><label for="idmotor">ID del Motor:</label></center>
		<input type="text" id="idmotor" name="idmotor" placeholder="Ingrese el ID del motor" required>

		<center><label for="color">Color:</label></center>
		<input type="text" id="color" name="color" placeholder="Ingrese el color del vehículo" required>

		<center><label for="num_asientos">Número de Asientos:</label></center>
		<input type="number" id="num_asientos" name="num_asientos" placeholder="Ingrese el número de asientos" required>

		<center><label for="placa">Placa:</label></center>
		<input type="text" id="placa" name="placa" placeholder="Ingrese la Placa" required>

		<input type="submit" value="Guardar" name="enviado">
	</form>

	<?php
	
	if (isset($_POST['enviado'])) {

		// Sanitize and validate the input values
		$modelo = filter_var($_POST["modelo"], FILTER_SANITIZE_STRING);
		$marca = filter_var($_POST["marca"], FILTER_SANITIZE_STRING);
		$idmotor = filter_var($_POST["idmotor"], FILTER_SANITIZE_STRING);
		$color = filter_var($_POST["color"], FILTER_SANITIZE_STRING);
		$num_asientos = filter_var($_POST["num_asientos"], FILTER_VALIDATE_INT);
		$placa = filter_var($_POST["placa"], FILTER_SANITIZE_STRING);

		
		if (!empty($modelo) && !empty($marca) && !empty($idmotor) && !empty($color) && !empty($num_asientos) && !empty($placa)) {

			
			$host = "localhost";
			$usuario = "root";
			$contraseña = "";
			$db = "vehiculos";

			try {
				$conexion = new PDO("mysql:host=$host;dbname=$db", $usuario, $contraseña);

				
				$sentenciaSQL = $conexion->prepare("INSERT INTO `registro` (`id`, `modelo`, `marca`, `id del motor`, `color`, `num de asientos`, `placa`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
				$sentenciaSQL->execute([$modelo, $marca, $idmotor, $color, $num_asientos, $placa]);

				
				$conexion = null;

				echo "<p style='color:green'>Sincronizando con la base de datos.</p>";

			} catch (PDOException $ex) {
				echo "<p style='color:red'>Error al conectar a la base de datos: " . $ex->getMessage() . "</p>";
			}

		} else {
			
			echo "<p style='color:red'>Por favor, ingrese todos los datos requeridos.</p>";
		}

	}
	?>
	
</body>
</html>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
}

h1 {
  color: #333;
  text-align: center;
  margin-top: 50px;
}

nav {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: black;
  padding: 10px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn {
  background-color: green;
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown-content {
  display: none;
  position: absolute;
  z-index: 1;
}

.dropdown-content a {
  color: green;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {
  display: block;
  background-color:black;
}

.logout-btn {
  background-color: #f44336;
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s ease-in-out;
}

.logout-btn:hover {
  background-color: #cc0000;
}

#error-message {
  color: red;
  text-align: center;