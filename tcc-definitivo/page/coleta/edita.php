<?php
    session_start();

    if(!$_SESSION['u_id']) {
        header("location:../../index.php");
    } else{
        $usuario = $_SESSION['u_id'];
    }

    include('../../conn.php');

    $id = $_POST['tid'];
	$residuo = $_POST['tresid'];
	$endereco = $_POST['tender'];
    
    $sql = "UPDATE coleta SET c_resid = '$residuo', c_ender = '$endereco' WHERE c_id = '$id'";

    $query = mysqli_query($conn, $sql);

    header('location:./acompanha.php');
?>