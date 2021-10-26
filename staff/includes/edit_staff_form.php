<div class="modal fade" id="editStaffModal" tabindex="-1" role="dialog" aria-labelledby="editStaffModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;">Cập nhật thông tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../dao/edit_staff.php" method="POST">

                <div class="modal-body">

                    <input type="hidden" name="store_id" value="" class="form-control store_id">

                    <div class="form-group">
                        <label style="color: blue"> Mã nhân viên  </label>
                        <input type="text" name="staff_id" readonly="readonly" class="form-control staff_id" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue">Tên Nhân Viên </label>
                        <input type="text" name="staff_name" readonly="readonly" class="form-control staff_name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Số điện thoại </label>
                        <input type="text" name="staff_phone" readonly="readonly" class="form-control staff_phone" placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Email </label>
                        <input type="text" name="staff_email" readonly="readonly" class="form-control staff_email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Mô tả </label>
                        <textarea type="text" name="staff_description" rows="6" class="form-control staff_description" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Quyền hạn </label>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_btn" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>

        </div>
    </div>
</div>