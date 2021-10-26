<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserUtil {

    private $conn;
    private $message = "message";
    private $success = "success";
    private $error = "error";

    // constructor
    public function __construct() {
        require_once 'dbUtil.php';
        // connecting to database
        $db = new DatabaseUtil();
        $this->conn = $db->connectPDO();
    }

    public function __destruct() {
        $this->conn = null;
        // $this->db->closePDO();
    }
    //--- signin by email, phone
    function signin($username, $password) {
        
        try {
            // Select * from tbluser where password like ? and (email like ? or phone like ?);
            $sql = "CALL signin(:$username,:password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            // Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();

            /*
             * Trong trường hợp chưa setFetchMode() bạn có thể sử dụng
             * $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
             */

            $response["customer"] = $resultSet;
            // success
            $response[$this->success] = $this->success;
            $response[$this->message] = "success";
        } catch (PDOException $e) {
            $response[$this->success] = $this->error;
            $response[$this->message] = "error";
        }
        return $response;
    }
}
?>

