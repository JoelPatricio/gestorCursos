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
    <h5 class="ml-lg-5 pl-lg-5 my-0 mr-md-auto font-weight-normal text-white">LOGO</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="px-2 text-white" href="cursos.php">Inicio</a>
      <!-- En duda -->
      <a class="px-2 text-white" href="#">Mis Materias</a>
      <!--  -->
      <a class="mr-lg-5 pr-lg-5 pl-4 text-light" href="login_profesor.html">Cerrar Sesión</a>
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

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-4">
    <div class="col mb-4">
        <div class="card shadow-lg">
            <div class="card-body text-center">
                <h2 class="h4 font-weight-light mb-1">Nombre materia</h2>
                    <p class="text-dark m-1 mb-3">26 estudiantes</p>
                    <a href="contenidoMateria.php" class="btn btn-outline-info btn-block">Ver curso</a>
            </div>
        </div>
    </div>

    <div class="col mb-4">
        <div class="card shadow-lg">
            <div class="card-body text-center">
                <h2 class="h4 font-weight-light mb-1">Nombre materia</h2>
        			<p class="text-dark m-1 mb-3">26 estudiantes</p>
        			<a href="#" class="btn btn-outline-info btn-block">Ver curso</a>
         	</div>
        </div>
    </div>


</div>



</body>

</html>