<?php
require_once 'config/db.php';
class DocgiaModel{
    private $madg;
    private $hovaten;
    private $gioitinh;
    private $namsinh;
    private $nghenghiep;
    private $ngapcapthe;
    private $ngayhethan;
    private $diachi;

    function getShowDG(){
        $conn = $this->connectDb();
        $sql = "SELECT * FROM docgia";
        $result = mysqli_query($conn, $sql);
        $arr_dg = [];
        if(mysqli_num_rows($result)>0){
            $arr_dg = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $arr_dg;
    }
    public function add($paramdg = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO docgia ( hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe,ngayhethan,diachi)
        VALUES ( '{$paramdg['dg_name']}', '{$paramdg['dg_sex']}', '{$paramdg['dg_age']}', '{$paramdg['dg_work']}', '{$paramdg['dg_capthe']}','{$paramdg['dg_hethan']}','{$paramdg['dg_diachi']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }
    public function getDGById($dg_id = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM docgia WHERE madg={$dg_id}";
        $results = mysqli_query($connection, $querySelect);
        $dgArr = [];
        if (mysqli_num_rows($results) > 0) {
            $dgs = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $dgArr = $dgs[0];
        }
        $this->closeDb($connection);

        return $dgArr;
    }
    public function update($dg = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE docgia 
        SET hovaten = '{$dg['dg_name']}', gioitinh = '{$dg['dg_sex']}', namsinh = '{$dg['dg_age']}', nghenghiep = '{$dg['dg_work']}', ngaycapthe = '{$dg['dg_capthe']}',ngayhethan = '{$dg['dg_hethan']}' ,diachi = '{$dg['dg_diachi']}'  WHERE madg = {$dg['madg']}";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }
    public function delete($id = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM docgia WHERE madg = {$id}";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
        public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    

}


?>