<div class="modal fade" id="createStoreModal" tabindex="-1" role="dialog" aria-labelledby="createStoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;font-weight: bold;">Thêm sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../dao/create_store.php" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label style="color: blue"> Tên cửa hàng   </label>
                        <input type="text" name="store_name" class="form-control store_name" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> SDT </label>
                        <input type="number" name="store_phone" class="form-control store_phone" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Email </label>
                        <input type="email" name="store_email" class="form-control store_email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Địa chỉ </label>
                        <input type="text" name="store_addr" class="form-control store_addr" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Mô tả </label>
                        <textarea type="text" name="store_description" rows="6" class="form-control store_description" placeholder=""></textarea>

                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Phân loại hàng hóa ( Ex: Màu sắc,Size...)
                            * Ngăn cách bằng dấu phẩy</label>
                        <input type="text" name="store_option_category" class="form-control store_option_category" placeholder="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="create_btn" class="btn btn-primary"> Tạo cửa hàng </button>
                </div>
            </form>

        </div>
    </div>
</div>