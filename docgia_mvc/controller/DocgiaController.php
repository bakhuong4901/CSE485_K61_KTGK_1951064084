<?php
require_once 'model/DocgiaModel.php';
class DocgiaController{

    function index(){
        $dgModel = new DocgiaModel();
        $dgs = $dgModel->getShowDG();
        require_once 'view/docgia/index.php';
    }
    function detail(){
        $dgModel = new DocgiaModel();
        $dgs = $dgModel->getShowDG();
        require_once 'view/docgia/detail.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
            $dg_name = $_POST['dg_name'];
            //$dg_sex = $_POST['dg_sex'];
            $dg_age = $_POST['dg_age'];
            $dg_work = $_POST['dg_work'];
            $dg_capthe= $_POST['dg_capthe'];
            $dg_hethan = $_POST['dg_hethan'];
            $dg_diachi = $_POST['dg_diachi'];
            if(empty($dg_name) || empty($_POST['dg_sex'])|| empty($dg_age) || empty($dg_work) || empty($dg_capthe) || empty($dg_hethan) || empty($dg_diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $dg_sex = $_POST['dg_sex'];
                $dgModel = new DocgiaModel();
                $dgArr = [
                    'dg_name' => $dg_name,
                    'dg_sex' => $dg_sex,
                    'dg_age' => $dg_age,
                    'dg_work' => $dg_work,
                    'dg_capthe' => $dg_capthe,
                    'dg_hethan' => $dg_hethan,
                    'dg_diachi' => $dg_diachi,
                ];
                $isAdd = $dgModel->add($dgArr);
                if ($isAdd) {
                    $TT=  "Thêm mới thành công";
                }
                else {
                    $TT= "Thêm mới thất bại";
                }
                header("Location: index.php?controller=docgia&action=detail&tt=$TT");
                exit();
            }

        }
        require_once 'view/docgia/add.php';

    }
    function edit(){
        if (!isset($_GET['dgid'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=docgia&action=detail");
            return;
        }
        if (!is_numeric($_GET['dgid'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=docgia&action=detail");
            return;
        }
        $id = $_GET['dgid'];
        $dgModel = new DocgiaModel();
        $BD = $dgModel->getDGById($id);
        $error = '';
        if(isset($_POST['submit'])){
            $dg_name = $_POST['dg_name'];
            //$dg_sex = $_POST['bd_sex'];
            $dg_age = $_POST['dg_age'];
            $dg_work = $_POST['dg_work'];
            $dg_capthe= $_POST['dg_capthe'];
            $dg_hethan = $_POST['dg_hethan'];
            $dg_diachi = $_POST['dg_diachi'];
            if(empty($dg_name) || empty($_POST['dg_sex'])|| empty($dg_age) || empty($dg_work) || empty($dg_capthe) || empty($dg_hethan) || empty($dg_diachi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $dg_sex = $_POST['dg_sex'];
                $dgModel = new DocgiaModel();
                $dgArr = [
                    'madg' => $id,
                    'dg_name' => $dg_name,
                    'dg_sex' => $dg_sex,
                    'dg_age' => $dg_age,
                    'dg_work' => $dg_work,
                    'dg_capthe' => $dg_capthe,
                    'dg_hethan' => $dg_hethan,
                    'dg_diachi' => $dg_diachi,
                ];
                $isAdd = $dgModel->update($dgArr);
                if ($isAdd) {
                    $TT=  "Sửa thành công";
                }
                else {
                    $TT= "Sửa thất bại";
                }
                header("Location: index.php?controller=docgia&action=detail&tt=$TT");
                exit();
            }

        }
        require_once 'view/docgia/edit.php';
    }
    function delete(){
        $id = $_GET['dgid'];
        if (!is_numeric($id)) {
            header("Location: index.php?controller=docgia&action=index");
            exit();
        }
        $dgModel = new DocgiaModel();
        $isDelete = $dgModel->delete($id);
        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $TT=  "Xóa bản ghi thành công";
        }
        else {
            //báo lỗi
            $TT = "Xóa bản ghi thất bại";
        }
        header("Location: index.php?controller=docgia&action=detail&tt=$TT");
        exit();
    }
}


?>