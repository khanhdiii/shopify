<?php include 'master/master.php';


    if (isset($_GET['Id_supplier'])){
        $Id_supplier  =$_GET['Id_supplier']; 
        $sql = "SELECT * FROM supplier WHERE Id_supplier=$Id_supplier";
        $supplier = mysqli_query($connect, $sql);
        $sup = mysqli_fetch_assoc($supplier);
    }

      
    if (isset($_POST['Supplier_Name'])){
        $Supplier_Name = $_POST['Supplier_Name'];
        $Description = $_POST['Description'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['Email'];
        $Address = $_POST['Address'];

        $sql = "UPDATE supplier SET Supplier_Name = '$Supplier_Name',Description = '$Description',PhoneNumber = '$PhoneNumber',Email = '$Email',Address = '$Address' WHERE Id_supplier = $Id_supplier";
        //trim and lowercase username
        $Supplier_Name =  strtolower(trim($_POST["Supplier_Name"]));
        
        //sanitize username
        $Supplier_Name = filter_var($Supplier_Name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

        //check username in db
        $results = mysqli_query($connect,"SELECT Id_supplier FROM supplier WHERE Supplier_Name='$Supplier_Name'");

        //return total count
        $Supplier_Name_exist = mysqli_num_rows($results); //total records

       //Supplier_Name is null 
       $Supplier_Name_null = isset($_POST['Supplier_Name']) ? $_POST['Supplier_Name'] : ' ';

        if($Supplier_Name_exist) {
            echo "<span style='color:red' 'font-fize:20px'>(*) Tên nhà cung cấp đã tồn tại</span>";
        }
        if ($Supplier_Name_null == ' '){
            echo "<span style='color:red' 'font-fize:20px'>(*) Tên nhà cung cấp không được để khoảng trắng</span>";
        }
        else{

       $query = mysqli_query($connect, $sql);
       if($query){
           header('Location: supplier.php');
       }
    }
}
?>
<!-- Phần đầu trang -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Sửa nhà cung cấp</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" role="form">

                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <span style='color:red'>(*)</span>
                            <input type="text" name="Supplier_Name" class="form-control"
                                placeholder="Nhập tên nhà cung cấp" required="required"
                                value="<?php echo $sup['Supplier_Name'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <input type="text" name="Description" class="form-control" placeholder="Nhập tên mô tả"
                                value="<?php echo $sup['Description']?>">
                        </div>

                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" name="PhoneNumber" class="form-control" placeholder="Nhập số điện thoại"
                                value="<?php echo $sup['PhoneNumber']?>">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="Email" class="form-control" placeholder="Nhập địa chỉ Email"
                                value="<?php echo $sup['Email']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="Address" class="form-control" placeholder="Nhập địa chỉ"
                                value="<?php echo $sup['Address']?>">
                        </div>

                        <button type="submit" name="edit_supplier" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Phan cuoi tran -->
<?php include 'master/footer.php'; ?>