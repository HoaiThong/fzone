<?php

class StaffDAO {

    private $conn;
    private $message = "message";
    private $success = "success";
    private $error = "error";

    // constructor
    public function __construct() {
        require_once 'DataBaseDAO.php';
        // connecting to database
        $db = new DatabaseUtil();
        $this->conn = $db->connectPDO();
    }

    public function __destruct() {
        $this->conn = null;
        // $this->db->closePDO();
    }

    public function add_staff($_idStore, $_idUser, $_create_by_user_id, $_note, $_role) {

        try {

            $sql = "INSERT INTO `tbl_staff`( `idUser`, `idStore`, `role`, `note`, `createByIdUser`)"
                    . "SELECT ?,?,?,?,? FROM (SELECT 1) t "
                    . "WHERE NOT EXISTS (SELECT * FROM `tbl_staff` WHERE idUser=? and idStore=?)";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_idUser, PDO::PARAM_STR);
            $stmt->bindParam(2, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(3, $_role, PDO::PARAM_STR);
            $stmt->bindParam(4, $_note, PDO::PARAM_STR);
            $stmt->bindParam(5, $_create_by_user_id, PDO::PARAM_STR);
            $stmt->bindParam(6, $_idUser, PDO::PARAM_STR);
            $stmt->bindParam(7, $_idStore, PDO::PARAM_STR);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            // success
            $response[$this->success] = 1;
            $response[$this->message] = $this->success;
        } catch (PDOException $e) {
            $response[$this->success] = 0;
            $response[$this->message] = $e->getMessage();
        }
        return $response;
    }

    public function update_staff($_role, $_note, $_idStore, $_idStaff) {

        try {

            $sql = "UPDATE tbl_staff SET role=?, note=? WHERE idStore=? and idStaff=?";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_role, PDO::PARAM_STR);
            $stmt->bindParam(2, $_note, PDO::PARAM_STR);
            $stmt->bindParam(3, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(4, $_idStaff, PDO::PARAM_STR);
            $stmt->execute();
            // success
            return $this->success;
        } catch (PDOException $e) {
            return $this->error;
        }
        return $this->error;
        ;
    }

    public function remove_staff($_idStaff, $_idStore) {
        try {

            $sql = "DELETE FROM tbl_staff WHERE idStaff = ? and idStore=?";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(2, $_idStore, PDO::PARAM_STR);
            $stmt->execute();
            // success
            return $this->success;
        } catch (PDOException $e) {
            return $this->error;
        }
        return $this->error;
    }

    public function get_array_staff_on_store($_idStore) {
        $idStore = (int) $_idStore;
        try {
//            //$sql = "CALL get_array_product(:idStore)";
            $sql = "Select * from tbl_staff s INNER JOIN tbl_user u ON s.idUser=u.idUser and s.idStore=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $idStore, PDO::PARAM_INT);
//            // $stmt->bindParam(':idStore', $idStore, PDO::PARAM_INT);
//            // Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();
//
//            /*
//             * Trong trường hợp chưa setFetchMode() bạn có thể sử dụng
//             * $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             */
        } catch (PDOException $e) {
//            
        }
//        __destruct();
        return $resultSet;
    }

}

?>