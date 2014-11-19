<?php
session_start();
    function verificar_login($user,$password,&$result) {
    include('dbcon.php');
    $hashedpassword = crypt($user, $password);
    $sql = "SELECT * FROM usuarios WHERE email = '$user' and password = '$hashedpassword'";
    $rec = mysqli_query($con, $sql);
    $count = 0;
    while($row = mysqli_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }
    if($count == 1)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}
if(!isset($_SESSION['usersicam']))
{
    if(isset($_POST['login']))
    {
        if(verificar_login($_POST['user'],$_POST['passwordinicio'],$result) == 1)
        {
            $_SESSION['usersicam'] = $result->id;
            header("location:principal.php");
        }
        else
        {
            
            echo "<script>$('.resultado').html('Usuario y/o contraseña incorrectos');</script>";
        }
    }
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gina's Coffee</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/animate.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="body-container">

            <div class="register-container">
                <div class="registro-logo-container">
                    <h1>Bienvenido a Gina's Coffee</h1>
                </div>
                <div id="tab-container" class="tab-container">
                  <ul class='etabs'>
                    <li class='tab'><a href="#tabs1-registro">Registrarse</a></li>
                    <li class='tab'><a href="#tabs1-iniciosesion">Iniciar Sesión</a></li>
                  </ul>
                  <div id="tabs1-registro">
                    <div class="bienvenido">
                        <h2>¡Registrate!</h2>
                    </div>
                        <div class="forma-registroinicio">
                            <form id="registro-usuario" action="" method="post">
                                <input required placeholder="Nombre(s)" type="text" name="nombres">
                                <input required placeholder="Apellidos" type="text" name="apellidos">
                                <input required placeholder="Email" type="text" name="email">
                                <input id="password" required placeholder="Contraseña" type="password" name="password">
                                <input id="password2" required placeholder="Confirmar Contraseña" type="password" name="passwordconfirmacion">
                                <div class="terminos-condiciones">
                                    <input required id="aceptocheck" class="acepto" type="checkbox"><span class="heleido">He leído y acepto los <span class="link-terminos"><a href="">Términos y Condiciones</a></span></span>
                                </div>                                <div class="resultado"></div>
                                <input id="botonderegistro" class="boton-registroinicio" disabled="disabled" name="registrarse" type="submit" value="Registrarse">
                            </form>
                        </div>
                  </div>
              <div id="tabs1-iniciosesion">
                <div class="bienvenido">
                    <h2>Inicio de Sesión</h2>
                </div>
                    <div class="forma-registroinicio">
                        <form id="iniciosesion-usuario" action="" method="post">
                            <input required placeholder="Email" type="text" <?php if(isset($_POST['submit']))  echo 'value="'.$_POST['email'].'"'; ?> name="user" >
                            <input required placeholder="Contraseña" type="password" name="passwordinicio">
                            <div class="resultado"></div>
                            <input class="boton-registroinicio" type="submit" name="login" value="Iniciar Sesión">
                            <a href="#"><div class="olvidaste-password">Olvidaste tu contraseña?</div></a>
                        </form>
                    </div>
              </div>
            </div>

            </div>
        </div>
<?php
} else {
    header("location:principal.php");
}
?>
        <script src="js/vendor/jquery-2.1.1.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script>$('#tab-container').easytabs();</script>
    </body>
</html>
