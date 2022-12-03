<?php
    	include('../../conn.php');
    
        if (ISSET($_GET['c_id']) && ISSET($_GET['c_situ']) && ISSET($_GET['tdatapa'])) {
            $id = $_GET['c_id'];
            $situacao = $_GET['c_situ'];
            $data = date('Y-m-d');
            $sql = "UPDATE coleta SET c_situ = '$situacao', c_datap = '$data' WHERE c_id = '$id'";
            mysqli_query($conn, $sql) or die(mysqli_error());

            header("location:admin.php");
        }
        else if(ISSET($_GET['c_id']) && ISSET($_GET['c_situ'])  && ISSET($_GET['tdatap']) )
        {
            $id=$_GET['c_id'];
            $situacao = $_GET['c_situ'];   
            $data = $_GET['tdatap'];
            $sql = "UPDATE coleta SET c_situ = '$situacao', c_datap = '$data' WHERE c_id = '$id'";
            echo $sql;
            mysqli_query($conn, $sql) or die(mysqli_error());

            header("location:admin.php");
        }
        else if (ISSET($_REQUEST['c_id']) && ISSET($_REQUEST['c_situ']) )
        {
            $id=$_REQUEST['c_id'];
            $situacao = $_REQUEST['c_situ'];   
              
            $sql = "UPDATE coleta SET c_situ = '$situacao', c_datap = '1111-11-11' WHERE c_id = '$id'";
            echo $sql;
            
            mysqli_query($conn, $sql) or die(mysqli_error());

        header("location:admin.php");

        }    
?>