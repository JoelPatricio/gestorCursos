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

<body class="container bg-light">
  <div class="row justify-content-center mt-5">
    <div class="col-12 col-md-6 col-lg-6 col-xl-4">
      <h1 class="text-primary text-center h2 mb-3">Inicia sesión</h1>
      <div class="card shadow mb-3 bg-white">
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="Correo">ID de trabajador</label>
              <input type="email" class="form-control" name="Correo" id="Correo">
            </div>
            <div class="form-group">
              <label for="Contraseña">Contraseña</label>
              <input type="password" class="form-control" name="Contraseña" id="Contraseña" autocomplete="on">
            </div>
            <button class="btn btn-primary btn-block" id="loginStartProf">Iniciar sesión</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>