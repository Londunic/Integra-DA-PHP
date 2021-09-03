<?php 

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  

$failure = false;  


if ( isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        $failure = "Email and password are required";
    } 
    else {
        $pass = htmlentities($_POST['pass']);
        $email = htmlentities($_POST['who']);

        if((strpos($email, '@') === false)) {
            $failure = "Email must have an at-sign (@)";
        }
        else{
            $check = hash('md5', $salt.$_POST['pass']);
            if ( $check == $stored_hash ) {
                
                error_log("Login success".$_POST['who']);
                header("Location: autos.php?name=".urlencode($_POST['who']));
                return;
            } 
            else {
                error_log("Login fail".$pass."$check");
                $failure = "Incorrect password";
            }
        }
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

    <title>Edwar Jose Londoño Correa 5807fd4c</title>
</head>
<body>
    <div class="container">
        <h1>Log In</h1>
        <?php
        // Note triple not equals and think how badly double
        // not equals would work here...
        if ( $failure !== false ) {
            // Look closely at the use of single and double quotes
            echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
        }
        ?>
        <form method="POST">
            <label for="email">Email: </label>
            <input type="text" name="who" id="email"><br/>
            <label for="id_1723">Password: </label>
            <input type="text" name="pass" id="pass"><br/>
            <input type="submit" value="Log In">
        </form>
    </div>
</body>