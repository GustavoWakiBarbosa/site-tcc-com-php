<?php
session_start();
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

    <!-- Section: Design Block -->
    <section class="text-center text-lg-start">
        <style>
            .cascading-right {
                margin-right: -50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
                }
            }
        </style>

        <!-- Jumbotron -->
        <div class="container py-4">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5 texto">CRIE SUA CONTA</h2>

                            <?php
                                if(isset($_SESSION['status_cadastro'])):
                            ?>
                            <div class="">
                                <p>Cadastro efetuado!</p>
                                <p>Faça login informando o seu usuário e senha <a style="color: #da9841;"
                                        href="login.php">aqui</a></p>
                            </div>
                            <?php
                                endif;
                                unset($_SESSION['status_cadastro']);
                            ?>
                            <?php
                                if(isset($_SESSION['usuario_existe'])):
                            ?>
                            <div class="">
                                <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
                            </div>
                            <?php
                                endif;
                                unset($_SESSION['usuario_existe']);
                            ?>
                            <form action="PHP-LOGIN/cadastrar.php" method="POST">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <!-- User input -->
                                        <div class="form-outline">
                                            <input type="text" name="usuario" id="form3Example1" class="form-control"
                                                required autofocus autocomplete="off" />
                                            <label class="form-label" for="form3Example1">Usuário</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <!-- Name input -->
                                        <div class="form-outline">
                                            <input type="text" name="nome" id="form3Example2" class="form-control"
                                                required autocomplete="off" />
                                            <label class="form-label" for="form3Example2">Nome Completo</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="form3Example3" class="form-control" required
                                        autocomplete="off" />
                                    <label class="form-label" for="form3Example3">Endereço de email</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="senha" id="form3Example4" class="form-control" required
                                        autocomplete="off" />
                                    <label class="form-label" for="form3Example4">Senha</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4 btn-warning">
                                    Criar
                                </button>
                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Já possuí uma conta?<a style="color: #da9841;" href="login.php"> Entre </a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="assets/Imagem Registrar.png" class="w-100 rounded-4 shadow-4" alt="" />
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->








    <script src="index.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>