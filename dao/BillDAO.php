<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BillDAO {

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

    public function add_bill($_idStore, $_idStaff, $_idExpress, $_linkExpress, $_ecommerceLevel, $_buyerName,
            $_buyerPhone, $_buyerAddress, $_buyerEmail, $_note, $_orderStatus) {
        $resultSet = null;
        try {
            $sql = "SET @num =(SELECT COUNT(p.idProduct) AS NumberOfProducts FROM tbl_product p "
                    . "JOIN tbl_shopping_cart c WHERE p.inventory < c.quantity "
                    . "AND p.idProduct=c.idProduct "
                    . "AND p.idProduct IN ( "
                    . "SELECT s.idProduct FROM tbl_shopping_cart s WHERE s.idStaff=? and s.idStore=? ));"
                    . "INSERT INTO `tbl_bill`( `idStore`, `idStaff`, `idExpress`, `linkExpress`, `ecommerceLevel`, `buyerName`, `buyerPhone`"
                    . ", `buyerAddress`, `buyerEmail`, `note`, `orderStatus`)"
                    . "SELECT ?,?,?,?,?,?,?,?,?,?,? FROM (SELECT 1) t "
                    . "WHERE @num=0;"
                    . "SET @last_id = LAST_INSERT_ID();"
                    . "INSERT INTO tbl_detail_bill (idBill, idProduct, quantity, finalPrice) "
                    . "SELECT @last_id, c.idProduct, c.quantity, c.finalPrice FROM tbl_shopping_cart c "
                    . "WHERE @num=0 AND c.idStaff=? AND c.idStore=? AND c.idProduct IN ("
                    . "SELECT s.idProduct FROM tbl_shopping_cart s WHERE s.idStaff=? and s.idStore=? );"
                    . "UPDATE tbl_product p "
                    . "SET p.inventory=p.inventory - (SELECT i.quantity FROM tbl_shopping_cart i "
                    . "WHERE i.idProduct = p.idProduct AND i.idStaff=? AND i.idStore=? GROUP BY i.idProduct) "
                    . "WHERE p.idProduct IN ( "
                    . "SELECT d.idProduct FROM tbl_shopping_cart d WHERE d.idStaff=? AND d.idStore=? );"
                    . "DELETE FROM tbl_shopping_cart WHERE idStaff=? AND idStore=?;"
                    . "SELECT @num;";

            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(2, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(3, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(4, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(5, $_idExpress, PDO::PARAM_STR);
            $stmt->bindParam(6, $_linkExpress, PDO::PARAM_STR);
            $stmt->bindParam(7, $_ecommerceLevel, PDO::PARAM_STR);
            $stmt->bindParam(8, $_buyerName, PDO::PARAM_STR);
            $stmt->bindParam(9, $_buyerPhone, PDO::PARAM_STR);
            $stmt->bindParam(10, $_buyerAddress, PDO::PARAM_STR);
            $stmt->bindParam(11, $_buyerEmail, PDO::PARAM_STR);
            $stmt->bindParam(12, $_note, PDO::PARAM_STR);
            $stmt->bindParam(13, $_orderStatus, PDO::PARAM_STR);
            $stmt->bindParam(14, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(15, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(16, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(17, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(18, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(19, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(20, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(21, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(22, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(23, $_idStore, PDO::PARAM_STR);

            $stmt->execute();
            return $this->success;
        } catch (PDOException $e) {
            return $this->$e;
        }
        return;
    }

    public function add_bill_buy_now($_idStore, $_idStaff, $_idExpress, $_linkExpress, $_ecommerceLevel, $_buyerName,
            $_buyerPhone, $_buyerAddress, $_buyerEmail, $_note, $_orderStatus, $_idProduct, $_quantity, $_finalPrice) {
        try {
            $sql = "INSERT INTO `tbl_bill`( `idStore`, `idStaff`, `idExpress`, `linkExpress`, `ecommerceLevel`, `buyerName`, `buyerPhone`"
                    . ", `buyerAddress`, `buyerEmail`, `note`, `orderStatus`) "
                    . "SELECT ?,?,?,?,?,?,?,?,?,?,? FROM (SELECT 1) t "
                    . "WHERE EXISTS (SELECT * FROM tbl_product p WHERE p.idProduct=? and p.inventory >= ?);"
                    . "SET @last_id = LAST_INSERT_ID();"
                    . "INSERT INTO tbl_detail_bill (idBill, idProduct, quantity, finalPrice) "
                    . "SELECT @last_id,?,?,? FROM (SELECT 1) t "
                    . "WHERE EXISTS (SELECT * FROM tbl_product p WHERE p.idProduct=? and p.inventory >= ?);"
                    . "UPDATE tbl_product p SET p.inventory=p.inventory - ? WHERE p.idProduct=? and p.inventory >= ?;";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(1, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(2, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(3, $_idExpress, PDO::PARAM_STR);
            $stmt->bindParam(4, $_linkExpress, PDO::PARAM_STR);
            $stmt->bindParam(5, $_ecommerceLevel, PDO::PARAM_STR);
            $stmt->bindParam(6, $_buyerName, PDO::PARAM_STR);
            $stmt->bindParam(7, $_buyerPhone, PDO::PARAM_STR);
            $stmt->bindParam(8, $_buyerAddress, PDO::PARAM_STR);
            $stmt->bindParam(9, $_buyerEmail, PDO::PARAM_STR);
            $stmt->bindParam(10, $_note, PDO::PARAM_STR);
            $stmt->bindParam(11, $_orderStatus, PDO::PARAM_STR);
            $stmt->bindParam(12, $_idProduct, PDO::PARAM_STR);
            $stmt->bindParam(13, $_quantity, PDO::PARAM_STR);
            $stmt->bindParam(14, $_idProduct, PDO::PARAM_STR);
            $stmt->bindParam(15, $_quantity, PDO::PARAM_STR);
            $stmt->bindParam(16, $_finalPrice, PDO::PARAM_STR);
            $stmt->bindParam(17, $_idProduct, PDO::PARAM_STR);
            $stmt->bindParam(18, $_quantity, PDO::PARAM_STR);
            $stmt->bindParam(19, $_quantity, PDO::PARAM_STR);
            $stmt->bindParam(20, $_idProduct, PDO::PARAM_STR);
            $stmt->bindParam(21, $_quantity, PDO::PARAM_STR);

            $stmt->execute();
            // success
            return $this->success;
        } catch (PDOException $e) {
            return $this->$e;
        }
        return $this->error;
    }

    public function get_array_order_on_store($_idStore) {
        $idStore = (int) $_idStore;
        $resultSet = null;
        try {
              //$sql = "CALL get_array_product(:idStore)";
            $sql = 'SELECT i.* ,b.array_product '
                    . 'FROM tbl_bill i INNER JOIN '
                    . '(SELECT bd.idBill,concat("[",GROUP_CONCAT(JSON_OBJECT("idProduct", bd.idProduct, "skuProduct", p.skuProduct, "nameProduct", p.nameProduct,"category", p.category, "quantity", bd.quantity, "finalPrice",bd.finalPrice) SEPARATOR ","),"]") AS array_product '
                    . 'FROM tbl_detail_bill bd JOIN tbl_product p WHERE p.idProduct=bd.idProduct GROUP BY bd.idBill ) b '
                    . 'WHERE i.idBill=b.idBill AND i.idStore=? ORDER BY i.createAt DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $_idStore, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();
            $res["data"] = $resultSet;
            return $res;
        } catch (PDOException $e) {
            return;
        }
        return;
    }

    public function get_array_order_on_store_by_idStaff($_idStore, $_idStaff) {
        $res = null;

        try {
//            //$sql = "CALL get_array_product(:idStore)";
            $sql = 'SELECT i.* ,b.array_product '
                    . 'FROM tbl_bill i INNER JOIN '
                    . '(SELECT bd.idBill,concat("[",GROUP_CONCAT(JSON_OBJECT("idProduct", bd.idProduct, "skuProduct", p.skuProduct, "nameProduct", p.nameProduct,"category", p.category, "quantity", bd.quantity, "finalPrice",bd.finalPrice) SEPARATOR ","),"]") AS array_product '
                    . 'FROM tbl_detail_bill bd JOIN tbl_product p WHERE p.idProduct=bd.idProduct GROUP BY bd.idBill ) b '
                    . 'WHERE i.idBill=b.idBill AND i.idStore=? AND i.idStaff=? ORDER BY i.createAt DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $_idStore, PDO::PARAM_INT);
            $stmt->bindParam(2, $_idStaff, PDO::PARAM_INT);
//            // $stmt->bindParam(':idStore', $idStore, PDO::PARAM_INT);
//            // Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();
            $res["data"] = $resultSet;
            return $res;
        } catch (PDOException $e) {
            return;
        }
        return;
    }

    public function get_details_order($_idBill) {
        $resultSet = null;
        try {
//            //$sql = "CALL get_array_product(:idStore)";
            $sql = "Select d.finalPrice,d.quantity, p.nameProduct FROM tbl_detail_bill d JOIN tbl_product p On d.idProduct=p.idProduct AND d.idBill=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $_idBill, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();
            return $resultSet;
        } catch (PDOException $e) {
            return;
        }
        return;
    }

    public function cancel_order($_idBill) {
        $orderStatus = 31;
        try {

            $sql = "UPDATE tbl_bill SET orderStatus=? WHERE idBill = ?;"
                    . "UPDATE tbl_product p "
                    . "SET p.inventory=p.inventory + (SELECT i.quantity FROM tbl_detail_bill i "
                    . "WHERE i.idProduct = p.idProduct AND i.idBill=? GROUP BY i.idProduct) "
                    . "WHERE p.idProduct IN ( "
                    . "SELECT d.idProduct FROM tbl_detail_bill d WHERE d.idBill=? );";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $orderStatus, PDO::PARAM_STR);
            $stmt->bindParam(2, $_idBill, PDO::PARAM_STR);
            $stmt->bindParam(3, $_idBill, PDO::PARAM_STR);
            $stmt->bindParam(4, $_idBill, PDO::PARAM_STR);
            $stmt->execute();
            // success
            return $this->success;
        } catch (PDOException $e) {
            return $this->error;
        }
        return $this->error;
    }
    
    public function update_order_status($_idBill,$_status) {
        try {

            $sql = "UPDATE tbl_bill SET orderStatus=? WHERE idBill = ?;";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_status, PDO::PARAM_STR);
            $stmt->bindParam(2, $_idBill, PDO::PARAM_STR);
            $stmt->execute();
            // success
            return $this->success;
        } catch (PDOException $e) {
            return $this->error;
        }
        return $this->error;
    }


}

?>
