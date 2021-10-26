<?php
//include '../admin/includes/session-check.php';
session_start();
$categories = $_SESSION['category'];
$idStore = $_SESSION['idStore'];
$arrayCategories = explode(',', $categories);
include './ProductsDAO.php';
$product_category = '{';
if (isset($_POST['create_btn'])) {
    $str_categ = 'category_';

//    $_idStore = $_POST['store_id'];
    $_iconLink = $_POST['product_img_link'];
    $_skuProduct = $_POST['product_sku'];
    $_nameProduct = $_POST['product_name'];
    $_imageSource = $_POST['product_img_source'];
    $_description = $_POST['product_description'];
    $_retailPrices = $_POST['product_retail_price'];
    $_dropPrices = $_POST['product_dropship_price'];
    $_wholesalePrices = $_POST['produc_wholesale'];
    $_inventory = $_POST['product_quantity'];
    $_unitProduct = $_POST['product_unit_product'];
    $_originalPrices = 0;
    for ($index = 0; $index < count($arrayCategories); $index++) {
        $str = $str_categ . $index;
        $value_category = $_POST[$str];
        $s = '"' . trim($arrayCategories[$index]) . '":"' . trim($value_category) . '",';
        $product_category = $product_category . $s;
    }
    $product_category = $product_category . '}';
    $product_category = str_replace(',}', '}', $product_category);
    $productDAO = new ProductDAO();
    $response = $productDAO->add_product($_skuProduct, $_nameProduct, $_iconLink, 
            $_imageSource, $_description, $_dropPrices, $_originalPrices, 
            $_wholesalePrices, $_retailPrices, $_unitProduct, $_inventory, $product_category, $idStore);
    
//    $res = json_encode($response);
    header("Location: ../admin/admin_products.php");
}
?>
