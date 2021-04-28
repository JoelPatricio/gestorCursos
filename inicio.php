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
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>

  <!--login.js -->
  <script src="../config/js/login.js"></script>

  <title>Profesor</title>
</head>

<body class="bg-light">

  <!-- Barra de navegación -->
  <div class="d-flex flex-column flex-md-row align-items-center p-4 px-md-4 bg-dark border-bottom shadow">
    <h5 class="ml-lg-5 pl-lg-5 my-0 mr-md-auto font-weight-normal text-white">LOGO</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="px-2 text-white" href="inicio.php">Inicio</a>
      <!-- En duda -->
      <a class="px-2 text-white" href="clases.php">Mis Materias</a>
      <!--  -->
      <a class="mr-lg-5 pr-lg-5 pl-4 text-light" href="index.php">Cerrar Sesión</a>
    </nav>
  </div>


<br><br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="card col-8">
        <div class="card-body">
          <h5 class="card-title">BIENVENIDA</h5>
            <p class="card-text text-justify">Bienvenido a su sistema donde puede registrar las materias que imparte, a sus alumnos, calificaciones y la rubrica con la que evalua.
              <br><br>Con el objetivo de definir el rendimiento de sus alumnos conforme a su rúbrica. Se le indicara que opciones tiene para mejorar su rendimiento dependiendo de los resultados.
            </p>
          <div class="text-right">
          <a href="nuevaClase.php" class="btn btn-primary">Registrar materia</a>
        </div>
      </div>
    </div>
    </div>
    <div class="col col-lg-4">
      <img src="resurce\rs=w 400,cg true.webp" class="img-fluid" alt="...">
    </div>
  </div>
</div>




</body>

</html>