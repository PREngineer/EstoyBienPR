<?php

?>


<!DOCTYPE html>
<html lang="en">

  <!-- ******************* Head Section ******************* -->
  <head>
    <!-- Application Name -->
    <title>Estoy Bien! PR</title>

    <!-- Encoding and Mobile First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Importing jQuery and other dependencies -->
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </head>

  <body>

    <!-- ******************* NavBar Section ******************* -->
    <div class="container">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle (hamburger) get grouped for better mobile display -->
          <div class="navbar-header">
            <!-- Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Brand icon -->
            <a class="navbar-brand" href="index.php">
              <img src="logo.png" width="30" height="30" alt="Logo">
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="buscar.php" style="cursor: pointer;">Buscar</a>
              </li>
              <li>
                <a href="registrar.php" style="cursor: pointer;">Registrar</a>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>


    <!-- ******************* Actual Content Section ******************* -->
    <div class="container" id="Content" name="Content">


      <h1>Registrar persona</h1>

      <p>Por favor provea la siguiente información.</p>

      <form>
        <div class="form-group">
          <label for="nombres">Nombre:</label>
          <input required="required" type="text" class="form-control" id="nombres">
        </div>
        <div class="form-group">
          <label for="edad">Edad:</label>
          <input type="text" class="form-control" id="edad">
        </div>
        <div class="form-group">
          <label for="pueblo">Pueblo:</label>
          <input required="required" type="text" class="form-control" id="pueblo">
        </div>
        <div class="form-group">
          <label for="zip">Zip:</label>
          <input type="text" class="form-control" id="zip">
        </div>
        <div class="form-group">
          <label for="salud">Salud:</label>
          <input required="required" type="text" class="form-control" id="salud">
        </div>
        <div class="form-group">
          <label for="propiedad">Propiedad:</label>
          <input required="required" type="text" class="form-control" id="propiedad">
        </div>
        <div class="form-group">
          <label for="comida">Comida:</label>
          <input required="required" type="text" class="form-control" id="comida">
        </div>
        <div class="form-group">
          <label for="agua">Agua:</label>
          <input required="required" type="text" class="form-control" id="agua">
        </div>
        <div class="form-group">
          <label for="elec">Electricidad:</label>
          <input required="required" type="text" class="form-control" id="elec">
        </div>
        <div class="form-group">
          <label for="comunicacion">Comunicación:</label>
          <input required="required" type="text" class="form-control" id="comunicacion">
        </div>
        <div class="form-group">
          <label for="contacto">Contacto:</label>
          <input type="text" class="form-control" id="contacto">
        </div>
        <div class="form-group">
          <label for="otro">Otro:</label>
          <textarea type="text" class="form-control" rows="3" id="otro">Detalles</textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>



    </div>

<!-- ******************* Footer Section ******************* -->
    <div class="container">
      <div class="nav navbar-inverse">
        <p class="text-center text-muted">© 2017 Jorge Pabón Cruz - pianistapr@hotmail.com</p>
      </div>
    </div>

  </body>

</html>
