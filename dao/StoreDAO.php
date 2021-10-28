<?php

class StoreDAO {

    private $idStore;
    private $nameStore;
    private $phone;
    private $email;
    private $address;
    private $createAt;
    private $updateAt;
    private $optionCategory;
    private $idUser;
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

    public function create_store($idUser, $nameStore, $phone, $email, $address, $optionCategory, $description, $role) {
        try {

            $sql = "INSERT INTO tbl_store (nameStore, phone, email, address, optionCategory, description) VALUES (?,?,?,?,?,?);"
                    . "SET @lastId = LAST_INSERT_ID();"
                    . "INSERT INTO tbl_staff (idStore, idUser, role, createByIdUser) VALUES (@lastId,?,?,?);";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $nameStore, PDO::PARAM_STR);
            $stmt->bindParam(2, $phone, PDO::PARAM_STR);
            $stmt->bindParam(3, $email, PDO::PARAM_STR);
            $stmt->bindParam(4, $address, PDO::PARAM_STR);
            $stmt->bindParam(5, $optionCategory, PDO::PARAM_STR);
            $stmt->bindParam(6, $description, PDO::PARAM_STR);
            $stmt->bindParam(7, $idUser, PDO::PARAM_STR);
            $stmt->bindParam(8, $role, PDO::PARAM_STR);
            $stmt->bindParam(9, $idUser, PDO::PARAM_STR);
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

    public function update_store($_idStore, $_nameStore, $_phone, $_email, $_address, $_optionCategory, $_description) {
        try {

            $sql = "UPDATE tbl_store SET nameStore=?, phone=?, email=?, address=?, optionCategory=?, description=? WHERE idStore=?";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_nameStore, PDO::PARAM_STR);
            $stmt->bindParam(2, $_phone, PDO::PARAM_STR);
            $stmt->bindParam(3, $_email, PDO::PARAM_STR);
            $stmt->bindParam(4, $_address, PDO::PARAM_STR);
            $stmt->bindParam(5, $_optionCategory, PDO::PARAM_STR);
            $stmt->bindParam(6, $_description, PDO::PARAM_STR);
            $stmt->bindParam(7, $_idStore, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            // success
            return $this->success;
        } catch (PDOException $e) {
            return $this->error;
        }
        return $this->error;
    }

    public function get_store_info($_idUser) {
        $idUser = (int) $_idUser;
        $dem = 0;
        // $sql="SELECT id,name,url from menu order by views DESC LIMIT ?,?";
        try {
            $sql = " SELECT sto.* FROM tbl_store sto inner join tbl_staff sta on sto.idStore=sta.idStore and  idUser=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $idUser, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();

            /* Trong trường hợp chưa setFetchMode() bạn có thể sử dụng
              $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); */


            $response[$this->success] = 1;
            $response[$this->message] = $dem;
        } catch (PDOException $e) {
            $response[$this->success] = 0;
            $response[$this->message] = $e;
        }
        return $resultSet;
    }

    public function get_array_store_by_idUser($_idUser) {
        try {
            $sql = " SELECT sto.*,sta.idStaff,sta.role FROM tbl_store sto inner join tbl_staff sta on sto.idStore=sta.idStore and  idUser=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $_idUser, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();

            /* Trong trường hợp chưa setFetchMode() bạn có thể sử dụng
              $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); */


            return $resultSet;
        } catch (PDOException $e) {
            return;
        }
        return;
    }

    public function get_store_info_by_id_store($_idUser, $_idStore) {
        $idUser = (int) $_idUser;
        $idStore = (int) $_idStore;
        $dem = 0;
        // $sql="SELECT id,name,url from menu order by views DESC LIMIT ?,?";
        try {
            $sql = " SELECT sto.*,sta.role FROM tbl_store sto inner join tbl_staff sta on sto.idStore=sta.idStore and  idUser=? and sto.idStore=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $idUser, PDO::PARAM_INT);
            $stmt->bindParam(2, $idStore, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();

            /* Trong trường hợp chưa setFetchMode() bạn có thể sử dụng
              $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); */


            return $resultSet;
        } catch (PDOException $e) {
            return null;
        }
        return null;
    }

}

?>