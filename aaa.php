<?php
session_start();

// Array de páginas protegidas
$protectedPages = ["registrar.php", "leer.php", "actualizar.php", "borrar.php"];

// Obtener el nombre de la página actual
$currentPage = basename($_SERVER["PHP_SELF"]);

// Verificar si el usuario tiene acceso a la página actual
if (in_array($currentPage, $protectedPages) && $_SESSION["userRole"] !== "admin") {
  header("Location: login.php");
  exit();
}

// Cerrar sesión
if (isset($_GET["logout"])) {
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit();
}
?>

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
      <button class="dropbtn">Usuarios</button>
      <div class="dropdown-content">
        <a href="db.php" onclick="mostrarOpcion('Nuevo Usuario')">Nuevo Usuario</a>
        <a href="actualizardb.php" onclick="mostrarOpcion('Actualizar Usuario')">Actuallizar Usuario</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Menú</button>
      <div class="dropdown-content">
        <a href="registrar.php" onclick="mostrarOpcion('Registrar')">Registrar</a>
        <a href="leer.php" onclick="mostrarOpcion('Leer')">Leer</a>
        <a href="actualizardb.php" onclick="mostrarOpcion('Actualizar')">Actualizar</a>
        <a href="borrar.php" onclick="mostrarOpcion('Borrar')">Borrar</a>
      </div>
    </div>
    <a href="login.php" class="logout-btn">Cerrar sesión</a>
  </nav>

  <br>
  <br>
  <br>

  <center><h1 style="color: green">Bienvenido</h1></center>

    <?php
    // Establecer el título y el contenido de la página
    $tituloPagina = "Actualizar";
    $contenidoPagina = "contenido-actualizar.php";
    ?>

    <!DOCTYPE html>
    <html>
    <head>
      <title>Actualizar - Datos Automovilisticos</title>
      <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
      <!-- Contenido de la página -->
      <center><p style="color: green">Seleccione desde el menú.</p></center>
    </body>
    </html>
  </div>
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
  color:green;
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
}
</style>