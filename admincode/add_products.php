<?php include 'master/master.php';

$category = mysqli_query($connect,"SELECT * FROM category");
$supplier = mysqli_query($connect,"SELECT * FROM supplier");


if (isset($_POST['ProductName'])){
    $Id_supplier  = $_POST['Id_supplier'];
    $Id_category  = $_POST['Id_category'];
    $ProductName = $_POST['ProductName'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $Status = $_POST['Status'];
    $CreateDate = $_POST['CreateDate'];
    $ModifiedDate = $_POST['ModifiedDate'];

    if(isset($_FILES['ProductImage'])){
        $file = $_FILES['ProductImage'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'],'uploads/'.$file_name);
    }
 
        $sql = "INSERT INTO products(Id_supplier, Id_category  ,ProductName, Description,Price,ProductImage,Status,CreateDate,ModifiedDate ) VALUES ($Id_supplier, $Id_category ,'$ProductName', '$Description','$Price','$file_name','$Status','$CreateDate','$ModifiedDate')";
        
        //trim and lowercase username
        $ProductName =  strtolower(trim($_POST["ProductName"]));
        
        //sanitize username
        $ProductName = filter_var($ProductName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

        //check username in db
        $results = mysqli_query($connect,"SELECT Id_product FROM products WHERE ProductName='$ProductName'");

        //return total count
        $ProductName_exist = mysqli_num_rows($results); //total records

     
        $ProductName_null = isset($_POST['ProductName']) ? $_POST['ProductName'] : ' ';
        if($ProductName_exist) {
            echo "<span style='color:red' 'font-fize:20px'>(*) Tên sản phẩm đã tồn tại</span>";
        }if ($ProductName_null == ' '){
            echo "<span style='color:red' 'font-fize:20px'>(*) Tên sản phẩm không được để khoảng trắng</span>";
        }
        else{
            $query = mysqli_query($connect,$sql);
            if($query){
                header('Location: products.php');
            }
            else{
                // echo '<script> alert("Chưa thêm sản phẩm"); </script>';
                echo 'loi';
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
                    <h3 class="panel-title">Thêm mới sản phẩm</h3>

                </div>
                <div class="panel-body">
                    <form action="" method="POST" role="form" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="">Tên nhà sản xuất</label>
                            <span style='color:red'>(*)</span>
                            <select name="Id_supplier" id="input" class="form-control" required="required">
                                <!-- <option value="">---Tên nhà sản xuất---</option> -->
                                <?php foreach ($supplier as $key => $value){?>
                                <option value="<?php echo $value['Id_supplier']?>"><?php echo $value['Supplier_Name']?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <span style='color:red'>(*)</span>
                            <select name="Id_category" id="input" class="form-control" required="required">
                                <!-- <option value="">---Tên danh mục---</option> -->
                                <?php foreach ($category as $key => $value){?>
                                <option value="<?php echo $value['Id_category']?>"><?php echo $value['CategoryName']?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <span style='color:red'>(*)</span>
                            <input type="text" name="ProductName" class="form-control" placeholder="Nhập tên sản phẩm"
                                required="required">
                        </div>

                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="Description" class="form-control" row="3"
                                placeholder=" Nhập mô tả"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Gía</label>
                            <input type="text" name="Price" class="form-control" placeholder="Nhập giá sản phẩm">
                        </div>

                        <div class="form-group">
                            <label for="">Hình ảnh sản phẩm</label>
                            <input type="file" name="ProductImage" class="form-control" placeholder="Nhập hình ảnh">
                        </div>

                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="Status" id="input" value="1" checked="checked">
                                    Hiện
                                </label>
                                <label>
                                    <input type="radio" name="Status" id="input" value="0" checked="checked">
                                    Ẩn
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Ngày tạo</label>
                            <input type="date" name="CreateDate" class="form-control" placeholder="Nhập ngày tạo">
                        </div>

                        <div class="form-group">
                            <label for="">Ngày sửa</label>
                            <input type="date" name="ModifiedDate" class="form-control" placeholder="Nhập ngày sửa">
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Phan cuoi tran -->
<?php include 'master/footer.php'; ?>