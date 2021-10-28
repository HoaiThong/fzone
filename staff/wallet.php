<?php
include './includes/session-check-admin.php';
$nameStore = $_SESSION['nameStore'];
$categories = $_SESSION['category'];
$_idStore = $_SESSION['storeId'];
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
include './includes/add_product_form.php';
include './includes/edit_product_form.php';
include './includes/delete_modal.php';
?>
<!-- container-fluid -->



<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" >VÍ TIỀN  
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
                        <tr style="background: ghostwhite;">
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
                                <td> <?php echo $value["skuProduct"]; ?></td>
                                <td><img  width="100" height="120" src=" <?php echo $value["iconLink"]; ?>" alt="" /></td>
                                <td> <?php echo $value["nameProduct"]; ?></td>
                                <td><?php echo $value["retailPrices"]; ?></td>
                                <td><?php echo $value["dropPrices"]; ?></td>
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
</body>

</html>