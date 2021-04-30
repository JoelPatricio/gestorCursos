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
  <div class="container-lg">
    <!-- Titulo -->
    <div class="row justify-content-center align-items-center my-3">
      <h1 class="font-weight-light text-center mr-3">Materia 1</h1>
    </div><br>


 <!-- Contenido -->
  <div class="container-xl">
      <!-- Lista de alumnos -->
      <div class="col col-md">
        <div class="card shadow">
          <div class="card-body">
            <h2 class="h4 mb-0 pb-2 text-dark border-bottom border-secondary">
              Gráfica general de todas las unidades
            </h2>
            <ul class="list-group list-group-flush">
              <li class="list-group-item py-2">
                Las puntuaciones obtenidas en las coevaluaciones se evaluaron de la siguiente manera
                <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/chart.min.js"></script>
                <canvas class="my-4 chartjs-render-monitor" id="myChart"width="332" height="129"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Evaluaciones', 'Tareas', 'Asistencias'],
        datasets: [{
            label: '% de alumnos',
            data: [20, 30, 50],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
              </li>
            </ul>
          </div>
        </div>
      </div>




</body>

</html>