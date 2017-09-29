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
  $query = "SELECT *
            FROM `personas`
            WHERE `" . $buscar . "` LIKE '%" . $valor . "%'
            ORDER BY `pueblo` ASC, `nombre`";

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
        <input type="text" placeholder="Buscar..." name="valor" value="<?php print_r($_POST['valor']); ?>">
        <!-- GO! button -->
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>

      <?php

            // If page was just loaded (nothing was posted)
            if( empty($_POST) === true || $_POST['buscar'] == "TODO" )
            { // Display by name
              $result = display_all();
              $num    = count_all();

              print_r($result);
            }
            // If page has posted
            else
            {
              // And a Search string was passed
              if(empty($_POST['valor']) === false)
              {
                // Display the results of the search
                $string = mysql_real_escape_string($_POST['valor']);
                $result = search($_POST['buscar'], $string);
                $num    = search_count($_POST['buscar'], $string);
                print_r($result);
              }
              else
              {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                      Debe especificar lo que busca.
                      </div>';
              }
            }

            echo '
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">' . $num . ' resultado(s)</div>
              <div class="panel-body">
                <p>Los resultados estan ordenados por pueblo y luego por nombre.</p>
              </div>

              <!-- Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th>Número de Récord</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Pueblo</th>
                    <th>Zip Code</th>
                    <th>Salud</th>
                    <th>Propiedad</th>
                    <th>Comida</th>
                    <th>Agua</th>
                    <th>Electricidad</th>
                    <th>Comunicación</th>
                    <th>Contacto</th>
                    <th>Otro</th>
                    <th>Fecha de Informe</th>
                </tr>
                </thead>';

            $i = 0;
            // Go over every result and display on the table.
            while( $row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC) )
            {
              echo '
              <tr>
                <td>' . ($i+1) .'</td>
                <td>' . $row["nombre"] .'</td>
                <td>' . $row["edad"].'</td>
                <td>' . $row["pueblo"] .'</td>
                <td>' . $row["zip"] .'</td>
                <td>' . $row["salud"] .'</td>
                <td>' . $row["propiedad"] .'</td>
                <td>' . $row["comida"] .'</td>
                <td>' . $row["agua"] .'</td>
                <td>' . $row["elec"] .'</td>
                <td>' . $row["comunicacion"] .'</td>
                <td>' . $row["contacto"] .'</td>
                <td>' . $row["otro"] .'</td>
                <td>' . $row["timestamp"] .'</td>
              </tr>';

              $i++;
            }

          ?>

        </table>
      </div>

    </div>

<!-- ******************* Footer Section ******************* -->
    <div class="container">
      <div class="nav navbar-inverse">
        <p class="text-center text-muted">© 2017 Jorge Pabón Cruz - pianistapr@hotmail.com</p>
      </div>
    </div>

  </body>

</html>
