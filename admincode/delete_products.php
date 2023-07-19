<?php
    include 'connect.php';

    if (isset($_GET['Id_product'])){
        $Id_product  =$_GET['Id_product']; 
       
        $query = mysqli_query($connect, "DELETE FROM products WHERE Id_product =$Id_product");
        if($query)
        {
            header('Location: products.php');
        }
        else
        {
            echo '<script> alert("Xóa không thành công"); </script>';
    
        }
        
    }

?>

<!-- Phan cuoi tran -->