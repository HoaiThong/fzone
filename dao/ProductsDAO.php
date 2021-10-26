<?php

class ProductDAO {

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

    function get_array_product($_idStore) {
        $idStore = (int) $_idStore;
        try {
            //$sql = "CALL get_array_product(:idStore)";
            $sql = "Select * from tbl_product where idStore=?";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $idStore, PDO::PARAM_INT);
            // $stmt->bindParam(':idStore', $idStore, PDO::PARAM_INT);
            // Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();

            /*
             * Trong trường hợp chưa setFetchMode() bạn có thể sử dụng
             * $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
             */
        } catch (PDOException $e) {
            
        }

        return $resultSet;
    }

    public function add_product($_skuProduct, $_nameProduct, $_iconLink, $_imageSource, $_description,
            $_dropPrices, $_originalPrices, $_wholesalePrices, $_retailPrices, $_unitProduct, $_inventory,
            $_category, $_idStore) {
        
        $dropPrices = (float) $_dropPrices;
        $originalPrices = (float) $_originalPrices;
        $wholesalePrices = (float) $_wholesalePrices;
        $retailPrices = (float) $_retailPrices;
        $inventory = (int) $_inventory;
        $idStore = (int) $_idStore;
        try {

            $sql = "INSERT INTO tbl_product (skuProduct, nameProduct, iconLink, "
                    . "imageSource, description, inventory, unitProduct,dropPrices,originalPrices,"
                    . "wholesalePrices,retailPrices,category,idStore) "
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_skuProduct, PDO::PARAM_STR);
            $stmt->bindParam(2, $_nameProduct, PDO::PARAM_STR);
            $stmt->bindParam(3, $_iconLink, PDO::PARAM_STR);
            $stmt->bindParam(4, $_imageSource, PDO::PARAM_STR);
            $stmt->bindParam(5, $_description, PDO::PARAM_STR);
            $stmt->bindParam(6, $inventory, PDO::PARAM_STR);
            $stmt->bindParam(7, $_unitProduct, PDO::PARAM_STR);
            $stmt->bindParam(8, $dropPrices, PDO::PARAM_STR);
            $stmt->bindParam(9, $originalPrices, PDO::PARAM_STR);
            $stmt->bindParam(10, $wholesalePrices, PDO::PARAM_STR);
            $stmt->bindParam(11, $retailPrices, PDO::PARAM_STR);
            $stmt->bindParam(12, $_category, PDO::PARAM_STR);
            $stmt->bindParam(13, $idStore, PDO::PARAM_STR);

            $stmt->execute();
            // success
           return $this->success;
        } catch (PDOException $e) {
            return $this->error;
        }
        return $this->error;
    }

    public function update_product($_skuProduct, $_nameProduct, $_iconLink, $_imageSource, $_description,
            $_dropPrices, $_originalPrices, $_wholesalePrices, $_retailPrices, $_unitProduct, $_inventory,
            $_category, $_idProduct) {

        $dropPrices = (float) $_dropPrices;
        $originalPrices = (float) $_originalPrices;
        $wholesalePrices = (float) $_wholesalePrices;
        $retailPrices = (float) $_retailPrices;
        $inventory = (int) $_inventory;
        $idProduct = (int) $_idProduct;
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

    public function remove_product($_idProduct) {
        try {

            $sql = "DELETE FROM tbl_product WHERE idProduct = ?";
            $stmt = $this->conn->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->bindParam(1, $_idProduct, PDO::PARAM_STR);
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