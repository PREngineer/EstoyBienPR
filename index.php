<!DOCTYPE html>
<html lang="en">

  <!-- ******************* Head Section ******************* -->
  <head>
    <!-- Application Name -->
    <title>Event Manager</title>

    <!-- Encoding and Mobile First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Importing jQuery and other dependencies -->
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>
  </head>

  <body>

    <!-- ******************* NavBar Handler Section ******************* -->
    <script>
    $(document).ready(function(){
        $("a").click(function(){
          var url = $(this).attr("link");
          //window.alert(url.substr(url.lastIndexOf('/') + 1));
          $("#Content").load(url);
        });
    });
    </script>

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
                <a link="buscar.php" style="cursor: pointer;">Buscar</a>
              </li>
              <li>
                <a link="registrar.php" style="cursor: pointer;">Registrar</a>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>

    <!-- ******************* Actual Content Section ******************* -->
    <div class="container" id="Content" name="Content">
      <h1>Bienvenido a Estoy Bien PR!</h1>

      <p>El propósito de esta página es poder ayudar a los puertorriqueños (dentro y fuera de la isla) a identificar el estatus de sus familiares y amigos en Puerto Rico.</p>
    </div>

    <!-- ******************* Footer Section ******************* -->
    <div class="container">
      <div class="nav navbar-inverse">
        <p class="text-center text-muted">© 2017 Jorge Pabón Cruz - pianistapr@hotmail.com</p>
      </div>
    </div>

  </body>

</html>
