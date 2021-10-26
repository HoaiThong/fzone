<?php

class DatabaseUtil {

    private $conn;
    private $success = "success";
    private $error = "error";

    public function connectPDO() {
        require_once 'config.php';

        $dsn = "mysql:host=$servername;dbname=$dbname";
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            // create a PDO connection with the configuration data
            $this->conn = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            // report error message
            echo $e->getMessage();
        }
        return $this->conn;
    }

    // Close connect to database
    public function closePDO() {
        $this->conn = null;
    }

}

?>
