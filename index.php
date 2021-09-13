<?php
    session_start(); 
    
    require("ldap.php"); 
    
    if ( isset($_POST['usuario']) &&  isset($_POST['clave']) ) {
        $usr = $_POST["usuario"]; 
        $usuario = mailboxpowerloginrd($usr,$_POST["clave"]); 
        if($usuario == "0" || $usuario == ''){ 
            $_SERVER = array(); 
            $_SESSION = array(); 
            $_SESSION["errors"] = "Usuario o clave incorrecta"; 
        }else{ 
            $_SESSION["user"] = $usuario; 
            $_SESSION["autentica"] = "SIP"; 
            header("Location: app.php"); 
        } 
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="starter-template.css" rel="stylesheet">

        <title>Edwar Jose Londoño Correa</title>
    </head>

    <body>
        <div class="container">
            <h1>Bienvenido</h1>
            <p>Por favor, ingrese los siguientes datos para poder ingresar al sistema</p>
            <div style="color: red;"> 
                <?php 
                    if(isset($_SESSION["errors"])){
                        echo $_SESSION["errors"];
                        unset($_SESSION["errors"]);
                    }
                ?>    
            </div>

            <form method="POST">
                <label for="usuario">Usuario </label>
                <input type="text" name="usuario" id="usuario"/><br/>
                <label for="clave">Contraseña</label>
                <input type="password" name="clave" id="clave"/><br/>
                <input type="submit" value="Ingresar">
            </form>



        </div>
    </body>
</html> 