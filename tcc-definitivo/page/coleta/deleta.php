<?php
    session_start();    
    if(!$_SESSION['u_id']) {
        header("location:../../index.php");
    }
    else{
        $usuario = $_SESSION['u_id'];
    }
    include('../../conn.php');
	
    if(ISSET($_REQUEST['c_id'])){
        $id=$_REQUEST['c_id'];
        mysqli_query($conn, "DELETE FROM coleta WHERE c_id = '$id'") or die(mysqli_error());
        header("location:acompanha.php");
    }
?>