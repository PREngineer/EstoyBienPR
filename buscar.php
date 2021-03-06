<?php

function display_all()
{
  //MySQL Connection Parameters
  $error_message = 'Sorry, DB connection error.  Please refresh the page.';
  mysql_connect('localhost', 'root', 'CagateEnTuMadre12!@') or die($error_message);

  //Name of the Database to connect to
  mysql_select_db(OKPR);

  // Set the Charset
  mysql_query("SET NAMES 'utf8'");

  // The query
  $query = mysql_query("SELECT *
                        FROM `personas`
                        ORDER BY `pueblo` ASC, `nombre`");

  // Returns all
  return $query;
}

function search($buscar, $valor)
{
  //MySQL Connection Parameters
  $error_message = 'Sorry, DB connection error.  Please refresh the page.';
  mysql_connect('localhost', 'root', 'CagateEnTuMadre12!@') or die($error_message);

  //Name of the Database to connect to
  mysql_select_db(OKPR);

  // Set the Charset
  mysql_query("SET NAMES 'utf8'");

  // Get the information from DB
  $query = mysql_query("SELECT *
            FROM `personas`
            WHERE `" . $buscar . "` LIKE '%" . $valor . "%'
            ORDER BY `pueblo` ASC, `nombre`");

  // Return it
  return $query;
}

function count_all()
{
  //MySQL Connection Parameters
  $error_message = 'Sorry, DB connection error.  Please refresh the page.';
  mysql_connect('localhost', 'root', 'CagateEnTuMadre12!@') or die($error_message);

  //Name of the Database to connect to
  mysql_select_db(OKPR);

  // Set the Charset
  mysql_query("SET NAMES 'utf8'");

  // The query
  $query = mysql_query("SELECT COUNT(`nombre`) FROM `personas`");

  // Returns the number (row #0 since it will only be one result in the query)
  return mysql_result($query, 0);
}

function search_count($buscar, $valor)
{
  //MySQL Connection Parameters
  $error_message = 'Sorry, DB connection error.  Please refresh the page.';
  mysql_connect('localhost', 'root', 'CagateEnTuMadre12!@') or die($error_message);

  //Name of the Database to connect to
  mysql_select_db(OKPR);

  // Set the Charset
  mysql_query("SET NAMES 'utf8'");

  // The query
  $query = mysql_query("SELECT COUNT(`nombre`) FROM `personas` WHERE `" . $buscar . "` LIKE '%" . $valor . "%'");

  // Returns the number
  return mysql_result($query, 0);
}

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


      <h1>Buscar Persona</h1>

      <!-- Drop down menu for sorting -->
      Buscar por:
      <form method="POST">
        <select name="buscar" size="1">
            <option value="TODO"    <?php if($_POST['buscar'] == 'TODO')     { echo ' selected = "selected"';} ?>>TODO</option>
            <option value="nombre"  <?php if($_POST['buscar'] == 'nombre')   { echo ' selected = "selected"';} ?>>Nombre</option>
            <option value="edad"    <?php if($_POST['buscar'] == 'edad')     { echo ' selected = "selected"';} ?>>Edad</option>
            <option value="pueblo"  <?php if($_POST['buscar'] == 'pueblo')   { echo ' selected = "selected"';} ?>>Pueblo</option>
            <option value="zip"     <?php if($_POST['buscar'] == 'zip')      { echo ' selected = "selected"';} ?>>Zip Code</option>
        </select>
        <!-- Search box -->
        <input type="text" name="valor" placeholder="Buscar..." value="<?php print_r($_POST['valor']); ?>">
        <!-- GO! button -->
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>

      <?php

            // If page was just loaded (nothing was posted)
            if( empty($_POST) === true || $_POST['buscar'] == "TODO" )
            { // Display by name
              $result = display_all();
              $num    = count_all();
            }
            // If page has posted
            else
            {
              // And a Search string was passed
              if(empty($_POST['valor']) === false)
              {
                // Display the results of the search
                $result = search($_POST['buscar'], $_POST['valor']);
                $num    = search_count($_POST['buscar'], $_POST['valor']);
              }
              else
              {
                echo '
      <div class="alert alert-danger alert-dismissible" role="alert">
      Debe especificar lo que busca.
      </div>';
              }
            }
      ?>

      <div class="table-responsive">

        <!-- Default panel contents -->
        <div class="panel-heading">
        <?php echo $num;?> resultado(s), ordenados por pueblo y luego por nombre.
        </div>

        <!-- Table -->
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Récord</th>
              <th>Nombre</th>
              <th>Edad</th>
              <th>Pueblo</th>
              <th>Zip</th>
              <th>Salud</th>
              <th>Propiedad</th>
              <th>Comida</th>
              <th>Agua</th>
              <th>Electricidad</th>
              <th>Comunicación</th>
              <th>Contacto</th>
              <th>Otro</th>
              <th>Informado</th>
            </tr>
          </thead>

      <?php
            $i = 0;
            // Go over every result and display on the table.
            while ($i < $num)
            {
              // Get everything for the Campaign
              $nombre       = mysql_result($result, $i, "nombre");
              $edad         = mysql_result($result, $i, "edad");
              $pueblo       = mysql_result($result, $i, "pueblo");
              $zip          = mysql_result($result, $i, "zip");
              $salud        = mysql_result($result, $i, "salud");
              $propiedad    = mysql_result($result, $i, "propiedad");
              $comida       = mysql_result($result, $i, "comida");
              $agua         = mysql_result($result, $i, "agua");
              $electricidad = mysql_result($result, $i, "elec");
              $comunicacion = mysql_result($result, $i, "comunicacion");
              $contacto     = mysql_result($result, $i, "contacto");
              $otro         = mysql_result($result, $i, "otro");
              $timestamp    = mysql_result($result, $i, "timestamp");

      ?>
            <tr>
              <td><?php echo ($i+1);?></td>
              <td><?php echo $nombre;?></td>
              <td><?php echo $edad;?></td>
              <td><?php echo $pueblo;?></td>
              <td><?php echo $zip;?></td>
              <td><?php echo $salud;?></td>
              <td><?php echo $propiedad;?></td>
              <td><?php echo $comida;?></td>
              <td><?php echo $agua;?></td>
              <td><?php echo $electricidad;?></td>
              <td><?php echo $comunicacion;?></td>
              <td><?php echo $contacto;?></td>
              <td><?php echo $otro;?></td>
              <td><?php echo $timestamp;?></td>
            </tr>
      <?php
              $i++;
            }

      ?>

        </table>
      </div>
    </div>

<!-- ******************* Footer Section ******************* -->
    <div class="container">
      <div class="nav navbar-inverse">
        <p class="text-center text-muted">2017 Jorge Pabón Cruz - pianistapr@hotmail.com</p>
      </div>
    </div>

  </body>

</html>
