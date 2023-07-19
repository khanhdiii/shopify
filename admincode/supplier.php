<?php include 'master/master.php';


    $sql = "SELECT * FROM supplier";
    $supplier = mysqli_query($connect,$sql);
    
?>


<!-- Phần đầu trang -->
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-info">

                <div class="panel-body">
                    <a href="add_supplier.php" title="" class="btn btn-info">Thêm mới</a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách nhà cung cấp</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Nhà Sản Xuất</th>
                                <th>Mô tả</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($supplier as $key => $value) {?>
                            <tr>
                                <td><?php echo $key +1?></td>
                                <td><?php echo $value['Supplier_Name']?></td>
                                <td><?php echo $value['Description']?></td>
                                <td><?php echo $value['PhoneNumber']?></td>
                                <td><?php echo $value['Email']?></td>
                                <td><?php echo $value['Address']?></td>
                                <td>
                                    <a href="edit_supplier.php?Id_supplier=<?php echo $value['Id_supplier']?>"
                                        class="btn btn-info" title="sửa"><span
                                            class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="delete_supplier.php?Id_supplier=<?php echo $value['Id_supplier']?>"
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