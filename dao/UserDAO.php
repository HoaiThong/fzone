<?php

class UserDAO {

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

//    true: trả về mảng có chứa thông tin
//    false: trả về mảng rỗng
    function signin_by_phone($phoneNumber, $password) {
        $response = NULL;
        try {

            $sql = "SELECT * FROM tbl_user WHERE phone=? and password=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $phoneNumber, PDO::PARAM_STR);
            $stmt->bindParam(2, $password, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();
            /*
             * Trong trường hợp chưa setFetchMode() bạn có thể sử dụng
             * $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
             */

            $response = $resultSet;
            return $response;
        } catch (PDOException $e) {
//            $response[$this->success] = $this->error;
//            $response[$this->message] = "error";
            return $response;
        }
        return $response;
    }

    public function register($param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8) {

        try {

            $sql = "INSERT INTO tbl_user (fullName, userName, password, gender, dateOfBirth, email, phone, address) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $param1, PDO::PARAM_STR);
            $stmt->bindParam(2, $param2, PDO::PARAM_STR);
            $stmt->bindParam(3, $param3, PDO::PARAM_STR);
            $stmt->bindParam(4, $param4, PDO::PARAM_STR);
            $stmt->bindParam(5, $param5, PDO::PARAM_STR);
            $stmt->bindParam(6, $param5, PDO::PARAM_STR);
            $stmt->bindParam(7, $param5, PDO::PARAM_STR);
            $stmt->bindParam(8, $param5, PDO::PARAM_STR);

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

    public function update_user($param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9) {
        try {

            $sql = "UPDATE tbl_store SET nameStore=?, phone=?, email=?, address=?, optionCategory=? WHERE idStore=?)";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $param1, PDO::PARAM_STR);
            $stmt->bindParam(2, $param2, PDO::PARAM_STR);
            $stmt->bindParam(3, $param3, PDO::PARAM_STR);
            $stmt->bindParam(4, $param4, PDO::PARAM_STR);
            $stmt->bindParam(5, $param5, PDO::PARAM_STR);
            $stmt->bindParam(6, $param6, PDO::PARAM_INT);
            $stmt->bindParam(7, $param6, PDO::PARAM_INT);
            $stmt->bindParam(8, $param6, PDO::PARAM_INT);
            $stmt->bindParam(9, $param6, PDO::PARAM_INT);
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

    public function search_user_by_phone($_phone) {
        $resultSet = null;
        try {
//            //$sql = "CALL get_array_product(:idStore)";
            $sql = "Select * from tbl_user u WHERE u.phone LIKE ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $_phone, PDO::PARAM_STR);
//            // $stmt->bindParam(':idStore', $idStore, PDO::PARAM_INT);
//            // Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();
        } catch (PDOException $e) {
            return $resultSet;
        }
//        __destruct();
        return $resultSet;
    }

}

?>