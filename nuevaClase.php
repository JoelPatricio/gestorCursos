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
  <div class="container-md">
    <!-- Título -->
    <div class="row justify-content-center align-items-center my-3">
      <h1 class="font-weight-light text-center mr-3">Registrar Materia</h1>
    </div>
    <!-- Formulario -->
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-6">
        <form action="" class="card shadow px-3 py-4" method="POST">
          <!-- Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre de la materia</label>
                <input required type="text" class="form-control" name="nombre" id="nombre">
            </div>
          <!-- Periodo -->
            <div class="form-group align-self-center col-5">
                <label for="tentacles">Unidades</label>
                <input class="form-group" type="number" id="tentacles" name="tentacles" min="1" max="5">
            </div>
          <!-- Rubricas -->
            <div class="row justify-content-center align-items-center my-3">
                <h3 class="font-weight-light text-center mr-3">Rubricas de evaluación</h3>
            </div>
            <div class="form-group col-4 align-self-center">
                <label for="nombre">Examenes</label>
                <input required type="number" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="form-group col-4 align-self-center">
                <label for="nombre">Tareas</label>
                <input required type="number" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="form-group col-4 align-self-center">
                <label for="nombre">Asistencias</label>
                <input required type="number" class="form-control" name="nombre" id="nombre">
            </div>



          <div class="text-right">
            <input type="submit" class="btn btn-info" value="Aceptar">
            <a href="cursos.php" class="btn btn-outline-secondary">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>