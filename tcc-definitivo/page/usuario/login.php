<?php
    include('../../conn.php');

    $cell = $_POST['tcell'];
    $senha = $_POST['tsenha'];
    $sql = mysqli_query($conn, "SELECT u_id, u_cell, u_senha, u_adm FROM usuario WHERE u_cell LIKE '$cell' AND u_senha LIKE '$senha'");
    $linha = mysqli_num_rows($sql);

    if($linha == 1) {
        session_start();
        
        $registro = mysqli_fetch_assoc($sql);
        $_SESSION['u_id'] = $registro["u_id"];

        if($registro['u_adm'] == 'S') {
            header('location:../coleta/admin.php');
        } else {
            header('location:../coleta/coleta.php');
        }
    } else {

?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <link rel="stylesheet" href="../../style/index.css">
            <title>Document</title>
            <style>
                body {
                    height: 100vh;
                }

                .box {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
            </style>
        </head>
        <body>
            <div class="box bg-light text-dark p-3 text-center">
                <p class="mb-0">Usuário não encontrado! <a class="btn ml-3 btn-danger rounded-0" href="../../index.php">Volte e tente novamente!</a></p>
            </div>
        </body>
        </html>
<?php    
    }
?>