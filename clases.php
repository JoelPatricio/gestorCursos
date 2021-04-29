<?php  
  require('config/php/conexion.php');
  session_start();

  if(!isset($_SESSION['matricula'])){
    header('Location: index.php');
    exit;
  }
  $matricula= $_SESSION['matricula'];

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
            <h1 class="font-weight-light text-center mr-3">Mis Materias</h1>
        </div>




<br><br><br>
    
    <!-- Cursos -->


  <?php 
    $result1=$conn->query("CALL mostrarCursos('$matricula')");
    $result11=$result1;
    $res=$result11->fetch(PDO::FETCH_ASSOC);
     if(!isset($res['nombre'])){
      ?>

        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title mb-4">No tienes materias registradas</h5>
            <a href="nuevaClase.php" class="btn btn-primary mb-3">Crea tu primera Materia</a>
          </div>
        </div>

      <?php
      }
      
      else{
?>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-4">
<?php
    $result1->closeCursor();
    $result2=$conn->query("CALL mostrarCursos('$matricula')");
    foreach($result2 as $r1){
      $nombre=$r1['nombre'];
      $unidades=$r1['unidades'];
      $examen=$r1['examen'];
      $tareas=$r1['tareas'];
      $asistencias=$r1['asistencias'];


    ?>
    <div class="col mb-4">
        <div class="card shadow-lg">
            <div class="card-body text-center">
                <h2 class="h4 font-weight-light mb-1"><?php echo $nombre; ?></h2>
                <span class="badge badge-pill badge-info mb-2">Unidades: <?php echo $unidades; ?></span>
                <ul class="list-group">
                  <li class="list-group-item disabled" aria-disabled="true">
                    <h3 class="h5 font-weight-light">Evaluación</h3>
                    <span class="badge badge-light"><?php echo $examen; ?>% Examenes</span>
                    <span class="badge badge-light"><?php echo $tareas; ?>% Tareas</span>
                    <span class="badge badge-light"><?php echo $asistencias; ?>% Asistencias</span>
                  </li>
                </ul>

                <?php 
                  /*$result2=$conn->query("CALL alumnosRegistrados('$matricula')");
                  foreach($result2 as $r2){
                    print_r($r2);
                  }
                  */
                ?>
              <p class="text-dark m-1 mb-3">26 estudiantes</p>
              <a href="#" class="btn btn-primary">Ver curso</a>
              <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
            </div>
        </div>
    </div>



    <?php
      }
		}

		
    
  ?>

</div>



</body>

</html>