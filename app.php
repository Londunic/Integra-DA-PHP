<?php include("seguridad.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="starter-template.css" rel="stylesheet">

        <title>Acceso correcto</title>
    </head>
    <body>
        <div class="container">
            <h1> Bienvenido al Sistema</h1>
            <br>
            <p><?php echo $_SESSION["user"]; ?>, su usuario y clave fueron correctos </p>
            <br>
            <p>Esto es una pagina web en la que se prueba hacer Log In con los usuarios
                del directorio activo </p>
            <br>
            <a href="salir.php">Salir</a>
        </div>
    </body>
    </html>