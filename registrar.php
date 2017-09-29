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
              <li>
                <a href="buscar.php" style="cursor: pointer;">Buscar</a>
              </li>
              <li class="active">
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
      if(empty($_GET) === false)
      {
        // Establish which fields are required
        $required_fields = array('nombre', 'pueblo', 'zip', 'salud', 'propiedad', 'comida', 'agua', 'elec', 'comunicacion');

        // Check all the values provided in the post
        foreach($_GET as $key=>$value)
        {
          // If any of the required fields are not provided
          if( (empty($value) && in_array($key, $required_fields) === true) )
          {
            // Make an error that says it.
            $errors = 'Los campos con asteriscos (*) son necesarios.';
            break 1;
          }
        }

        // If the post is not empty and there are no errors
        if(empty($_GET) === false && empty($errors) === true)
        {
          // Create the entry in DB

          //MySQL Connection Parameters
          $error_message = 'Sorry, DB connection error.  Please refresh the page.';
          mysql_connect('localhost', 'root', 'CagateEnTuMadre12!@') or die($error_message);

          //Name of the Database to connect to
          mysql_select_db(OKPR);

          // Set the Charset
          mysql_query("SET NAMES 'utf8'");

          $nombre       = $POST['nombre'];
          $edad         = $POST['edad'];
          $pueblo       = $POST['pueblo'];
          $zip          = $POST['zip'];
          $salud        = $POST['salud'];
          $propiedad    = $POST['propiedad'];
          $comida       = $POST['comida'];
          $agua         = $POST['agua'];
          $elec         = $POST['elec'];
          $comunicacion = $POST['comunicacion'];
          $contacto     = $POST['contacto'];
          $otro         = $POST['otro'];

    			// Actual MySQL Query that Updates the information
    			mysql_query("INSERT INTO `personas`
                        (`nombre`, `edad`, `pueblo`, `zip`, `salud`, `propiedad`, `comida`,
                        `agua`, `elec`, `comunicacion`, `contacto`, `otro`)
                        VALUES ('$nombre', '$edad', '$pueblo', '$zip', '$salud', '$propiedad', '$comida',
                        '$agua', '$elec', '$comunicacion', '$contacto', '$otro')");

          echo "INSERT INTO `personas`
                        (`nombre`, `edad`, `pueblo`, `zip`, `salud`, `propiedad`, `comida`,
                        `agua`, `elec`, `comunicacion`, `contacto`, `otro`)
                        VALUES ('$nombre', '$edad', '$pueblo', '$zip', '$salud', '$propiedad', '$comida',
                        '$agua', '$elec', '$comunicacion', '$contacto', '$otro')";

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
          <label for="nombre">Nombre: *</label>
          <input type="text" class="form-control" name="nombre" placeholder="Nombre Segundo Apellido Apellido" value="<?php print_r($_GET['nombre']); ?>">
        </div>

        <div class="form-group">
          <label for="edad">Edad:</label>
          <input type="text" class="form-control" name="edad" placeholder="18" value="<?php print_r($_GET['edad']); ?>">
        </div>

        <div class="form-group">
          <label for="pueblo">Pueblo: *</label><br>
          <select name="pueblo" size="1">
            <option value=""              <?php if($_GET['pueblo'] == '')              { echo ' selected = "selected"';} ?> >Escoja</option>
            <option value="Adjuntas"      <?php if($_GET['pueblo'] == 'Adjuntas')      { echo ' selected = "selected"';} ?> >Adjuntas</option>
            <option value="Aguada"        <?php if($_GET['pueblo'] == 'Aguada')        { echo ' selected = "selected"';} ?> >Aguada</option>
            <option value="Aguadilla"     <?php if($_GET['pueblo'] == 'Aguadilla')     { echo ' selected = "selected"';} ?> >Aguadilla</option>
            <option value="Aguas Buenas"  <?php if($_GET['pueblo'] == 'Aguas Buenas')  { echo ' selected = "selected"';} ?> >Aguas Buenas</option>
            <option value="Aibonito"      <?php if($_GET['pueblo'] == 'Aibonito')      { echo ' selected = "selected"';} ?> >Aibonito</option>
            <option value="Añasco"        <?php if($_GET['pueblo'] == 'Añasco')        { echo ' selected = "selected"';} ?> >Añasco</option>
            <option value="Arecibo"       <?php if($_GET['pueblo'] == 'Arecibo')       { echo ' selected = "selected"';} ?> >Arecibo</option>
            <option value="Arroyo"        <?php if($_GET['pueblo'] == 'Arroyo')        { echo ' selected = "selected"';} ?> >Arroyo</option>
            <option value="Barceloneta"   <?php if($_GET['pueblo'] == 'Barceloneta')   { echo ' selected = "selected"';} ?> >Barceloneta</option>
            <option value="Barranquitas"  <?php if($_GET['pueblo'] == 'Barranquitas')  { echo ' selected = "selected"';} ?> >Barranquitas</option>
            <option value="Bayamón"       <?php if($_GET['pueblo'] == 'Bayamón')       { echo ' selected = "selected"';} ?> >Bayamón</option>
            <option value="Cabo Rojo"     <?php if($_GET['pueblo'] == 'Cabo Rojo')     { echo ' selected = "selected"';} ?> >Cabo Rojo</option>
            <option value="Caguas"        <?php if($_GET['pueblo'] == 'Caguas')        { echo ' selected = "selected"';} ?> >Caguas</option>
            <option value="Camuy"         <?php if($_GET['pueblo'] == 'Camuy')         { echo ' selected = "selected"';} ?> >Camuy</option>
            <option value="Canóvanas"     <?php if($_GET['pueblo'] == 'Canóvanas')     { echo ' selected = "selected"';} ?> >Canóvanas</option>
            <option value="Carolina"      <?php if($_GET['pueblo'] == 'Carolina')      { echo ' selected = "selected"';} ?> >Carolina</option>
            <option value="Cataño"        <?php if($_GET['pueblo'] == 'Cataño')        { echo ' selected = "selected"';} ?> >Cataño</option>
            <option value="Cayey"         <?php if($_GET['pueblo'] == 'Cayey')         { echo ' selected = "selected"';} ?> >Cayey</option>
            <option value="Ceiba"         <?php if($_GET['pueblo'] == 'Ceiba')         { echo ' selected = "selected"';} ?> >Ceiba</option>
            <option value="Ciales"        <?php if($_GET['pueblo'] == 'Ciales')        { echo ' selected = "selected"';} ?> >Ciales</option>
            <option value="Cidra"         <?php if($_GET['pueblo'] == 'Cidra')         { echo ' selected = "selected"';} ?> >Cidra</option>
            <option value="Coamo"         <?php if($_GET['pueblo'] == 'Coamo')         { echo ' selected = "selected"';} ?> >Coamo</option>
            <option value="Comerío"       <?php if($_GET['pueblo'] == 'Comerío')       { echo ' selected = "selected"';} ?> >Comerío</option>
            <option value="Corozal"       <?php if($_GET['pueblo'] == 'Corozal')       { echo ' selected = "selected"';} ?> >Corozal</option>
            <option value="Culebra"       <?php if($_GET['pueblo'] == 'Culebra')       { echo ' selected = "selected"';} ?> >Culebra</option>
            <option value="Dorado"        <?php if($_GET['pueblo'] == 'Dorado')        { echo ' selected = "selected"';} ?> >Dorado</option>
            <option value="Fajardo"       <?php if($_GET['pueblo'] == 'Fajardo')       { echo ' selected = "selected"';} ?> >Fajardo</option>
            <option value="Florida"       <?php if($_GET['pueblo'] == 'Florida')       { echo ' selected = "selected"';} ?> >Florida</option>
            <option value="Guánica"       <?php if($_GET['pueblo'] == 'Guánica')       { echo ' selected = "selected"';} ?> >Guánica</option>
            <option value="Guayama"       <?php if($_GET['pueblo'] == 'Guayama')       { echo ' selected = "selected"';} ?> >Guayama</option>
            <option value="Guayanilla"    <?php if($_GET['pueblo'] == 'Guayanilla')    { echo ' selected = "selected"';} ?> >Guayanilla</option>
            <option value="Guaynabo"      <?php if($_GET['pueblo'] == 'Guaynabo')      { echo ' selected = "selected"';} ?> >Guaynabo</option>
            <option value="Gurabo"        <?php if($_GET['pueblo'] == 'Gurabo')        { echo ' selected = "selected"';} ?> >Gurabo</option>
            <option value="Hatillo"       <?php if($_GET['pueblo'] == 'Hatillo')       { echo ' selected = "selected"';} ?> >Hatillo</option>
            <option value="Hormigueros"   <?php if($_GET['pueblo'] == 'Hormigueros')   { echo ' selected = "selected"';} ?> >Hormigueros</option>
            <option value="Humacao"       <?php if($_GET['pueblo'] == 'Humacao')       { echo ' selected = "selected"';} ?> >Humacao</option>
            <option value="Isabela"       <?php if($_GET['pueblo'] == 'Isabela')       { echo ' selected = "selected"';} ?> >Isabela</option>
            <option value="Jayuya"        <?php if($_GET['pueblo'] == 'Jayuya')        { echo ' selected = "selected"';} ?> >Jayuya</option>
            <option value="Juana Díaz"    <?php if($_GET['pueblo'] == 'Juana Díaz')    { echo ' selected = "selected"';} ?> >Juana Díaz</option>
            <option value="Juncos"        <?php if($_GET['pueblo'] == 'Juncos')        { echo ' selected = "selected"';} ?> >Juncos</option>
            <option value="Lajas"         <?php if($_GET['pueblo'] == 'Lajas')         { echo ' selected = "selected"';} ?> >Lajas</option>
            <option value="Lares"         <?php if($_GET['pueblo'] == 'Lares')         { echo ' selected = "selected"';} ?> >Lares</option>
            <option value="Las Marías"    <?php if($_GET['pueblo'] == 'Las Marías')    { echo ' selected = "selected"';} ?> >Las Marías</option>
            <option value="Las Piedras"   <?php if($_GET['pueblo'] == 'Las Piedras')   { echo ' selected = "selected"';} ?> >Las Piedras</option>
            <option value="Loíza"         <?php if($_GET['pueblo'] == 'Loíza')         { echo ' selected = "selected"';} ?> >Loíza</option>
            <option value="Luquillo"      <?php if($_GET['pueblo'] == 'Luquillo')      { echo ' selected = "selected"';} ?> >Luquillo</option>
            <option value="Manatí"        <?php if($_GET['pueblo'] == 'Manatí')        { echo ' selected = "selected"';} ?> >Manatí</option>
            <option value="Maricao"       <?php if($_GET['pueblo'] == 'Maricao')       { echo ' selected = "selected"';} ?> >Maricao</option>
            <option value="Maunabo"       <?php if($_GET['pueblo'] == 'Maunabo')       { echo ' selected = "selected"';} ?> >Maunabo</option>
            <option value="Mayagüez"      <?php if($_GET['pueblo'] == 'Mayagüez')      { echo ' selected = "selected"';} ?> >Mayagüez</option>
            <option value="Moca"          <?php if($_GET['pueblo'] == 'Moca')          { echo ' selected = "selected"';} ?> >Moca</option>
            <option value="Morovis"       <?php if($_GET['pueblo'] == 'Morovis')       { echo ' selected = "selected"';} ?> >Morovis</option>
            <option value="Naguabo"       <?php if($_GET['pueblo'] == 'Naguabo')       { echo ' selected = "selected"';} ?> >Naguabo</option>
            <option value="Naranjito"     <?php if($_GET['pueblo'] == 'Naranjito')     { echo ' selected = "selected"';} ?> >Naranjito</option>
            <option value="Orocovis"      <?php if($_GET['pueblo'] == 'Orocovis')      { echo ' selected = "selected"';} ?> >Orocovis</option>
            <option value="Patillas"      <?php if($_GET['pueblo'] == 'Patillas')      { echo ' selected = "selected"';} ?> >Patillas</option>
            <option value="Peñuelas"      <?php if($_GET['pueblo'] == 'Peñuelas')      { echo ' selected = "selected"';} ?> >Peñuelas</option>
            <option value="Ponce"         <?php if($_GET['pueblo'] == 'Ponce')         { echo ' selected = "selected"';} ?> >Ponce</option>
            <option value="Quebradillas"  <?php if($_GET['pueblo'] == 'Quebradillas')  { echo ' selected = "selected"';} ?> >Quebradillas</option>
            <option value="Rincón"        <?php if($_GET['pueblo'] == 'Rincón')        { echo ' selected = "selected"';} ?> >Rincón</option>
            <option value="Río Grande"    <?php if($_GET['pueblo'] == 'Río Grande')    { echo ' selected = "selected"';} ?> >Río Grande</option>
            <option value="Sabana Grande" <?php if($_GET['pueblo'] == 'Sabana Grande') { echo ' selected = "selected"';} ?> >Sabana Grande</option>
            <option value="Salinas"       <?php if($_GET['pueblo'] == 'Salinas')       { echo ' selected = "selected"';} ?> >Salinas</option>
            <option value="San Germán"    <?php if($_GET['pueblo'] == 'San Germán')    { echo ' selected = "selected"';} ?> >San Germán</option>
            <option value="San Juan"      <?php if($_GET['pueblo'] == 'San Juan')      { echo ' selected = "selected"';} ?> >San Juan</option>
            <option value="San Lorenzo"   <?php if($_GET['pueblo'] == 'San Lorenzo')   { echo ' selected = "selected"';} ?> >San Lorenzo</option>
            <option value="San Sebastián" <?php if($_GET['pueblo'] == 'San Sebastián') { echo ' selected = "selected"';} ?> >San Sebastián</option>
            <option value="Santa Isabel"  <?php if($_GET['pueblo'] == 'Santa Isabel')  { echo ' selected = "selected"';} ?> >Santa Isabel</option>
            <option value="Toa Alta"      <?php if($_GET['pueblo'] == 'Toa Alta')      { echo ' selected = "selected"';} ?> >Toa Alta</option>
            <option value="Toa Baja"      <?php if($_GET['pueblo'] == 'Toa Baja')      { echo ' selected = "selected"';} ?> >Toa Baja</option>
            <option value="Trujillo Alto" <?php if($_GET['pueblo'] == 'Trujillo Alto') { echo ' selected = "selected"';} ?> >Trujillo Alto</option>
            <option value="Utuado"        <?php if($_GET['pueblo'] == 'Utuado')        { echo ' selected = "selected"';} ?> >Utuado</option>
            <option value="Vega Alta"     <?php if($_GET['pueblo'] == 'Vega Alta')     { echo ' selected = "selected"';} ?> >Vega Alta</option>
            <option value="Vega Baja"     <?php if($_GET['pueblo'] == 'Vega Baja')     { echo ' selected = "selected"';} ?> >Vega Baja</option>
            <option value="Vieques"       <?php if($_GET['pueblo'] == 'Vieques')       { echo ' selected = "selected"';} ?> >Vieques</option>
            <option value="Villalba"      <?php if($_GET['pueblo'] == 'Villalba')      { echo ' selected = "selected"';} ?> >Villalba</option>
            <option value="Yabucoa"       <?php if($_GET['pueblo'] == 'Yabucoa')       { echo ' selected = "selected"';} ?> >Yabucoa</option>
            <option value="Yauco"         <?php if($_GET['pueblo'] == 'Yauco')         { echo ' selected = "selected"';} ?> >Yauco</option>
          </select>
        </div>

        <div class="form-group">
          <label for="zip">Zip: *</label>
          <input type="text" class="form-control" name="zip" placeholder="00000" value="<?php print_r($_GET['zip']); ?>">
        </div>

        <div class="form-group">
          <label for="salud">Salud: *</label><br>
          <select name="salud" size="1">
            <option value=""              <?php if($_GET['salud'] == '')               { echo ' selected = "selected"';} ?> >Escoja</option>
            <option value="Bien"          <?php if($_GET['salud'] == 'Bien')           { echo ' selected = "selected"';} ?> >Bien</option>
            <option value="Enfermo"       <?php if($_GET['salud'] == 'Enfermo')        { echo ' selected = "selected"';} ?> >Enfermo</option>
            <option value="Herido"        <?php if($_GET['salud'] == 'Herido')         { echo ' selected = "selected"';} ?> >Herido</option>
            <option value="Hospitalizado" <?php if($_GET['salud'] == 'Hospitalizado')  { echo ' selected = "selected"';} ?> >Hospitalizado</option>
            <option value="Fallecido"     <?php if($_GET['salud'] == 'Fallecido')      { echo ' selected = "selected"';} ?> >Fallecido</option>
          </select>
        </div>

        <div class="form-group">
          <label for="propiedad">Propiedad: *</label><br>
          <select name="propiedad" size="1">
            <option value=""              <?php if($_GET['propiedad'] == '')               { echo ' selected = "selected"';} ?> >Escoja</option>
            <option value="Bien"          <?php if($_GET['propiedad'] == 'Bien')           { echo ' selected = "selected"';} ?> >Bien</option>
            <option value="Danos Menores" <?php if($_GET['propiedad'] == 'Daños Menores')  { echo ' selected = "selected"';} ?> >Daños Menores</option>
            <option value="Danos Mayores" <?php if($_GET['propiedad'] == 'Daños Mayores')  { echo ' selected = "selected"';} ?> >Daños Mayores</option>
            <option value="Perdida Total" <?php if($_GET['propiedad'] == 'Pérdida Total')  { echo ' selected = "selected"';} ?> >Pérdida Total</option>
          </select>
        </div>

        <div class="form-group">
          <label for="comida">Comida: *</label><br>
          <select name="comida" size="1">
            <option value=""              <?php if($_GET['comida'] == '')            { echo ' selected = "selected"';} ?> >Escoja</option>
            <option value="Nada"          <?php if($_GET['comida'] == 'Nada')        { echo ' selected = "selected"';} ?> >Nada</option>
            <option value="Poca"          <?php if($_GET['comida'] == 'Poca')        { echo ' selected = "selected"';} ?> >Poca</option>
            <option value="Suficiente"    <?php if($_GET['comida'] == 'Suficiente')  { echo ' selected = "selected"';} ?> >Suficiente</option>
            <option value="Mucha"         <?php if($_GET['comida'] == 'Mucha')       { echo ' selected = "selected"';} ?> >Mucha</option>
          </select>
        </div>

        <div class="form-group">
          <label for="agua">Agua: *</label><br>
          <select name="agua" size="1">
            <option value=""              <?php if($_GET['agua'] == '')            { echo ' selected = "selected"';} ?> >Escoja</option>
            <option value="Nada"          <?php if($_GET['agua'] == 'Nada')        { echo ' selected = "selected"';} ?> >Nada</option>
            <option value="Poca"          <?php if($_GET['agua'] == 'Poca')        { echo ' selected = "selected"';} ?> >Poca</option>
            <option value="Suficiente"    <?php if($_GET['agua'] == 'Suficiente')  { echo ' selected = "selected"';} ?> >Suficiente</option>
            <option value="Mucha"         <?php if($_GET['agua'] == 'Mucha')       { echo ' selected = "selected"';} ?> >Mucha</option>
          </select>
        </div>

        <div class="form-group">
          <label for="elec">Electricidad: *</label><br>
          <select name="elec" size="1">
            <option value=""              <?php if($_GET[''] == '')            { echo ' selected = "selected"';} ?> >Escoja</option>
            <option value="Si"            <?php if($_GET['elec'] == 'Si')      { echo ' selected = "selected"';} ?> >Sí</option>
            <option value="No"            <?php if($_GET['elec'] == 'No')      { echo ' selected = "selected"';} ?> >No</option>
          </select>
        </div>

        <div class="form-group">
          <label for="comunicacion">Comunicación Celular: *</label><br>
          <select name="comunicacion" size="1">
            <option value=""              <?php if($_GET[''] == '')                        { echo ' selected = "selected"';} ?> >Escoja</option>
            <option value="Si"            <?php if($_GET['comunicacion'] == 'Si')          { echo ' selected = "selected"';} ?> >Sí</option>
            <option value="No"            <?php if($_GET['comunicacion'] == 'No')          { echo ' selected = "selected"';} ?> >No</option>
            <option value="Va Y Viene"    <?php if($_GET['comunicacion'] == 'Va Y Viene')  { echo ' selected = "selected"';} ?> >Va Y Viene</option>
          </select>
        </div>

        <div class="form-group">
          <label for="contacto">Contacto:</label>
          <input type="text" class="form-control" name="contacto" placeholder="nombre@email.com o 000-000-0000" value="<?php print_r($_GET['contacto']); ?>">
        </div>

        <div class="form-group">
          <label for="otro">Otro:</label>
          <textarea class="form-control" name="otro" rows="5" placeholder="Aquí puede poner otra información que quiera que sus familiares sepan, como donde encontrarlo, etc."><?php print_r($_GET['otro']); ?></textarea>
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
