<?php include 'master/master.php';


    $sql = "SELECT * FROM category";
    $category = mysqli_query($connect,$sql);
    
?>


<!-- Phần đầu trang -->
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-info">

                <div class="panel-body">
                    <a href="add_category.php" title="" class="btn btn-info">Thêm mới</a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách danh mục</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($category as $key => $value) {?>
                            <tr>
                                <td><?php echo $key +1?></td>
                                <td><?php echo $value['CategoryName']?></td>
                                <td>
                                    <a href="edit_category.php?Id_category=<?php echo $value['Id_category']?>"
                                        class="btn btn-info" title="sửa"><span
                                            class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="delete_category.php?Id_category=<?php echo $value['Id_category']?>"
                                        class="btn btn-danger" title="xóa"><span
                                            class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Phan cuoi tran -->
<?php include 'master/footer.php'; ?>