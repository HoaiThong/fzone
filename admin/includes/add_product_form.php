<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;">Thêm sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../dao/create_product.php" method="POST">

                <div class="modal-body">

                    <div class="container">
                        <div class="row" style="background: white">

                            <div class="col" style="border-right-style:solid;padding-top: 8px;border-width: 1px;">
                                <div class="form-group">
                                    <label style="color: blue">Hình ảnh minh họa </label>
                                    <input type="text" name="product_img_link" class="form-control product_img_link" placeholder="Link Google Driver">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Thư viện ảnh tham khảo </label>
                                    <input type="text" name="product_img_source" class="form-control product_img_source" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">SKU </label>
                                    <input type="text" name="product_sku" class="form-control product_sku" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Tên Sản Phẩm </label>
                                    <input type="text" name="product_name" class="form-control product_name" placeholder=" ">
                                </div>

                                <div class="form-group">
                                    <label style="color: blue"> Mô tả </label>
                                    <textarea type="text" name="product_description" rows="6" class="form-control product_description" placeholder=""></textarea>
                                </div>

                            </div>
                            <div class="col" style="padding-top: 8px;">
                                <div class="form-group">
                                    <label style="color: blue">Giá bán lẻ </label>
                                    <input type="number" name="product_retail_price" class="form-control product_retail_price" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Giá Dropship</label>
                                    <input type="number" name="product_dropship_price" class="form-control product_dropship_price" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Giá bán buôn</label>
                                    <input type="number" name="produc_wholesale" class="form-control produc_wholesale" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Số lượng</label>
                                    <input type="number" name="product_quantity" class="form-control product_quantity" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Đơn vị tính</label>
                                    <input type="text" name="product_unit_product" class="form-control product_unit_product" placeholder="">
                                </div>
                                <?php
                                for ($index1 = 0; $index1 < count($arrayCategories); $index1++) {
                                    ?>
                                    <div class="form-group">
                                        <label style="color: blue"><?php echo $arrayCategories[$index1] ?></label>
                                        <?php echo '<input type="text" name="category_' . $index1 . '" class="form-control ' . 'product_category_' . $index1 . '" placeholder="">'; ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="create_btn" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>

        </div>
    </div>
</div>