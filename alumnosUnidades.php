<?php  
  require('config/php/conexion.php');
  session_start();

  if(!isset($_SESSION['matricula'])){
    header('Location: index.php');
    exit;
  }
  $matricula= $_SESSION['matricula'];
  if(isset($_GET['clave']) && isset($_GET['idUnidad']) && isset($_GET['numUnidad'])){
    $claveCurso=$_GET['clave'];
    $idUnidad=$_GET['idUnidad'];
    $numUnidad=$_GET['numUnidad'];
    $result1=$conn->query("CALL mostrarCurso('$claveCurso')");
    foreach($result1 as $r1){
      $nombre=$r1['nombre'];
      $unidades=$r1['unidades'];
      $examen=$r1['examen'];
      $tareas=$r1['tareas'];
      $asistencias=$r1['asistencias'];
    }
    $result1->closeCursor();
    $result3=$conn->query("CALL contarAlumnos('$claveCurso')");
    foreach($result3 as $r3){
      $numeroAlumnos=$r3[0];
    }
    $result3->closeCursor(); 
  }
  $result5=$conn->query("CALL obtenerRubrosEvaluacion('$claveCurso')");
  foreach($result5 as $r5){
    $rubroExamen=$r5['examen'];
    $rubroTareas=$r5['tareas'];
    $rubroAsistencias=$r5['asistencias'];
  }
  $result5->closeCursor(); 

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

<br><br>
    <!-- Titulo -->
    <div class="row justify-content-center align-items-center my-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <?php
          echo '<a href="contenidoMateria.php?clave='.$claveCurso.'">'.$nombre.'</a>';
        ?>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Unidad <?php echo $numUnidad; ?></li>
      </ol>
    </nav>
    </div>

    <div class="container mb-4">
      <div class="col-11 text-right">
      <?php
        echo '<a href="graficasPorUnidad.php?clave='.$claveCurso.'&idUnidad='.$idUnidad.'&numUnidad='.$numUnidad.'" class="btn btn-outline-primary">Ver grafica de la unidad</a>';
      ?>
      </div>
    </div>

    <div class="container">
    <?php
      if($numeroAlumnos==0){
        ?>
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title mb-4">No tienes alumnos agregados</h5>
            <?php
              echo '<a href="agregarAlumno.php?clave='.$claveCurso.'" class="btn btn-primary">Agregar Alumno</a>';
            ?>
          </div>
        </div>
    <?php
      }
      else{
        $result4=$conn->query("CALL mostrarAlumnosUnidad('$claveCurso','$idUnidad')");
        
        ?>
          <div class="row">
        <div class="col table-responsive">
    <table class="table table-bordered">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre del alumno</th>
      <th scope="col">Examen</th>
      <th scope="col">Tareas</th>
      <th scope="col">Asistencias</th>
      <th scope="col">Calificación final</th>
      <th scope="col">Modificar calificación</th>
    </tr>
  </thead>
  <tbody>
  <?php
      foreach($result4 as $r4){
        $idAlumnos=$r4['idalumnos'];
        $nombreEstudiante=$r4['nombre'];
        $calExamenes=$r4['calExamenes'];
        if($calExamenes==NULL)
          $calExamenes=0;
        $calTareas=$r4['calTareas'];
        if($calTareas==NULL)
          $calTareas=0;
        $calAsistencias=$r4['calAsistencias'];
        if($calAsistencias==NULL)
          $calAsistencias=0;
        $calFinal=(($calExamenes*$rubroExamen)+($calTareas*$rubroTareas)+($calAsistencias*$rubroAsistencias))/100;
        ?>
    <tr>
      <th scope="row"><?php echo $nombreEstudiante; ?></th>
      <td class="text-center"><?php echo $calExamenes; ?></td>
      <td class="text-center"><?php echo $calTareas; ?></td>
      <td class="text-center"><?php echo $calAsistencias; ?></td>
      <td class="text-center"><?php echo $calFinal; ?></td>
      <td class="text-center">
        <?php
          echo '<a href="modificarAlumno.php?clave='.$claveCurso.'&idAlumno='.$idAlumnos.'&idUnidad='.$idUnidad.'&numUnidad='.$numUnidad.'" class="btn btn-primary">Cambiar</a>';
        ?>
      </td>
    </tr>
        <?php
        }
        $result4->closeCursor();
  ?>
    
  </tbody>
</table>
            </div>
        </div>
        <?php
      }
    ?>
        
    </div>



</body>

</html>