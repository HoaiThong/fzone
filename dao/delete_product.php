<?php
include '../admin/includes/session-check.php';
include './ProductsDAO.php';

if (isset($_POST['delete_btn'])) {

    $_idProduct = $_POST['product_id'];
    $productDAO = new ProductDAO();
    $response = $productDAO->remove_product($_idProduct);
    header("Location: ../admin/admin_products.php");
}
?>
