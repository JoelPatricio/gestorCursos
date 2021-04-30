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
    $result3=$conn->query("CALL contarAlumnos('$claveCurso')");
    foreach($result3 as $r3){
      $numeroAlumnos=$r3[0];
    }
    $result3->closeCursor(); 
  }
  if(isset($_GET['idAlumno'])){
    $idAlumno=$_GET['idAlumno'];
    $result1=$conn->query("CALL eliminarAlumno('$idAlumno')");
    header('Location: contenidoMateria.php?clave='.$claveCurso.'');
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
    <script src="https://kit.fontawesome.com/cfa31df702.js" crossorigin="anonymous"></script>
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
  <div class="container-lg">
    <!-- Titulo -->
    <div class="row justify-content-center align-items-center my-3">
      <h1 class="font-weight-light text-center mr-3"><?php echo $nombre; ?></h1>
    </div>
    <div class="row justify-content-center align-items-center my-3">
      <h3 class="font-weight-light text-center mr-3">Ver grafica de la materia
        <?php
          echo '<a href="graficaTodasUnidades.php?clave='.$claveCurso.'" class="btn btn-outline-primary">Ver</a>';
        ?>
      </h3>
    </div>
  </div>

  <div class="container mb-4">
    <div class="col-11 text-right">
    <?php
      echo '<a href="agregarAlumno.php?clave='.$claveCurso.'" class="btn btn-primary">Agregar Alumno</a>';
    ?>
    </div>
  </div>

  <div class="container">

    <div class="row justify-content-start">


      <div class="col-md-auto">
        <div class="card shadow">
          <div class="card-body">
            <h2 class="h4 mb-0 pb-2 text-dark border-bottom border-secondary">
              Alumnos <span class="badge badge-pill badge-secondary"><?php echo $numeroAlumnos;?></span>
              <?php
                echo '<a href="calificacionesFinales.php?clave='.$claveCurso.'" class="btn btn-outline-primary">Calificaciones Finales</a>';
              ?>
            </h2>
            <ul class="list-group list-group-flush">
            <?php
              $result2=$conn->query("CALL mostrarAlumnos('$claveCurso')");
              foreach($result2 as $r2){
                $nombreAlumno=$r2['nombre'];
                $idAlumnos=$r2['idalumnos'];
                echo '<li class="list-group-item py-2"><a href="contenidoMateria.php?clave='.$claveCurso.'&idAlumno='.$idAlumnos.'" class="badge badge-danger"><i class="fas fa-user-times" title="Eliminar alumno"></i></a>'.' '.$nombreAlumno.'</li>';
              }
              $result2->closeCursor();
            ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow">
          <div class="card-body">



            <?php
              $result3=$conn->query("CALL mostrarUnidades('$claveCurso')");
              $aux=1;
              foreach($result3 as $r3){
                $idUnidad=$r3['idunidades'];
                ?>
            <div class="card mb-4">
              <div class="card-header border-light font-weight-bolder">Unidad <?php echo $aux;?></div>
              <div class="card-body px-0 py-3">
                <div class="row">
                  <div class="col text-right">
                    <?php
                      echo '<a href="graficasPorUnidad.php?clave='.$claveCurso.'" class="btn btn-outline-primary">Ver graficas de la unidad</a>';
                    ?>
                  </div>
                  <div class="col text-center">
                    <?php
                      echo '<a href="alumnosUnidades.php?clave='.$claveCurso.'&idUnidad='.$idUnidad.'" class="btn btn-outline-primary">Ver alumnos</a>';
                    ?>
                  </div>
                </div>
              </div>
            </div>
                <?php
                $aux=$aux+1;
              }
              $result3->closeCursor();
            ?>

            

          </div>
        </div>


        

      </div>

    </div>
  </div>




<br><br><br>
    


</body>

</html>