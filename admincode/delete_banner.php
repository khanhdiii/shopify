<?php
    include 'connect.php';

    if (isset($_GET['Id_Banner'])){
        $Id_Banner =$_GET['Id_Banner']; 
       
        $query = mysqli_query($connect, "DELETE FROM banner WHERE Id_Banner=$Id_Banner");
        if($query)
        {
            echo '<script> alert("Data đã xóa"); </script>';
            header('Location: banner.php');
        }
        else
        {
            echo '<script> alert("Data chưa xóa"); </script>';
    
        }
        
    }

?>

<!-- Phan cuoi tran -->