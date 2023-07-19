<?php include 'master/master.php';


$CategoryName=filter_input(INPUT_POST, 'CategoryName');        

    if (isset($_POST['CategoryName'])&& $CategoryName!=""){
    $CategoryName = $_POST['CategoryName'];

    $sql = "INSERT INTO category(CategoryName) VALUES ('$CategoryName')";
    //trim and lowercase username
    $CategoryName =  strtolower(trim($_POST["CategoryName"]));
            
    //sanitize username
    $CategoryName = filter_var($CategoryName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

    //check username in db
    $results = mysqli_query($connect,"SELECT Id_category FROM category WHERE CategoryName='$CategoryName'");

    //return total count
    $CategoryName_exist = mysqli_num_rows($results); //total records

     //ProductName is null 
     $CategoryName_null = isset($_POST['CategoryName']) ? $_POST['CategoryName'] : ' ';

     if($CategoryName_exist) 
     {
         echo "<span style='color:red' 'font-fize:20px'>(*) Tên danh mục đã tồn tại</span>";
     }
     if ($CategoryName_null == ' '){
        echo "<span style='color:red' 'font-fize:20px'>(*) Tên danh mục không được để khoảng trắng</span>";
    }else{
        $query = mysqli_query($connect, $sql);
        if($query)
        {
        header('Location: category.php');
        }
    }
}
?>
<!-- Phần đầu trang -->
<div class="container">
    <div class="row">

        <div class="col-md-11">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Thêm mới danh mục</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" role="form">


                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <span style='color:red'>(*)</span>
                            <input type="text" name="CategoryName" class="form-control" placeholder="Nhập tên danh mục"
                                required="required">
                        </div>

                        <button type="submit" name="insert_category" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Phan cuoi tran -->
<?php include 'master/footer.php'; ?>