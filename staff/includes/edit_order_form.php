<div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;">Cập nhật thông tin sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../dao/edit_order.php" method="POST">

                <div class="modal-body">

                    <div class="container">
                        <div class="row" style="background: white">

                            <div class="col" style="border-right-style:dotted;padding-top: 2px;border-width: 1px;">
                                <div class="form-group">
                                    <label style="color: blue">Mã đơn hàng </label>
                                    <input type="text" name="bill_id" class="form-control bill_id" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Mã vận đơn </label>
                                    <input type="text" name="bill_express" class="form-control bill_express" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> File vận chuyển </label>
                                    <input type="text" name="file_express" class="form-control file_express" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Ngày tạo </label>
                                    <input type="text" readonly="readonly" name="create_at" class="form-control create_at" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Trạng thái </label>
                                    <select name="staff_role" class="form-control staff_role">
                                        <option value="" disabled selected>--Chọn--</option>

                                        <option value="0"> Limit</option>
                                        <option value="1"> Admin</option>
                                        <option value="2"> Quản lý </option>
                                        <option value="3"> Cộng tác viên </option>
                                        <option value="4"> Nhân viên cửa hàng </option>
                                        <option value="5"> Khách hàng </option>
                                        <option value="6"> Dropship </option>
                                    </select>
                                </div>

                            </div>
                            <div class="col" style="padding-top: 2px;">
                                <div class="form-group">
                                    <label style="color: blue">Tên Người Mua </label>
                                    <input type="text" name="buyer_name" class="form-control buyer_name" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">SDT</label>
                                    <input type="number" name="buyer_phone" class="form-control buyer_phone" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Địa chỉ</label>
                                    <input type="text" name="buyer_address" class="form-control buyer_address" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue">Email</label>
                                    <input type="email" name="buyer_email" class="form-control buyer_email" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label style="color: blue"> Chú thích </label>
                                    <textarea type="text" name="note" rows="6" class="form-control note" placeholder=""></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row" style="border-top-style:dotted;padding-top: 8px;border-width: 1px;">
                            <div class="form-group" style="width:100%">
                                <label style="color: blue;font-weight: bold">Danh sách sản phẩm </label>
                                <table style="width:100%" class="list_product_order_tbl" id="list_product_order_tbl">
                                    <thead>
                                        <tr style="border-bottom: 1px solid #dddddd;text-align: left;padding: 8px;color: black">
                                            <th>Sản phẩm</th>
                                            <th>Số lượng mua</th>
                                            <th>Giá bán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--                                        Table data will be here-->
                                    </tbody>
                                </table>
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