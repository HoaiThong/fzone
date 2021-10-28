<?php
include './includes/session-check-admin.php';
$nameStore = $_SESSION['nameStore'];
$categories = $_SESSION['category'];
$_idStore = $_SESSION['storeId'];
$_idStaff = $_SESSION['staffId'];
include('includes/header_1.php');
include('includes/navbar_admin_store.php');
include '../notify-msg/warning_confirm-modal.php';
include '../dao/functions.php';
include '../dao/CartDAO.php';
?>
<?php
$arrayCategories = explode(',', $categories);
$cartDAO = new CartDAO();
$arrayCart = $cartDAO->get_array_cart($_idStaff);
$sumCart = 0;
?>
<!-- Begin Page Content -->
<?php
include './includes/delete_modal.php';
include '../notify-msg/notify-success-modal.php';
include '../notify-msg/notify-error-modal.php';
?>
<!-- container-fluid -->



<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" >GIỎ HÀNG  
                <!--                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal" style="margin-left:  40px;">
                                    + Thêm sản phẩm 
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile" style="background: white;color: black;margin-left:  10px;border-color: blue">
                                    <i class="fa fa-upload" style="color:red"></i>  Tải lên hàng loạt 
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile" style="background: white;color: black;margin-left:  10px;border-color: blue">
                                    <i class="fa fa-download" style="color:violet"></i>  Tải xuống hàng loạt 
                                </button>-->

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
                            <?php
                            for ($index = 0; $index < count($arrayCategories); $index++) {
                                ?>
                                <th> <?php echo $arrayCategories[$index] ?></th>
                                <?php
                            }
                            ?>
                            <th> Giá bán</th>
                            <th> Số lượng </th>
                            <th> Đơn vị </th>
                            <th> Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = -1;
                        foreach ($arrayCart as $value) {
                            $i++;
                            $btnName = 'remove_cart_btn' . $i;
                            $sumCart = $sumCart + $value["finalPrice"] * $value["quantity"];
                            ?>
                            <tr style="text-align: center">
                                <td> <?php echo $value["idProduct"]; ?></td>
                                <td> <?php echo $value["skuProduct"]; ?></td>
                                <td><img  width="100" height="120" src=" <?php echo $value["iconLink"]; ?>" alt="" /></td>
                                <td> <?php echo $value["nameProduct"]; ?></td>
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
                                <td style="font-weight: bold;color: black"><?php echo number_format($value["finalPrice"], 0, ',', '.'); ?></td>
                                <td style="font-weight: bold;color: black">
                                    <input type="number" readonly="readonly" min="0" max="<?php echo $value["inventory"]; ?>" name="quantity_cart" class="form-control quantity_cart" placeholder="" value="<?php echo $value["quantity"]; ?>" style="border-color: blue">

                                </td>
                                <td> <?php echo $value["unitProduct"]; ?></td>
                                <td>
                                    <button style="margin-top: 4px" type="submit" onclick="removeCart(<?php echo $i; ?>)"  id="<?php echo $btnName; ?>" name="remove_cart_btn" class="btn btn-primary remove_cart_btn" data-idproduct="<?php echo $value["idProduct"]; ?>" data-quantity="<?php echo $value["quantity"]; ?>"
                                            value="<?php echo $value["idCart"]; ?>" >
                                        Xóa </button>

                                </td>

                            </tr>
                            <?php
                        }
                        ?>


                    </tbody>
                </table>

            </div>
        </div>
        <div class="container card-body card shadow" style="margin-top: 24px;margin-bottom: 24px">
            <div class="row" style="background: white">

                <div class="col" style="border-right-style:dotted;padding-top: 2px;border-width: 1px;">
                    <div class="form-group">
                        <label style="color: blue"> Mã vận đơn </label>
                        <input type="text" id="bill_express_cart" name="bill_express" class="form-control bill_express_cart" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> File vận chuyển (Link)</label>
                        <input type="text" id="file_express_cart" name="file_express" class="form-control file_express_cart" placeholder="Link file vận chuyển">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Đối tác vận chuyển </label>
                        <select name="ecommerce_level_cart" class="form-control ecommerce_level_cart" id="ecommerce_level_cart">
                            <option value="0"> Tự vận chuyển</option>
                            <option value="1"> Shopee</option>
                            <option value="2"> Lazada</option>
                            <option value="3"> Tiki</option>
                            <option value="4"> Sendo </option>
                            <option value="6"> GHTK </option>
                            <option value="7"> GHN </option>
                            <option value="8"> J&T </option>
                            <option value="9"> Ninja Van </option>
                            <option value="10"> Viettel Post </option>
                            <option value="11"> VN Post </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Chú thích </label>
                        <textarea type="text" id="note_cart" name="note" rows="6" class="form-control note_cart" placeholder=""></textarea>
                    </div>

                </div>
                <div class="col" style="padding-top: 2px;">
                    <div class="form-group">
                        <label style="color: blue">Tên Người Mua </label>
                        <input type="text" id="buyer_name_cart" name="buyer_name" class="form-control buyer_name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue">SDT</label>
                        <input type="number" id="buyer_phone_cart" name="buyer_phone" class="form-control buyer_phone" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue">Email</label>
                        <input type="email" id="buyer_email_cart" name="buyer_email_cart" class="form-control buyer_email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue">Địa chỉ</label>
                        <input type="text" id="buyer_address_cart" name="buyer_address" class="form-control buyer_address_cart" placeholder="">
                    </div>
                </div>
            </div>
            <!--            <div class="row ">
                            <div class="col-sm-4" ></div>
                            <div class="col-sm-4" ></div>
                            <div class="col-sm-4 card shadow mb-4" ><div class="card-body row">
                                    <div class="text-center my-auto">
                                        <span class="col-xl-3 col-md-6 mb-4">  
                                            <button type="submit" onclick="" name="btn" class="btn btn-success"><i class="fas fas-close"></i>Đặt hàng </button>
                                        </span>
                                        <span class="col-xl-3 col-md-6 mb-4" style="color: black">Tổng tiền:</span>
                                        <span class="col-xl-3 col-md-6 mb-4" style="color: red"></span>
            
                                    </div>
                                </div></div>
                        </div>-->
        </div>
    </div>
    <div class="row ">
        <div class="col-sm-4" ></div>
        <div class="col-sm-4" ></div>
        <div class="col-sm-4 card shadow mb-4" ><div class="card-body row">
                <div class="text-center my-auto">
                    <span class="col-xl-3 col-md-6 mb-4"> 
                        <button type="submit" id="payment_cart_btn" onclick="printf()" name="btn" class="btn btn-success payment_cart_btn" data-idstaff="<?php echo $_idStaff; ?>" data-idstore="<?php echo $_idStore; ?>" ><i class="fas fas-close"></i>Đặt hàng </button>
                    </span>
                    <span class="col-xl-3 col-md-6 mb-4" style="color: black">Tổng tiền:</span>
                    <span class="col-xl-3 col-md-6 mb-4" style="color: red;font-weight: bold"><?php echo number_format($sumCart, 0, ',', '.'); ?></span>

                </div>
            </div></div>
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
    function removeCart(number) {
        var idCart = document.getElementById("remove_cart_btn" + number).value;
        var idProduct = document.getElementById("remove_cart_btn" + number).getAttribute("data-idproduct");
        var quantity = document.getElementById("remove_cart_btn" + number).getAttribute("data-quantity");
        $.ajax({
            url: '../dao/ajax-remove-cart.php', //This is the current doc
            type: "POST",
            data: ({idCart: idCart, idProduct: idProduct, quantity: quantity}),
            success: function (data) {
                console.log(data);
                if (data === 'success') {
                    location.reload();
                } else {
                    alert(data);
                }

                //or if the data is JSON
//                var jdata = jQuery.parseJSON(data);

            }
        });
    }
</script>
<script>
    function printf() {
        window.print();
    }
</script>

<script>
    function payment() {
        $('#notifyAcceptlModal').modal('show');
    }
</script>
<script>
    function executeConfirmModal() {
        var idStaff = <?php echo $_idStaff; ?>;
        var idStore = <?php echo $_idStore; ?>;
        var orderStatus = 2;
        var buyerName = document.getElementById('buyer_name_cart').value;
        var buyerPhone = document.getElementById('buyer_phone_cart').value;
        var buyerAddress = document.getElementById('buyer_address_cart').value;
        var buyerEmail = document.getElementById('buyer_email_cart').value;
        var idExpress = document.getElementById('bill_express_cart').value;
        var linkExpress = document.getElementById('file_express_cart').value;
        var ecommerceLevel = document.getElementById('ecommerce_level_cart').value;
        var note = document.getElementById('note_cart').value;
//      
        $.ajax({
            url: '../dao/ajax-add-bill.php', //This is the current doc
            type: "POST",
            data: ({idStaff: idStaff, idStore: idStore, orderStatus: orderStatus, buyerName: buyerName,
                buyerPhone: buyerPhone, buyerAddress: buyerAddress, buyerEmail: buyerEmail, idExpress: idExpress,
                linkExpress: linkExpress, ecommerceLevel: ecommerceLevel, note: note}),
            success: function (data) {
                console.log(data);
//                alert(data);
                if (data === 'success') {
                    $('#notifyAcceptlModal').modal('hide');
                    location.reload();
                } else {
                    $('#notifyAcceptlModal').modal('hide');
                    $('#notifyErrorModal').modal();
                }
            }
        });
    }
</script>
</body>

</html>