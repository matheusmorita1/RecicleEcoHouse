<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/index.css">
    <title>Minhas Coletas</title>
</head>

<body>
        <header id="cabecalho">
            <nav class="navbar navbar-expand-lg navbar-dark marrom">
                <a class="navbar-brand" href="#"><img src="../../image/logo.png" class="rounded-circle" width="60px" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./coleta.php">Solicitar Coleta</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="./acompanha.php">Minhas Solicitações</a>
                        </li>
                    </ul>
                </div>
                <a href="../usuario/logout.php" class="btn btn-danger rounded-0">Sair</a>
            </nav>
        </header>
        <main>
        <a href="#cabecalho"><button id="volta" class="btn btn-primary rounded-circle sticky-top mt-3 ml-4" style="width: 50px; height: 50px;">&uarr;</button></a>
            <section class="container mt-4 mb-4 rounded-0">
                <table class="table table-responsive table-bordered">
                    <thead class="text-center marrom text-light">
                        <tr>
                            <th class="align-middle col-4" scope="col">Resíduos</th>
                            <th class="align-middle col-2" scope="col">Endereço</th>
                            <th class="align-middle" scope="col">Situação</th>
                            <th class="align-middle" scope="col">Data Prevista</th>
                            <th class="align-middle" scope="col">Opção</th>
                        </tr>
                    </thead>
                    <tbody class="cinza">
                        <?php
                            session_start();
                            if(!$_SESSION['u_id']) {
                                header("location:../../index.php");
                            }
                            else{
                                $usuario = $_SESSION['u_id'];
                            }
                            include('../../conn.php');
                            $sql = "SELECT * FROM coleta WHERE c_u_id = $usuario";
                            $query = mysqli_query($conn, $sql);
                            //$linha = mysqli_fetch_assoc($query);//percorre os registros do select
                            while ($linha = mysqli_fetch_assoc($query))//percorre os registros do select
                            {
                        ?>
                        <tr>
                            <td class="align-middle"><?php echo $linha['c_resid']; ?></td>
                            <td class="align-middle text-center"><?php echo $linha['c_ender']; ?></td>
                            <td class="align-middle text-center"><?php echo $linha['c_situ']; ?></td>
                            <td class="align-middle text-center">
                                <?php if($linha['c_datap'] == '1111-11-11'){ echo 'Agendando Data'; } else { echo date('d/m/Y', strtotime($linha['c_datap'])); } ?>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-warning rounded-0" data-toggle="modal"
                                    data-target="#modalEditar" data-whatever="<?php echo $linha['c_id'] ?>"
                                    data-whateverresiduo="<?php echo $linha['c_resid'] ?>"
                                    data-whateverendereco="<?php echo $linha['c_ender'] ?>">Editar</button>
                                <button type="button" class="btn btn-danger rounded-0"
                                    data-target="#modal_delete<?php echo $linha['c_id']?>" data-toggle="modal"><span
                                        class="glyphicon glyphicon-trash"></span>Excluir</button>

                                <!--<button type="submit" class="btn btn-danger mt-3" >Excluir</button>-->
                                <div class="modal fade" id="modal_delete<?php echo $linha['c_id']?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">LOGO</h3>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <h4>Deseja excluir essa solicitação?</h4>
                                                </center>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary rounded-0"
                                                    data-dismiss="modal">Não</button>
                                                <a type="button" class="btn btn-danger rounded-0"
                                                    href="deleta.php?c_id=<?php echo $linha['c_id']?>">Sim</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                            mysqli_free_result($query);//limpa a memória
                        ?>
                    </tbody>
                </table>
                <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="edita.php" method="post">
                                    <div class="form-group">
                                        <label for="tresid" class="col-form-label">Resíduo:</label>
                                        <textarea class="form-control" name="tresid" id="tresid" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tender" class="col-form-label">Endereço:</label>
                                        <input type="text" class="form-control" name="tender" id="tender">
                                    </div>
                                    <input name="tid" type="hidden" class="form-control" id="id" value="">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary rounded-0"
                                            data-dismiss="modal">Fechar</button>
                                        <input type="submit" class="btn btn-success rounded-0" value="Enviar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#modalEditar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var recipientresiduo = button.data('whateverresiduo')
            var recipientendereco = button.data('whateverendereco')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Coleta ' + recipient)
            modal.find('#id').val(recipient)
            modal.find('#tresid').val(recipientresiduo)
            modal.find('#tender').val(recipientendereco)
        })
    </script>
</body>

</html>