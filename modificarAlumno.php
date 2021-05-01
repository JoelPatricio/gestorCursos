<?php  
  require('config/php/conexion.php');
  session_start();

  if(!isset($_SESSION['matricula'])){
    header('Location: index.php');
    exit;
  }
  $matricula= $_SESSION['matricula'];
  if(isset($_GET['clave']) && isset($_GET['numUnidad'])){
    $claveCurso=$_GET['clave'];
    $idUnidad=$_GET['idUnidad'];
    $aux=$_GET['numUnidad'];
    $idAlumno=$_GET['idAlumno'];
  }

  if(!empty($_POST['examenes']) && !empty($_POST['tareas']) && !empty($_POST['asistencias'])){
    $examenes=$_POST['examenes'];
    $tareas=$_POST['tareas'];
    $asistencias=$_POST['asistencias'];
    $result1=$conn->query("CALL actualizarCalificacionUnidad('$idAlumno','$idUnidad','$examenes','$tareas','$asistencias')");
    header('Location: alumnosUnidades.php?clave='.$claveCurso.'&idUnidad='.$idUnidad.'&numUnidad='.$aux.'');
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
      <h2 class="font-weight-light text-center mr-3">Modificando calificación del alumno
      <br>
      <?php
        $result5=$conn->query("CALL mostrarNombreAlumno('$idAlumno')");
        foreach($result5 as $r5){
          $nombreAlumno=$r5['nombre'];
        }
        $result5->closeCursor(); 
      ?>
      <?php echo $nombreAlumno; ?>
      </h2>
    </div>
    <!-- Formulario -->
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-6">
        <form action="" class="card shadow px-3 py-4" method="POST">
          <!-- Nombre -->
            <div class="form-group col-5 align-self-center">
                <label for="nombre">Puntuación de Examenes</label>
                <input required type="number" class="form-control" name="examenes" id="examenes" min="0" max="10">
            </div>
            <div class="form-group col-5 align-self-center">
                <label for="nombre">Puntuación de Tareas</label>
                <input required type="number" class="form-control" name="tareas" id="tareas" min="0" max="10">
            </div>
            <div class="form-group col-5 align-self-center">
                <label for="nombre">Puntuación de Asistencias</label>
                <input required type="number" class="form-control" name="asistencias" id="asistencias" min="0" max="10">
            </div>



          <div class="text-right">
            <input type="submit" class="btn btn-primary" value="Aceptar">
            <?php
              echo '<a href="alumnosUnidades.php?clave='.$claveCurso.'&idUnidad='.$idUnidad.'&numUnidad='.$aux.'" class="btn btn-outline-secondary">Candelar</a>';
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>