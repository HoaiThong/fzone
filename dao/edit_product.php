<?php
include '../admin/includes/session-check.php';
$categories = $_SESSION['category'];
$arrayCategories = explode(',', $categories);
include './ProductsDAO.php';

$product_category = '{';
if (isset($_POST['update_btn'])) {
    $str_categ = 'category_';

    $_idProduct = $_POST['product_id'];
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
    $response = $productDAO->update_product($_skuProduct, $_nameProduct, $_iconLink, $_imageSource,
            $_description, $_dropPrices, $_originalPrices, $_wholesalePrices, $_retailPrices,
            $_unitProduct, $_inventory, $product_category, $_idProduct);
//    echo '<script type="text/javascript">',
//    'jsfunction();',
//    '</script>';
    header("Location: ../admin/admin_products.php");
}
?>
<!--<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <style>
        #myBtn {
            width: 300px;
            padding: 10px;
            font-size:20px;
            position: absolute;
            margin: 0 auto;
            right: 0;
            left: 0;
            bottom: 50px;
            z-index: 9999;
        }
    </style>
    <body>

        <div class="container">
            <h2>Modal Methods</h2>
            <p>The <strong>show</strong> method shows the modal and the <strong>hide</strong> method hides the modal.</p>
             Trigger the modal with a button 

             Modal 
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                     Modal content
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Methods</h4>
                        </div>
                        <div class="modal-body">
                            <p>The <strong>show</strong> method shows the modal and the <strong>hide</strong> method hides the modal.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript">
            jsFunction(){
                    // Show the Modal on load
                    $("#myModal").modal("show");
            }

        </script>

    </body>
</html>-->