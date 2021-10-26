<?php
include './includes/session-check-admin.php';
$nameStore = $_SESSION['nameStore'];
include('includes/header_1.php');
include('includes/navbar_admin_store.php');
include '../notify-msg/warning_confirm-modal.php';
include '../dao/ProductsDAO.php';
include '../dao/StoreDAO.php';
$_idUser = $_SESSION['idUser'];
$_idStore = '';
if (isset($_POST['store_id'])) {
    $_idStore = $_POST['store_id'];
    $_SESSION['storeId'] = $_idStore;
} else {
    if (isset($_SESSION['storeId'])) {
        $_idStore = $_SESSION['storeId'];
    }
}
$storeDAO = new StoreDAO();
$store = $storeDAO->get_store_info_by_id_store($_idUser, $_idStore);
?>

<!-- Begin Page Content -->

<!-- container-fluid -->

<div class="container-fluid">
    <div class="card shadow mb-4"><div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" >THÔNG TIN CỬA HÀNG 
            </h6>
        </div>
        <div class="card-body">

            <div class="modal-body">
                <div class="form-group">
                    <label style="color: blue"> Mã cửa hàng   </label>
                    <input type="text" id="store_id" name="store_id" readonly="readonly" class="form-control store_id" placeholder="" value="<?php echo $store[0]['idStore']; ?>">
                </div>
                <div class="form-group">
                    <label style="color: blue"> Tên cửa hàng   </label>
                    <input type="text" id="store_name" name="store_name" class="form-control store_name" placeholder="" value="<?php echo $store[0]['nameStore']; ?>">
                </div>
                <div class="form-group">
                    <label style="color: blue"> SĐT </label>
                    <input type="number" id="store_phone" name="store_phone" class="form-control store_phone" placeholder="" value="<?php echo $store[0]['phone']; ?>">
                </div>
                <div class="form-group">
                    <label style="color: blue"> Email </label>
                    <input type="email" id="store_email" name="store_email" class="form-control store_email" placeholder="" value="<?php echo $store[0]['email']; ?>">
                </div>
                <div class="form-group">
                    <label style="color: blue"> Địa chỉ </label>
                    <input type="text" id="store_addr" name="store_addr" class="form-control store_addr" placeholder="" value="<?php echo $store[0]['address']; ?>">
                </div>
                <div class="form-group">
                    <label style="color: blue"> Phân loại hàng hóa ( Ex: Màu sắc,Size...)
                        * Ngăn cách bằng dấu phẩy</label>
                    <input type="text" id="store_option_category" name="store_option_category" class="form-control store_option_category" placeholder="" value="<?php echo $store[0]['optionCategory']; ?>">
                </div>
                <div class="form-group">
                    <label style="color: blue"> Mô tả </label>
                    <textarea type="text" id="store_description" name="store_description" rows="16" class="form-control store_description" placeholder=""  ><?php echo $store[0]['description']; ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" onclick="update()" name="update_btn" class="btn btn-primary update_btn"> Cập nhật </button>
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
<script>
    function update() {
        $('#notifyAcceptlModal').modal('show');
    }
</script>
<script>
    function executeConfirmModal(){
        var store_id = document.getElementById('store_id').value;
        var store_name = document.getElementById('store_name').value;
        var store_phone = document.getElementById('store_phone').value;
        var store_email = document.getElementById('store_email').value;
        var store_addr = document.getElementById('store_addr').value;
        var store_option_category = document.getElementById('store_option_category').value;
        var store_description = document.getElementById('store_description').value;
        $.ajax({
            url: '../dao/update_store.php', //This is the current doc
            type: "POST",
            data: ({store_id: store_id, store_name: store_name, store_phone: store_phone, store_email: store_email,
                store_addr: store_addr, store_option_category: store_option_category, store_description: store_description, }),
            success: function (data) {
                $("#notifyAcceptlModal").modal('hide');
            }
        });
    }
</script>

</body>

</html>