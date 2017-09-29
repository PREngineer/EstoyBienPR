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

      <?php

      // If the POST has information
      if(empty($_POST) === false)
      {
        // Establish which fields are required
        $required_fields = array('nombre', 'pueblo', 'zip', 'salud', 'propiedad', 'comida', 'agua', 'elec', 'comunicacion');

        // Check all the values provided in the post
        foreach($_POST as $key=>$value)
        {
          // If any of the required fields are not provided
          if( (empty($value) && in_array($key, $required_fields) === true) )
          {
            // Make an error that says it.
            $errors[] = 'Los campos con asteriscos (*) son necesarios.';
            break 1;
          }
        }

        // If the post is not empty and there are no errors
        if(empty($_POST) === false && empty($errors) === true)
        {
          // Save the nfpo data in array
          $data = array(
              'nombre'        => $_POST['nombre'],
              'pueblo'        => $_POST['pueblo'],
              'zip'           => $_POST['zip'],
              'salud'         => $_POST['salud'],
              'propiedad'     => $_POST['propiedad'],
              'comida'        => $_POST['comida'],
              'agua'          => $_POST['agua'],
              'elec'          => $_POST['elec'],
              'comunicacion'  => $_POST['comunicacion']
            );

          // Create the NFPO entry in DB
          //guardar($data);

          // Enable Success Message
          $success = true;
        }

        // If there are errors
        else if(empty($errors) === false)
        {
          echo '<div class="alert alert-danger alert-dismissible" role="alert">';
          // Display the errors
          echo $errors;
          echo '</div>';
        }

        // If the Registration went through
        if($success === true)
        {
          echo '<div class="alert alert-success alert-dismissible" role="alert">Información guardada.</div>';
        }
      }

      ?>

      
      <h1>Registrar persona</h1>

      <p>Por favor provea la siguiente información.</p>

      <form>
        <div class="form-group">
          <label for="nombre">Nombre: [*]</label>
          <input type="text" class="form-control" name="nombres">
        </div>
        <div class="form-group">
          <label for="edad">Edad:</label>
          <input type="text" class="form-control" name="edad">
        </div>
        <div class="form-group">
          <label for="pueblo">Pueblo: [*]</label>
          <input type="text" class="form-control" name="pueblo">
        </div>
        <div class="form-group">
          <label for="zip">Zip:</label>
          <input type="text" class="form-control" name="zip">
        </div>
        <div class="form-group">
          <label for="salud">Salud: [*]</label>
          <input type="text" class="form-control" name="salud">
        </div>
        <div class="form-group">
          <label for="propiedad">Propiedad: [*]</label>
          <input type="text" class="form-control" name="propiedad">
        </div>
        <div class="form-group">
          <label for="comida">Comida: [*]</label>
          <input type="text" class="form-control" name="comida">
        </div>
        <div class="form-group">
          <label for="agua">Agua: [*]</label>
          <input type="text" class="form-control" name="agua">
        </div>
        <div class="form-group">
          <label for="elec">Electricidad: [*]</label>
          <input type="text" class="form-control" name="elec">
        </div>
        <div class="form-group">
          <label for="comunicacion">Comunicación: [*]</label>
          <input type="text" class="form-control" name="comunicacion">
        </div>
        <div class="form-group">
          <label for="contacto">Contacto:</label>
          <input type="text" class="form-control" name="contacto">
        </div>
        <div class="form-group">
          <label for="otro">Otro:</label>
          <textarea type="text" class="form-control" rows="5" name="otro">Detalles</textarea>
        </div>
        <button type="submit" class="btn btn-default">Someter</button>
      </form>


    </div>

    <br><br>

<!-- ******************* Footer Section ******************* -->
    <div class="container">
      <div class="nav navbar-inverse">
        <p class="text-center text-muted">© 2017 Jorge Pabón Cruz - pianistapr@hotmail.com</p>
      </div>
    </div>

  </body>

</html>
