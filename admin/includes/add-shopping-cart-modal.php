<div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;">Thêm giỏ hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label style="color: blue"> Mã sản phẩm  </label>
                    <input type="text" id="product_id_cart" name="product_id" readonly="readonly" class="form-control product_id" placeholder="">
                    <input type="hidden" id="staff_id_cart" name="staff_id" value='<?php echo $_idStaff; ?>' class="form-control staff_id">
                    <input type="hidden" id="store_id_cart" name="store_id" value='<?php echo $_idStore; ?>' class="form-control staff_id">
                </div>
                <div class="form-group">
                    <label style="color: blue">Tên sản phẩm </label>
                    <input type="text" name="product_name" readonly="readonly" class="form-control product_name" placeholder="">
                </div>
                <div class="form-group">
                    <label style="color: blue"> Giá </label>
                    <input type="number" id="product_price_cart" name="product_price" readonly="readonly" class="form-control product_price" placeholder="">
                </div>
                <div class="form-group">
                    <label style="color: blue"> Số lượng </label>
                    <input type="number" value="0" id="product_quantity_cart" min="0"  name="product_quantity" class="form-control product_quantity" placeholder=" ">
                </div>
                <div class="form-group">
                    <label style="color: blue"> Đơn vị tính </label>
                    <input type="text" name="product_unit" readonly="readonly" class="form-control product_unit" placeholder="">
                </div>
                <div class="form-group">
                    <label style="color: blue"> Chú thích </label>
                    <textarea type="text" id="product_note_cart" name="product_note" rows="4" class="form-control product_note" placeholder=""></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" onclick="addCart()" name="add_cart_btn" class="btn btn-primary">Thêm vào giỏ hàng </button>
            </div>

        </div>
    </div>
</div>