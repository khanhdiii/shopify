<?php
    include 'connect.php';

    if (isset($_GET['Id_category'])){
        $Id_category =$_GET['Id_category']; 
       
        $query = mysqli_query($connect, "DELETE FROM category WHERE Id_category=$Id_category");
        if($query)
        {
            echo '<script> alert("Data đã xóa"); </script>';
            header('Location: category.php');
        }
        else
        {
            echo '<script> alert("Data chưa xóa"); </script>';
    
        }
        
    }

?>

<!-- Phan cuoi tran -->