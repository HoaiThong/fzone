<?php

class CartDAO {

    private $conn;
    private $message = "message";
    private $success = "success";
    private $error = "error";

    // constructor
    public function __construct() {
        require 'DataBaseDAO.php';
        // connecting to database
        $db = new DatabaseUtil();
        $this->conn = $db->connectPDO();
    }

    public function __destruct() {
        $this->conn = null;
        // $this->db->closePDO();
    }

    public function get_array_cart($_idStaff) {
        $resultSet = null;
        try {
            //$sql = "CALL get_array_product(:idStore)";
            $sql = "SELECT c.idCart, c.quantity,c.finalPrice,p.idProduct,p.nameProduct, p.skuProduct, p.iconLink, p.inventory, p.unitProduct,p.category "
                    . "FROM tbl_shopping_cart c JOIN tbl_product p WHERE c.idProduct=p.idProduct AND idStaff=?";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $_idStaff, PDO::PARAM_STR);
            // $stmt->bindParam(':idStore', $idStore, PDO::PARAM_INT);
            // Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();
        } catch (PDOException $e) {
            
        }

        return $resultSet;
    }

    public function add_cart($_idCart, $_idStore, $_idProduct, $_idStaff, $_quantity, $_finalPrice, $_note) {

        try {
            $sql1 = "INSERT INTO tbl_shopping_cart (idCart, idStaff, idProduct, "
                    . "quantity, finalPrice, note, idStore) "
                    . "VALUES (?,?,?,?,?,?,?);"
                    . "UPDATE tbl_product p SET p.inventory=p.inventory - ? WHERE p.idProduct=?";

            $sql = "INSERT INTO `tbl_shopping_cart`( `idCart`, `idStaff`, `idProduct`, `quantity`, `finalPrice`, `note`, `idStore`)"
                    . "SELECT ?,?,?,?,?,?,? FROM (SELECT 1) t "
                    . "WHERE NOT EXISTS (SELECT * FROM `tbl_shopping_cart` WHERE idStaff=? and idProduct=?);";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_idCart, PDO::PARAM_STR);
            $stmt->bindParam(2, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(3, $_idProduct, PDO::PARAM_STR);
            $stmt->bindParam(4, $_quantity, PDO::PARAM_STR);
            $stmt->bindParam(5, $_finalPrice, PDO::PARAM_STR);
            $stmt->bindParam(6, $_note, PDO::PARAM_STR);
            $stmt->bindParam(7, $_idStore, PDO::PARAM_STR);
            $stmt->bindParam(8, $_idStaff, PDO::PARAM_STR);
            $stmt->bindParam(9, $_idProduct, PDO::PARAM_STR);

            $stmt->execute();
            // success
            return $this->success;
        } catch (PDOException $e) {
            return $this->error;
        }
        return $this->error;
    }

    public function update_cart($_skuProduct, $_nameProduct, $_iconLink, $_imageSource, $_description,
            $_dropPrices, $_originalPrices, $_wholesalePrices, $_retailPrices, $_unitProduct, $_inventory,
            $_category, $_idProduct) {

        try {

            $sql = "UPDATE tbl_product SET skuProduct=?, nameProduct=?, iconLink=?, imageSource=?, description=?, "
                    . "dropPrices=?, originalPrices=?, wholesalePrices=?, retailPrices=?, "
                    . "unitProduct=?, inventory=?, category=? WHERE idProduct=?";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_skuProduct, PDO::PARAM_STR);
            $stmt->bindParam(2, $_nameProduct, PDO::PARAM_STR);
            $stmt->bindParam(3, $_iconLink, PDO::PARAM_STR);
            $stmt->bindParam(4, $_imageSource, PDO::PARAM_STR);
            $stmt->bindParam(5, $_description, PDO::PARAM_STR);
            $stmt->bindParam(6, $dropPrices, PDO::PARAM_STR);
            $stmt->bindParam(7, $originalPrices, PDO::PARAM_STR);
            $stmt->bindParam(8, $wholesalePrices, PDO::PARAM_STR);
            $stmt->bindParam(9, $retailPrices, PDO::PARAM_STR);
            $stmt->bindParam(10, $_unitProduct, PDO::PARAM_STR);
            $stmt->bindParam(11, $inventory, PDO::PARAM_STR);
            $stmt->bindParam(12, $_category, PDO::PARAM_STR);
            $stmt->bindParam(13, $idProduct, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            // success
            return $this->success;
        } catch (PDOException $e) {
            return $this->error;
        }
        return $this->error;
    }

    public function remove_cart($_idCart, $_idProduct, $_quantity) {
        try {

            $sql = "DELETE FROM tbl_shopping_cart WHERE idCart = ?;";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_idCart, PDO::PARAM_STR);
            $stmt->execute();
            // success
            return $this->success;
        } catch (PDOException $e) {
            return $this->$e;
        }
        return $this->error;
    }

}

?>