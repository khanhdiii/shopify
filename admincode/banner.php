<?php include 'master/master.php';


    $sql = "SELECT * FROM banner";
    $banner = mysqli_query($connect,$sql);
    
?>


<!-- Phần đầu trang -->
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-info">

                <!-- <div class="panel-body">
                    <a href="add_banner.php" title="" class="btn btn-info">Thêm mới</a>
                </div> -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách banner</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên banner</th>
                                <th>Hình ảnh</th>
                                <th>Trạng thái</th>
                                <th>Mô tả</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($banner as $key => $value) :?>
                            <tr>
                                <td><?php echo $key +1?></td>
                                <td><?php echo $value['BannerName']?></td>
                                <td><img src="banners/<?php echo $value['BannerImages']?>" width="50"></td>


                                <?php if($value['Status'] == 1) { ?>
                                <td>Hiện</td>
                                <?php } else{ ?>
                                <td>Ẩn</td>
                                <?php }?>
                                <td><?php echo $value['Description']?></td>
                                <td>
                                    <a href="edit_banner.php?Id_Banner=<?php echo $value['Id_Banner']?>"
                                        class="btn btn-info" title="sửa"><span
                                            class="glyphicon glyphicon-pencil"></span></a>
                                    <!-- <a href="delete_banner.php?Id_Banner=<?php echo $value['Id_Banner']?>"
                                        class="btn btn-danger" title="xóa"><span
                                            class="glyphicon glyphicon-remove"></span></a> -->
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Phan cuoi tran -->
<?php include 'master/footer.php'; ?>