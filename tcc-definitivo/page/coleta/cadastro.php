<?php
    session_start();    
    if(!$_SESSION['u_id']) {
        header("location:../../index.php");
    }
    else{
        $usuario = $_SESSION['u_id'];
    }

    include('../../conn.php');

    $residuo = $_POST['tresid'];
    $endereco = $_POST['tender'];
    $query = mysqli_query($conn, "INSERT INTO coleta (c_ender, c_resid, c_u_id) VALUES ('$endereco', '$residuo', '$usuario')") or die(mysqli_error());

    header("location:acompanha.php");
?>