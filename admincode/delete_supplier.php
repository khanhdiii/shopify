<?php
    include 'connect.php';

    if (isset($_GET['Id_supplier'])){
        $Id_supplier = $_GET['Id_supplier']; 
       
        $query = mysqli_query($connect,"DELETE FROM supplier WHERE Id_supplier = $Id_supplier");
        if($query)
        {
            header('Location: supplier.php');
        }
        else
        {
            echo '<script> alert("Xóa không thành công"); </script>';
    
        }
        
    }

?>

<!-- Phan cuoi tran -->