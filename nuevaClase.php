<?php
  header("Content-Type: text/html;charset=utf-8");
  require('config/php/conexion.php');
  session_start();

  if(!isset($_SESSION['matricula'])){
    header('Location: index.php');
    exit;
  }
$matricula=$_SESSION['matricula'];
if(!empty($_POST['nombreMateria']) && !empty($_POST['unidades']) && !empty($_POST['examenes']) && !empty($_POST['tareas']) && !empty($_POST['asistencias'])){
  $nombreMateria=$_POST['nombreMateria'];
  $unidades=$_POST['unidades'];
  $examenes=$_POST['examenes'];
  $tareas=$_POST['tareas'];
  $asistencias=$_POST['asistencias'];

  
  if($result1=$conn->query("CALL nuevaMateria('$nombreMateria','$unidades','$examenes','$tareas','$asistencias','$matricula')")){
		header('Location: clases.php');
  }

}





?>
<!DOCTYPE html>
<html lang="es_MX">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- Custom styles -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
  <title>Cursos</title>
</head>

<body>
  <!-- Barra de navegación -->
  <div class="d-flex flex-column flex-md-row align-items-center p-4 px-md-4 bg-dark border-bottom shadow">
    <h5 class="ml-lg-5 pl-lg-5 my-0 mr-md-auto font-weight-normal text-white"><div class="col col-lg-2">
      <img src="resurce\rs=w 400,cg true.webp" class="img-fluid" alt="...">
    </div></h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="px-2 text-white" href="inicio.php">Inicio</a>
      <!-- En duda -->
      <a class="px-2 text-white" href="clases.php">Mis Materias</a>
      <!--  -->
      <a class="mr-lg-5 pr-lg-5 pl-4 text-light" href="config\php\logout.php">Cerrar Sesión</a>
    </nav>
  </div>

  <!-- Contenido -->
  <div class="container-md">
    <!-- Título -->
    <div class="row justify-content-center align-items-center my-3">
      <h1 class="font-weight-light text-center mr-3">Registrar Materia</h1>
    </div>
    <!-- Formulario -->
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-6">
        <form class="card shadow px-3 py-4" method="POST">
          <!-- Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre de la materia</label>
                <input required type="text" class="form-control" name="nombreMateria" id="nombreMateria">
            </div>
          <!-- Periodo -->
            <div class="align-self-center col-5">
                <label for="tentacles">Unidades</label>
                <input class="form-group text-center" type="number" id="unidades" name="unidades" min="1" max="5" required>
            </div>
          <!-- Rubricas -->
            <div class="row justify-content-center align-items-center my-3">
                <h3 class="font-weight-light text-center mr-3">Rubricas de evaluación</h3>
            </div>
            <div class="col-4 align-self-center">
                <label for="nombre">Examenes</label>
                <input required type="number" class="form-group text-center" name="examenes" id="examenes" min="0" max="100">
            </div>
            <div class=" col-4 align-self-center">
                <label for="nombre">Tareas</label>
                <input required type="number" class="form-group text-center" name="tareas" id="tareas" min="0" max="100">
            </div>
            <div class="col-4 align-self-center">
                <label for="nombre">Asistencias</label>
                <input required type="number" class="form-group text-center" name="asistencias" id="asistencias" min="0" max="100">
            </div>

          <div class="text-right">
            <input type="submit" class="btn btn-primary" value="Aceptar">
            <a href="inicio.php" class="btn btn-outline-secondary">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>