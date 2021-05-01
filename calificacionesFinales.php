<?php  
  require('config/php/conexion.php');
  session_start();

  if(!isset($_SESSION['matricula'])){
    header('Location: index.php');
    exit;
  }
  $matricula= $_SESSION['matricula'];
  if(isset($_GET['clave'])){
    $claveCurso=$_GET['clave'];
    $result1=$conn->query("CALL mostrarCurso('$claveCurso')");
    foreach($result1 as $r1){
      $nombre=$r1['nombre'];
      $unidades=$r1['unidades'];
      $examen=$r1['examen'];
      $tareas=$r1['tareas'];
      $asistencias=$r1['asistencias'];
    }
    $result1->closeCursor();
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

  <?php
    $auxArray;
    $result2=$conn->query("CALL mostrarAlumnos('$claveCurso')");
    foreach($result2 as $r2){
      $auxArray[$r2['idalumnos']]=$r2['nombre'];
    }
    $result2->closeCursor();
  ?>


    <!-- Titulo -->
   <div class="row justify-content-center align-items-center my-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <?php
          echo '<a href="contenidoMateria.php?clave='.$claveCurso.'">'.$nombre.'</a>';
        ?>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Calificaciones Finales</li>
      </ol>
    </nav>
    </div>

    <div class="container">
        
        <br><br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre del alumno</th>
      <th scope="col">Examen</th>
      <th scope="col">Tareas</th>
      <th scope="col">Asistencias</th>
      <th scope="col">Calificación final</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($auxArray as $auxArrayKey => $auxArrayContenido ){
      $nombreAlumnos=$auxArrayContenido;
      $idAlumno=$auxArrayKey;

        $result3=$conn->query("CALL mostrarCalificacionesFinales('$idAlumno')");
        $examenF=0;
        $tareasF=0;
        $asistenciasF=0;
        foreach($result3 as $r3){
            $examenU=$r3['calExamenes'];
            $tareasU=$r3['calTareas'];
            $asistenciasU=$r3['calAsistencias'];
            if($examenU==NULL)
              $examenU=0;
            if($tareasU==NULL)
              $tareasU=0;
            if($asistenciasU==NULL)
              $asistenciasU=0;
            $examenF=$examenF+$examenU;
            $tareasF=$tareasF+$tareasU;
            $asistenciasF=$asistenciasF+$asistenciasU;
          }
          $result3->closeCursor();
          $result4=$conn->query("CALL numeroUnidades('$claveCurso')");
          foreach($result4 as $r4){
            $numUnidades=$r4['unidades'];
          }
          $result4->closeCursor();
          $examenF=$examenF/$numUnidades;
          $tareasF=$tareasF/$numUnidades;
          $asistenciasF=$asistenciasF/$numUnidades;
          $calFinal=(($examenF*$rubroExamen)+($tareasF*$rubroTareas)+($asistenciasF*$rubroAsistencias))/100;        
      ?>
      <tr>
        <th scope="row"><?php echo $nombreAlumnos; ?></th>
        <td class="text-center"><?php echo $examenF; ?></td>
        <td class="text-center"><?php echo $tareasF; ?></td>
        <td class="text-center"><?php echo $asistenciasF; ?></td>
        <td class="text-center"><?php echo $calFinal; ?></td>
      </tr>
      <?php
    }
    //$result3->closeCursor();
  ?>

  </tbody>
</table>
            </div>
        </div>
    </div>



</body>

</html>