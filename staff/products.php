<?php
include './includes/session-check-admin.php';
$nameStore = $_SESSION['nameStore'];
$categories = $_SESSION['category'];
$_idStore = $_SESSION['storeId'];
$_idStaff = $_SESSION['staffId'];
include('includes/header_1.php');
include('includes/navbar_admin_store.php');
include '../dao/ProductsDAO.php';
?>
<?php
$arrayCategories = explode(',', $categories);
$productDAO = new ProductDAO();
$arrayProduct = $productDAO->get_array_product($_idStore);
?>
<!-- Begin Page Content -->
<?php
include './includes/buy-now-modal.php';
include './includes/add-shopping-cart-modal.php';
include '../notify-msg/notify-success-modal.php';
include '../notify-msg/notify-error-modal.php';
?>
<!-- container-fluid -->



<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" >SẢN PHẨM   
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered " id="dataTable" style="width:100%" cellspacing="0">
                    <thead>
                        <tr style="background-color: #04AA6D;color: white;">
                            <th> Mã sản phẩm </th>
                            <th> Mã SKU </th>
                            <th>Hình ảnh</th>
                            <th> Tên sản phẩm </th>
                            <th> Giá bán lẻ </th>
                            <th> Giá dropship </th>
                            <?php
                            for ($index = 0; $index < count($arrayCategories); $index++) {
                                ?>
                                <th> <?php echo $arrayCategories[$index] ?></th>
                                <?php
                            }
                            ?>
                            <th> Số lượng </th>
                            <th> Đơn vị </th>
                            <th> Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = -1;
                        foreach ($arrayProduct as $value) {
                            $i++;
                            ?>
                            <tr style="text-align: center">
                                <td> <?php echo $value["idProduct"]; ?></td>
                                <td> <?php echo $value["skuProduct"]; ?></td>
                                <td><img  width="100" height="120" src=" <?php echo $value["iconLink"]; ?>" alt="" /></td>
                                <td> <?php echo $value["nameProduct"]; ?></td>
                                <td><?php echo number_format($value["retailPrices"], 0, ',', '.'); ?></td>
                                <td><?php echo number_format($value["dropPrices"], 0, ',', '.'); ?></td>
                                <?php
                                $str = $value["category"];
                                $result = json_decode($str, true);
                                for ($index1 = 0; $index1 < count($arrayCategories); $index1++) {
                                    $value1 = '';
                                    $s1 = trim($arrayCategories[$index1]);
                                    if (strpos($str, $s1) !== false)
                                        $value1 = $result[$s1];
                                    ?>

                                    <td><?php echo $value1 ?></td>
                                    <?php
                                }
                                ?>
                                <td><?php echo $value["inventory"]; ?></td>
                                <td> <?php echo $value["unitProduct"]; ?></td>
                                <td>
                                    <?php
                                    include('includes/sub_menu_product_action.php');
                                    ?>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>


                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include('includes/footer_1.php');
?>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
<script>
    $(document).on("click", '.details_button', function (e) {
        var name = $(this).data('name');
        var id = $(this).data('id');
        var idStore = $(this).data('idStore');
        var sku = $(this).data('sku');
        var img = $(this).data('img');
        var description = $(this).data('description');
        var imagesource = $(this).data('imagesource');
        var retailPrice = $(this).data('retailprice');
        var dropPrice = $(this).data('dropprice');
        var quantity = $(this).data('inventory');
        var unitProduct = $(this).data('unitproduct');
        var category_produt = $(this).data('category');
        var category_store = $(this).data('categorystore');
        var wholesaleprices = $(this).data('wholesaleprices');
        var arr = category_store.split(",");
        var arr_category_product = category_produt.split(',');
//        var string = category.replace(/;/g, '"');
        $(".product_id").val(id);
        $(".store_id").val(idStore);
        $(".product_name").val(name);
        $(".product_sku").val(sku);
        $(".product_description").val(description);
        $(".product_img_source").val(imagesource);
        $(".product_retail_price").val(retailPrice);
        $(".product_dropship_price").val(dropPrice);
        $(".produc_wholesale").val(wholesaleprices);
        $(".product_quantity").val(quantity);
        $(".product_unit_product").val(unitProduct);
        $(".product_img_link").val(img);
        $(".product_img_banner").attr('src', img);

        for (var i = 0; i < arr.length; i++) {

            var s = ".product_category_" + i;
            var key = arr[i].trim();
            for (var j = 0; j < arr_category_product.length; j++) {
                var str = arr_category_product[j].trim();
                if (str.indexOf(key) >= 0) {
                    var value = str.substr(key.length + 1, str.length);
//                    alert(val);
                    $(s).val(value);
                }
            }
        }
    });

</script>
<script>
    $(document).on("click", '.delete_button', function (e) {
        var idProduct = $(this).data('id');
        $(".product_id").val(idProduct);

    });
</script>
<script>
    $(document).on("click", '.add_cart_btn', function (e) {
        var idProduct = $(this).data('idproduct');
        var idStaff = $(this).data('idstaff');
        var nameProduct = $(this).data('name');
        var inventory = $(this).data('inventory');
        var unitproduct = $(this).data('unitproduct');
        var dropprice = $(this).data('dropprice');
        var wholesaleprices = $(this).data('wholesaleprices');
        var retailprice = $(this).data('retailprice');
        $(".product_quantity").attr('max', inventory);
        $(".product_id").val(idProduct);
        $(".product_name").val(nameProduct);
        $(".staff_id").val(idStaff);
        $(".product_unit").val(unitproduct);
        $(".product_price").val(dropprice);
    });

</script>
<script>
    $(document).on("click", '.buy_now_button', function (e) {
        var sku = $(this).data('sku');
        var idProduct = $(this).data('id');
        var nameProduct = $(this).data('name');
        var inventory = $(this).data('inventory');
        var price = $(this).data('retailprice');
        $(".quantity_buy_now").attr('max', inventory);
        $(".id_product_buy_now").val(idProduct);
        $(".name_product_buy_now").val(nameProduct);
        $(".price_buy_now").val(price);

    });

</script>
<script>
    function addCart() {
        var idProduct = document.getElementById('product_id_cart').value;
        var idStaff = document.getElementById('staff_id_cart').value;
        var idStore = document.getElementById('store_id_cart').value;
        var quantity = document.getElementById('product_quantity_cart').value;
        var finalPrice = document.getElementById('product_price_cart').value;
        var note = document.getElementById('product_note_cart').value;
        var maxQuantity = document.getElementById("product_quantity_cart").max;
        if (new Number(quantity) <= new Number(maxQuantity) && new Number(quantity) > 0) {
            $.ajax({
                url: '../dao/ajax-add-shopping-cart.php', //This is the current doc
                type: "POST",
                data: ({idProduct: idProduct, idStore: idStore, idStaff: idStaff, finalPrice: finalPrice, quantity: quantity, note: note}),
                success: function (data) {
                    console.log(data);
                    if (data === 'success') {
                        $('#notifySuccessModal').modal();
                        $('#addCartModal').modal('hide');
                    } else {
                        $('#notifyErrorModal').modal();
                    }
                }
            });
        }



    }
</script>
<script>
    function buyNow() {
        var idStore = <?php echo $_idStore; ?>;
        var idStaff = <?php echo $_idStaff; ?>;
        var orderStatus = 2;
        var idProduct = document.getElementById('id_product_buy_now').value;
        var idExpress = document.getElementById('bill_express_buy_now').value;
        var linkExpress = document.getElementById('file_express_buy_now').value;
        var ecommerceLevel = document.getElementById('ecommerce_level_buy_now').value;
        var buyerName = document.getElementById('buyer_name_buy_now').value;
        var buyerPhone = document.getElementById('buyer_phone_buy_now').value;
        var buyerAddress = document.getElementById('buyer_address_buy_now').value;
        var buyerEmail = document.getElementById('buyer_email_buy_now').value;
        var note = document.getElementById('note_buy_now').value;

        var finalPrice = document.getElementById('price_buy_now').value;
        var quantity = document.getElementById('quantity_buy_now').value;
        var maxQuantity = document.getElementById("quantity_buy_now").max;

        if (new Number(quantity) <= new Number(maxQuantity)) {
            $.ajax({
                url: '../dao/ajax-add-bill-buy-now.php', //This is the current doc
                type: "POST",
                data: ({idProduct: idProduct, idStore: idStore, idStaff: idStaff, idExpress: idExpress,
                    linkExpress: linkExpress, ecommerceLevel: ecommerceLevel, buyerName: buyerName, buyerPhone: buyerPhone,
                    buyerAddress: buyerAddress, buyerEmail: buyerEmail, note: note, orderStatus: orderStatus,
                    quantity: quantity, finalPrice: finalPrice}),
                success: function (data) {
                    console.log(data);
                   if (data === 'success') {
                        $('#notifySuccessModal').modal();
                        $('#buyNowModal').modal('hide');
                        location.reload();
                    } else {
                        $('#notifyErrorModal').modal();
                    }

                }
            });
        }



    }
</script>
</body>

</html>