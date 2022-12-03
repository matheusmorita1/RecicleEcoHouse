<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/index.css">
    <title>Página de Análise</title>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="./admin.php">Listar Solicitações</a>
                        </li>
                    </ul>
                </div>
                <a href="../usuario/logout.php" class="btn btn-danger rounded-0">Sair</a>
            </nav>
        </header>
        <main>
            <a href="#cabecalho"><button id="volta" class="btn btn-primary rounded-circle sticky-top mt-3 ml-4" style="width: 50px; height: 50px;">&uarr;</button></a>
            <div class="container mt-4 mb-4 rounded-0">
                <table class="table table-bordered table-responsive text-dark rounded-0 shadow">
                    <thead class="text-center marrom text-light">
                        <tr>
                            <th class="align-middle">Nome</th>
                            <th class="align-middle">Celular</th>
                            <th class="align-middle col-3" scope="col">Resíduos</th>
                            <th class="align-middle col-2" scope="col">Endereço</th>
                            <th class="align-middle" scope="col">Situação</th>
                            <th class="align-middle" scope="col">Data Prevista</th>
                            <th class="align-middle col-2" scope="col">Opção</th>
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
                            $sql = "SELECT * FROM coleta,  usuario WHERE c_u_id = u_id";
                            $query = mysqli_query($conn, $sql);
                                //$line = mysqli_fetch_assoc($query);//percorre os registros do select
                            while ($line = mysqli_fetch_assoc($query))//percorre os registros do select
                            {
                        ?>
                        <tr>
                            <td class="align-middle col-2 text-center"><?php echo $line['u_nome']; ?></td>
                            <td class="align-middle col-1 text-center"><?php echo $line['u_cell']; ?></td>
                            <td class="align-middle col-3"><?php echo nl2br($line['c_resid']); ?></td>
                            <td class="align-middle"><?php echo $line['c_ender']; ?></td>
                            <td class="align-middle text-center"><?php echo $line['c_situ']; ?></td>
                            <td class="align-middle text-center">
                                <?php if($line['c_datap'] == '1111-11-11'){ echo 'Agendando Data'; } else { echo date('d/m/Y', strtotime($line['c_datap'])); } ?>
                            </td>
                            <td class="align-middle">
                                <div class="row m-2">
                                    <button type="button" class="btn col m-1"
                                        data-target="#modal_cancela<?php echo $line['c_id']?>"
                                        data-toggle="modal">Cancelar</button>
                                    <button type="button" class="btn btn-info col m-1" data-toggle="modal"
                                        data-target="#modal_confirma<?php echo $line['c_id'] ?>"
                                        data-whateverdatap="<?php echo $line['c_datap'] ?>">Confirmar</button>
                                    <button type="button" class="btn btn-warning col m-1"
                                        data-target="#modal_finaliza<?php echo $line['c_id']?>"
                                        data-toggle="modal">Finalizar</button>
                                    <button type="button" class="btn btn-danger col m-1"
                                        data-target="#modal_delete<?php echo $line['c_id']?>" data-toggle="modal"><span
                                            class="glyphicon glyphicon-trash"></span> Excluir</button>
                                </div>
                                <div class="modal fade" id="modal_finaliza<?php echo $line['c_id']?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content cinza">
                                            <div class="modal-header">
                                                <img src="../../image/logo.png" class="rounded-circle" width="60px" alt="">
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <h4>Deseja finalizar essa solicitação?</h4>
                                                </center>
                                                <form action="altera.php">
                                                    <input type="hidden" name="tdatapa">
                                                    <input type="hidden" name="c_id" value=<?php echo $line['c_id']?>>
                                                    <input type="hidden" name="c_situ" value="Finalizado">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                                        <input type="submit" class="btn btn-primary" value="Confirmar">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_confirma<?php echo $line['c_id']?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content cinza">
                                            <div class="modal-header">
                                                <img src="../../image/logo.png" class="rounded-circle" width="60px" alt="">
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <h4>Deseja confirmar essa solicitação?</h4>
                                                </center>
                                                <div class="form-group">
                                                    <form action="altera.php" method="get">
                                                    <label for="tdatap" class="col-form-label">Data Prevista:</label>
                
                                                    <input type="hidden" name="c_id" value=<?php echo $line['c_id']?>>
                                                    <input type="hidden" name="c_situ" value="Confirmado">
                                                    <input type="date" class="form-control" name="tdatap" id="tdatap">
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" value="Confirmar">
                                                        <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Não</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                
                
                                        </div>
                                    </div>
                                </div>
                                <!--<button type="submit" class="btn btn-danger mt-3" >Excluir</button>-->
                                <div class="modal fade" id="modal_cancela<?php echo $line['c_id']?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content cinza">
                                            <div class="modal-header">
                                            <img src="../../image/logo.png" class="rounded-circle" width="60px" alt="">                                            </div>
                                            <div class="modal-body">
                                                <h4>Deseja cancelar essa solicitação?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Não</button>
                                                <a type="button" class="btn btn-danger"
                                                    href="altera.php?c_id=<?php echo $line['c_id']?>&c_situ=Cancelado">Sim</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_delete<?php echo $line['c_id']?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content cinza">
                                            <div class="modal-header">
                                            <img src="../../image/logo.png" class="rounded-circle" width="60px" alt="">                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <h4>Deseja excluir essa solicitação?</h4>
                                                </center>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Não</button>
                                                <a type="button" class="btn btn-danger"
                                                    href="deleta.php?c_id=<?php echo $line['c_id']?>">Sim</a>
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
            </div>
            <!--
                <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="edita-coleta.php" method="post">
                                        <div class="form-group">
                                            <label for="tres" class="col-form-label">Resíduo:</label>
                                            <textarea class="form-control" name="tres" id="tres" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="tender" class="col-form-label">Endereço:</label>
                                            <input type="tel" class="form-control" name="tender" id="tender">
                                        </div>
                                        <div class="form-group">
                                            <label for="tsit" class="col-form-label">Situação:</label>
                                            <input type="text" class="form-control" name="tsit" id="tsit">
                                        </div>
                                        <div class="form-group">
                                            <label for="tdatap" class="col-form-label">Data Prevista:</label>
                                            <input type="date" class="form-control" name="tdatap" id="tdatap">
                                        </div>
                                        <input name="tid" type="hidden" class="form-control" id="id" value="">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            <input type="submit"  class="btn btn-primary" value="Enviar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
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
</body>

</html>