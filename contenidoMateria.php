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
      <h1 class="font-weight-light text-center mr-3">Materia 1</h1>
    </div>
    <div class="row justify-content-center align-items-center my-3">
      <h3 class="font-weight-light text-center mr-3">Ver grafica de la materia
        <button type="button" class="btn btn-outline-primary btn">Ver</button><br>
      </h3>
    </div>
  </div>

  <div class="container mb-4">
    <div class="col-11 text-right">
      <button type="button" class="btn btn-outline-primary">Agregar Alumno</button>
    </div>
  </div>

  <div class="container">

    <div class="row justify-content-start">


      <div class="col-md-auto">
        <div class="card shadow">
          <div class="card-body">
            <h2 class="h4 mb-0 pb-2 text-dark border-bottom border-secondary">
              Alumnos <span class="badge badge-pill badge-secondary">14</span>
              <button type="button" class="btn btn-outline-primary">Calificaciones Finales</button>
            </h2>
            <ul class="list-group list-group-flush">
              <li class="list-group-item py-2">JAVIER NUÑEZ ALBEROLA <a href="#" class="badge badge-danger">Eliminar</a></li>
              <li class="list-group-item py-2">JOSE MANUEL CANTERO HERNANDEZ <a href="#" class="badge badge-danger">Eliminar</a></li>
              <li class="list-group-item py-2">GONZALO AUGUSTO ESPINOSA <a href="#" class="badge badge-danger">Eliminar</a></li>
              <li class="list-group-item py-2">JAVIER HURTADO ANDUJAR <a href="#" class="badge badge-danger">Eliminar</a></li>
              <li class="list-group-item py-2">JUAN MANUEL TORRICO PARREÑO <a href="#" class="badge badge-danger">Eliminar</a></li>
              <li class="list-group-item py-2">GABRIEL BORREGUERO BELLES <a href="#" class="badge badge-danger">Eliminar</a></li>
              <li class="list-group-item py-2">VICTORIA MELO PIÑA <a href="#" class="badge badge-danger">Eliminar</a></li>
              <li class="list-group-item py-2">SARA VIEIRA GALIANA <a href="#" class="badge badge-danger">Eliminar</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card shadow">
          <div class="card-body">

            <div class="card mb-4">
              <div class="card-header border-light font-weight-bolder">Unidad 1</div>
              <div class="card-body px-0 py-3">
                <div class="row">
                  <div class="col text-right">
                    <button type="button" class="btn btn-outline-primary">Ver graficas de la unidad</button>
                  </div>
                  <div class="col text-center">
                    <button type="button" class="btn btn-outline-primary">Ver alumnos</button>
                  </div>
                </div>
              </div>
            </div>


            <div class="card mb-4">
              <div class="card-header border-light font-weight-bolder">Unidad 2</div>
              <div class="card-body px-0 py-2">
                <div class="row">
                  <div class="col text-right">
                    <button type="button" class="btn btn-outline-primary">Ver graficas de la unidad</button>
                  </div>
                  <div class="col text-center">
                    <button type="button" class="btn btn-outline-primary">Ver alumnos</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-4">
              <div class="card-header border-light font-weight-bolder">Unidad 3</div>
              <div class="card-body px-0 py-2">
                <div class="row">
                  <div class="col text-right">
                    <button type="button" class="btn btn-outline-primary">Ver graficas de la unidad</button>
                  </div>
                  <div class="col text-center">
                    <button type="button" class="btn btn-outline-primary">Ver alumnos</button>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>


        

      </div>

    </div>
  </div>




<br><br><br>
    


</body>

</html>