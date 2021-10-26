<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;">Cập nhật thông tin sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../dao/edit_product.php" method="POST">

                <div class="modal-body">

                    <div class="container">
                        <div class="row" style="background: white">
                            <div class="col" style="border-right-style:solid;padding-top: 8px;border-width: 1px;">
                                <input type="hidden" name="product_id" value="" class="form-control product_id">
                                <input type="hidden" name="store_id" value="" class="form-control store_id">
                                <div class="form-group">
                                    <img height="400" width="300" style="display: block;margin-left: auto; margin-right: auto;" class="center product_img_banner" src="" alt="" />
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Hình ảnh minh họa </label>
                                    <input type="text" name="product_img_link" class="form-control product_img_link" placeholder="Link Google Driver">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Thư viện ảnh tham khảo </label>
                                    <input type="text" name="product_img_source" class="form-control product_img_source" placeholder="">
                                </div>
                            </div>
                            <div class="col" style="border-right-style:solid;padding-top: 8px;border-width: 1px;">
                                <div class="form-group">
                                    <label style="color: blue">SKU </label>
                                    <input type="text" name="product_sku" class="form-control product_sku" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Tên Sản Phẩm </label>
                                    <input type="text" name="product_name" class="form-control product_name" placeholder="Tên sản phẩm ">
                                </div>
                                
                                <div class="form-group">
                                    <label style="color: blue"> Mô tả </label>
                                    <textarea type="text" name="product_description" rows="6" class="form-control product_description" placeholder=""></textarea>
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
                            <div class="col" style="padding-top: 8px;">
                                <div class="form-group">
                                    <label style="color: blue">Giá bán lẻ </label>
                                    <input type="number" name="product_retail_price" class="form-control product_retail_price" placeholder="Giá bán lẻ">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Giá Dropship</label>
                                    <input type="number" name="product_dropship_price" class="form-control product_dropship_price" placeholder="Số lượng">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Giá bán buôn</label>
                                    <input type="number" name="produc_wholesale" class="form-control produc_wholesale" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Số lương</label>
                                    <input type="number" name="product_quantity" class="form-control product_quantity" placeholder="Số lượng">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Đơn vị tính</label>
                                    <input type="text" name="product_unit_product" class="form-control product_unit_product" placeholder="Số lượng">
                                </div>
                            </div>
                        </div>
                    </div>

                   

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_btn" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>

        </div>
    </div>
</div>