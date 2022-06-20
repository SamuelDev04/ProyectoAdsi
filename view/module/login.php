<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#">
        <link rel="shortcut icon" href="view/img/Logo2.png" type="image/x-icon">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <link rel="stylesheet" href="view/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="view/css/login.css">
        <link rel="stylesheet" href="view/css/sweetalert2.min.css">        
        
        <link rel="stylesheet" type="text/css" href="view/plugins/fuentes/iconic/css/material-design-iconic-font.min.css">
        
    </head>
    
    <body>
     
      <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" action="" method="post">
                <span class="login-form-title">LOGIN</span>
                
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <input type="submit" class="input100 login-form-btn" id="btnEnv" name="btnEnv" >
                        <!--<button type="submit" name="submit" class="login-form-btn">ENTRAR</button>-->
                    </div>
                </div>
            </form>
            <?php
                if(isset($_POST['usuario'])){
                    $user = $_POST['usuario'];
                    $pass = $_POST['password'];

                    try {
                        $objController = new UsuarioController();
                        $objController -> getEvalClave($user,$pass);

                    } catch (Exception $e) {
                        
                    }
                }
            ?>
        </div>
    </div>     
               
     <script src="view/js/jquery-3.6.0.min.js"></script>    
     <script src="view/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
     <script src="view/js/sweetalert2.all.min.js"></script>
     <script src="view/js/TweenMax.min.js"></script>
     <script src="view/js/login.js"></script>    
    </body>
</html>