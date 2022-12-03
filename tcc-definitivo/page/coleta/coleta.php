<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/index.css">
    <title>Solicitar Coleta</title>
</head>

<body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark marrom">
                <a class="navbar-brand" href="#"><img src="../../image/logo.png" class="rounded-circle" width="60px" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="./coleta.php">Solicitar Coleta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./acompanha.php">Minhas Solicitações</a>
                        </li>
                    </ul>
                </div>
                <a href="../usuario/logout.php" class="btn btn-danger rounded-0">Sair</a>
            </nav>
        </header>
        <main>
            <div class="container w-75 p-2 mt-4 mb-4 shadow rounded bg-light rounded-0">
                <h1 class="text-center">Faça sua coleta aqui!</h1>
                <hr>
                <form action="cadastro.php" method="post">
                    <div class="form-group">
                        <label for="tresid">Resíduos</label>
                        <textarea class="form-control" name="tresid" id="tresid" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tender">Endereço</label>
                        <input type="text" class="form-control" name="tender" id="tender">
                    </div>
                    <button type="submit" class="btn btn-warning rounded-0">Enviar</button>
                </form>
            </div>
        </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>



    <?php
        session_start();

        if(!$_SESSION['u_id']) {
            header("location:../../index.php");
        } else{
            $usuario = $_SESSION['u_id'];
        }
    ?>
</body>

</html>