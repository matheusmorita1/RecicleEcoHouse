<?php
    session_start();

    if (isset($_SESSION['u_id'])) {
        header("location:./page/coleta/acompanha.php");        
    } 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/index.css">
    <link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Recycle Eco House</title>
</head>
<body>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <header>
        <nav class="navbar justify-content-around navbar-expand-lg navbar-dark marrom sticky-top">
            <a class="navbar-brand" href="#"><img src="image/logo.png" class="rounded-circle" width="60px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#logisrevers">LogisRevers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jogo">Jogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#entrar">Entre</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="bg-dark text-light p-2 text-center">
            <h2>Seja Bem vindo ao <abbr title="Recycle Eco House">Recycle</abbr>!</h2>
        </div>
        <div id="sobre" class="container w-75 p-3 mt-4 mb-4 bg-light text-dark rounded-0 shadow-lg text-center">
            <h2>O que fazemos?</h2>
            <hr>
            <p>Fazemos com que você possa ajudar o meio ambiente, e nem precisa sair de casa! Você cadastra seus resíduos e te ligaremos para combinar a data que poderemos estar fazendo a coleta, simples assim! Nós usamos esse resíduos para reutilização, criando vários brinquedos, hortas decoradas, decorações para praças, etc.</p>
        </div>
        <div id="logisrevers" class="container w-75 p-3 mt-4 mb-4 bg-light text-dark text-center rounded-0 shadow-lg">
            <h2>Você sabe o que é logistica reversa?</h2>
            <hr>
            <p>A logística reversa é um conjunto de procedimento para recolher e dar encaminhamento aos resíduos que contém a derivação de reutilizavél ou reciclável assim evitando o descarte inapropriado desses recursos, tornando assim um meio de preservação do meio ambiente e gerando lucros e valores para tais.</p>
            <img src="./image/logisticareversa.png" id="img1" alt="Logística Reversa" class="w-100">
        </div>

        <div class=" w-100 mt-4 mb-4 bg-light text-dark text-center rounded-0 shadow-lg" id="img2">
            <img src="./image/logisticareversa.png" alt="Logística Reversa" class="w-100">
        </div>

        <div id="jogo" class="container w-75 p-3 mt-4 mb-4 bg-dark text-light text-center rounded-0 shadow-lg">
            <h2>Você Joga?</h2>
            <hr>
            <p>E tem mais! Se você gosta de jogos de pensamento rápido, nosso time está desenvolvendo um pequeno jogo para você se divertir. Você poderá jogar em breve!</p>
        </div>

        <div id="entrar" class="container w-75 p-3 mt-4 mb-4 marrom text-light text-center rounded-0 shadow-lg">
            <h2>Entre e faça o mundo melhor!</h2>
            <form action="./page/usuario/login.php" method="post">
                <div class="form-group">
                    <label for="tcell">Celular</label>
                    <input type="tel" class="form-control" name="tcell" id="tcell">
                </div>
                <div class="form-group">
                    <label for="tsenha">Senha</label>
                    <input type="password" class="form-control" name="tsenha" id="tsenha">
                </div>
                <button type="submit" class="btn btn-primary rounded-0">Logar</button>
                <button type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#modalRegistro" data-whatever="@mdo">Registrar</button>
            </form>
            <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog text-dark bg-light rounded" role="document">
                    <div class="modal-content formu">
                        <div class="modal-header marrom text-light">
                            <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./page/usuario/cadastro.php" method="post">
                                <div class="form-group">
                                    <label for="tnome" class="col-form-label">Nome:</label>
                                    <input type="text" class="form-control" name="tnome" id="tnome">
                                </div>
                                <div class="form-group">
                                    <label for="tcell" class="col-form-label">Celular:</label>
                                    <input type="tel" class="form-control" name="tcell" id="tcell">
                                </div>
                                <div class="form-group">
                                    <label for="tender" class="col-form-label">Endereço:</label>
                                    <input type="text" class="form-control" name="tender" id="tender">
                                </div>
                                <div class="form-group">
                                    <label for="tsenha" class="col-form-label">Senha:</label>
                                    <input type="password" class="form-control" name="tsenha" id="tsenha">
                                </div>
                                <div class="modal-footer verde text-light">
                                    <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Fechar</button>
                                    <input type="submit" class="btn btn-primary rounded-0" value="Enviar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
        <!-- Footer -->
    <footer class="page-footer font-small text-light bg-dark pt-4 d-flex align-middle">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

        <!-- Grid column -->
        <div class="col-md-5 mt-md-0 mt-3">

        <!-- Content -->
        <h3 class="text-uppercase verdet">Entre em contato conosco</h3>
        <p>Entre em contato com a gente caso tenha algum problema ou dúvida! Te atenderemos assim que possível.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase verdet">Redes Sociais</h5>

        <ul class="list-unstyled">
            <li>
                <img src=".\image\giphy.gif" style="width: 48px" alt="">
                <a href="#!"><img src=".\image\icons8-facebook-novo-48.png" alt=""></a>
            </li>
            <li>
                <img src=".\image\giphy.gif" style="width: 48px" alt="">
                <a href="#!"><img src=".\image\icons8-instagram-48.png" alt=""></a>
            </li>
            <li>
                <img src=".\image\giphy.gif" style="width: 48px" alt="">
                <a href="#!"><img src=".\image\icons8-twitter-48.png" alt=""></a>
            </li>
            <li>
                <img src=".\image\giphy.gif" style="width: 48px" alt="">
                <a href="#!"><img src=".\image\icons8-whatsapp-48.png" alt=""></a>
            </li>
        </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 mb-md-0 mb-3 text-center">

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Links -->
        <h5 class="text-uppercase verdet">Outros</h5>

        <ul class="list-unstyled">
            <li>
                <span class="material-symbols-outlined">
                    call
                </span> 3252-4354
            </li>
            <li>
                <span class="material-symbols-outlined">
                    call
                </span> 3252-6798
            </li>
            <li>
                <span class="material-symbols-outlined">
                    mail
                </span> rehtaqua@gmail.com
            </li>
        </ul>

        </div>
        <!-- Grid column -->

    </div>
    <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    </footer>
    <!-- Footer -->
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>
</html>