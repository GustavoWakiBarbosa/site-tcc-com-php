<?php
session_start();
if(isset($_SESSION['nome'])){
    header('Location: index.php');
   }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Etecap Devs</title>
    <!-- MDB icon -->
    <link rel="icon" href="assets/logo sem nome.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <form action="PHP-LOGIN/loginTCC.php" method="POST">
        <div class="d-flex justify-content-center align-items-center teste">
            <div class="login">
                <h1 class="texto">ENTRE COM SUA CONTA</h1>
                <?php 
                    if(isset($_SESSION['nao_autenticado'])):
                        ?>
                <div name="errorBox" class="alert alert-warning erro">
                    <p style="color: #da9841; text-align: center;"><strong>ERRO: Usuário ou senha inválidos.</strong>
                    </p>
                </div>
                <?php 
                    
                        endif;
                        unset($_SESSION['nao_autenticado']);
                    ?>
                <!-- User input -->
                <div class="form-outline mb-4">
                    <input type="name" name="usuario" class="form-control" autocomplete="off" />
                    <label class="form-label" for="form2Example1">Usuário</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="senha" class="form-control " autocomplete="off" />
                    <label class="form-label" for="form2Example2">Senha</label>
                </div>



                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4 btn-warning">Entrar</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Não possuí uma conta?<a style="color: #da9841;" href="registrar.php"> Registre-se</a></p>
                </div>
            </div>
        </div>
    </form>








    <script src="index.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>