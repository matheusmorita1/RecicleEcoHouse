<?php
    include('../../conn.php');

    $nome = $_POST['tnome'];
    $cell = $_POST['tcell'];
    $endereco = $_POST['tender'];
    $senha = $_POST['tsenha'];

    $sql = mysqli_query($conn, "INSERT INTO usuario (u_nome, u_cell, u_ender, u_senha) VALUES ('$nome', '$cell', '$endereco', '$senha')") or die('Erro'. mysqli_error($conn));
    header('location:../../index.php');
?>