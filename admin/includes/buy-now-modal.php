<div class="modal fade" id="buyNowModal" tabindex="-1" role="dialog" aria-labelledby="buyNowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;">Đặt Hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">

                    <div class="container">
                        <div class="row" style="background: white">

                            <div class="col" style="border-right-style:dotted;padding-top: 2px;border-width: 1px;">
                                <div class="form-group">
                                    <label style="color: blue"> Mã sản phẩm </label>
                                    <input type="text" id="id_product_buy_now" name="id_product_buy_now" readonly="readonly" class="form-control id_product_buy_now" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Tên sản phẩm </label>
                                    <input type="text" id="name_product_buy_now" name="name_product_buy_now" readonly="readonly" class="form-control name_product_buy_now" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Mã vận đơn </label>
                                    <input type="text" id="bill_express_buy_now" name="bill_express_buy_now" class="form-control bill_express_buy_now" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> File vận chuyển (Link)</label>
                                    <input type="text" id="file_express_buy_now" name="file_express_buy_now" class="form-control file_express_buy_now" placeholder="Link file vận chuyển">
                                </div>

                                <div class="form-group">
                                    <label style="color: blue"> Số lượng </label>
                                    <input type="number" id="quantity_buy_now" name="quantity_buy_now" min="0" class="form-control quantity_buy_now" placeholder="" value="0"
                                <div class="form-group">
                                    <label style="color: blue"> Giá </label>
                                    <input type="number" name="price_buy_now" id="price_buy_now" min="0" readonly="readonly" class="form-control price_buy_now" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Đối tác vận chuyển </label>
                                    <select id="ecommerce_level_buy_now" name="ecommerce_level_buy_now" class="form-control ecommerce_level_buy_now" id="ecommerce_level_cart">
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

                            </div>
                            <div class="col" style="padding-top: 2px;">
                                <div class="form-group">
                                    <label style="color: blue">Tên Người Mua </label>
                                    <input type="text" id="buyer_name_buy_now" name="buyer_name_buy_now" class="form-control buyer_name_buy_now" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">SĐT</label>
                                    <input type="number" id="buyer_phone_buy_now" name="buyer_phone_buy_now" class="form-control buyer_phone_buy_now" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Địa chỉ</label>
                                    <input type="text" id="buyer_address_buy_now" name="buyer_address_buy_now" class="form-control buyer_address_buy_now" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Email</label>
                                    <input type="email" id="buyer_email_buy_now" name="buyer_email_buy_now" class="form-control buyer_email_buy_now" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Chú thích </label>
                                    <textarea type="text" id="note_buy_now" name="note_buy_now" rows="6" class="form-control note_buy_now" placeholder=""></textarea>
                                </div>

                            </div>
                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="buyNow()" name="buy_now_btn" class="btn btn-success">Mua ngay</button>
                </div>

        </div>
    </div>
</div>