<?php
require 'view/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
        <div class="">
                <p><?php echo isset($_GET['tt']) ? $_GET['tt'] : ''?></p>
            </div>
            <a href="index.php?controller=docgia&action=index" class="text-decoration-none"><i class="bi bi-arrow-left"></i>  Quay Lại</a>
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>Danh Sách Chi  Tiết Độc Giả</h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=docgia&action=add"><button class="btn btn-primary">Thêm người hiến máu</button></a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã độc giả</th>
                            <th scope="col">Tên độc giả</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Năm sinh</th>
                            <th scope="col">Nghề Nghiệp</th>
                            <th scope="col">Ngày Cấp thẻ</th>
                            <th scope="col">Ngày Hết hạn</th>
                            <th scope="col">Địa chỉ</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dgs as $dg) {
                            $urlEdit =
                            "index.php?controller=docgia&action=edit&dgid=" . $dg['madg'];
                            $urlDelete =
                            "index.php?controller=docgia&action=delete&dgid=" . $dg['madg'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $dg['madg'] ?></th>
                                <td><?php echo $dg['hovaten'] ?></td>
                                <td><?php echo $dg['gioitinh'] ?></td>
                                <td><?php echo $dg['namsinh'] ?></td>
                                <td><?php echo $dg['nghenghiep'] ?></td>
                                <td><?php echo $dg['ngaycapthe'] ?></td>
                                <td><?php echo $dg['ngayhethan'] ?></td>
                                <td><?php echo $dg['diachi'] ?></td>
                                <td><a href="<?php echo $urlEdit ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="<?php echo $urlDelete ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php
require 'view/template/footer.php'
?>