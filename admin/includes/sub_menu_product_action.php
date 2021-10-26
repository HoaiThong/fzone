<?php
$str = $value["category"];
$str = str_replace('"', '', $str);
$str = str_replace('{', '', $str);
$str = str_replace('}', '', $str);
?>
<div class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Thao tác
        </h6>
        <a class="dropdown-item d-flex align-items-center font-weight-bold details_button" href="#"  data-toggle="modal" data-target="#myModal"
           data-id="<?php echo $value["idProduct"]; ?>"
           data-idstore="<?php echo $value["idStore"]; ?>"
           data-sku="<?php echo $value["skuProduct"]; ?>"
           data-img="<?php echo $value['iconLink']; ?>"
           data-name="<?php echo $value["nameProduct"]; ?>"
           data-description="<?php echo $value['description']; ?>"
           data-imagesource="<?php echo $value["imageSource"]; ?>"
           data-retailprice="<?php echo $value["retailPrices"]; ?>"
           data-dropprice="<?php echo $value["dropPrices"]; ?>"
           data-wholesaleprices="<?php echo $value["wholesalePrices"]; ?>"
           data-inventory="<?php echo $value["inventory"]; ?>"
           data-unitproduct="<?php echo $value["unitProduct"]; ?>"
           data-categorystore="<?php echo $categories; ?>"
           data-category="<?php echo $str; ?>">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fa fa-edit text-white"></i>
                </div>
            </div>
            <div >
                <span>Xem / Sửa thông tin</span>
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center font-weight-bold add_cart_btn" href="#"  data-toggle="modal" data-target="#addCartModal"
           data-idproduct="<?php echo $value["idProduct"]; ?>"
           data-idstaff="<?php echo $_idStaff; ?>"
           data-idstore="<?php echo $_idStore; ?>"
           data-name="<?php echo $value["nameProduct"]; ?>"
           data-retailprice="<?php echo $value["retailPrices"]; ?>"
           data-dropprice="<?php echo $value["dropPrices"]; ?>"
           data-wholesaleprices="<?php echo $value["wholesalePrices"]; ?>"
           data-inventory="<?php echo $value["inventory"]; ?>"
           data-unitproduct="<?php echo $value["unitProduct"]; ?>"
           >
            <div class="mr-3">
                <div class="icon-circle bg-secondary" >
                    <i class="fas fa-cart-plus" style="color: white"></i>
                </div>
            </div>
            <div >
                <span>Thêm vào giỏ hàng</span>
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center font-weight-bold buy_now_button" href="#"  data-toggle="modal" data-target="#buyNowModal"
           data-id="<?php echo $value["idProduct"]; ?>"
           data-sku="<?php echo $value["skuProduct"]; ?>"
           data-name="<?php echo $value["nameProduct"]; ?>"
           data-inventory="<?php echo $value["inventory"]; ?>"
           data-retailprice="<?php echo $value["retailPrices"]; ?>"
           >
            <div class="mr-3">
                <div class="icon-circle bg-warning" >
                    <i class="fas fa-shopping-cart" style="color: white"></i>
                </div>
            </div>
            <div >
                <span>Mua ngay</span>
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center font-weight-bold delete_button" href="#"  data-toggle="modal" data-target="#delModal"
           data-id="<?php echo $value["idProduct"]; ?>"
           data-sku="<?php echo $value["skuProduct"]; ?>">
            <div class="mr-3">
                <div class="icon-circle bg-danger" >
                    <i class="fas fa-trash" style="color: white"></i>
                </div>
            </div>
            <div >
                <span>Xóa</span>
            </div>
        </a>


    </div>
</div>




