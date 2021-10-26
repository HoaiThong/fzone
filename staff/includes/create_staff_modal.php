<div class="modal fade" id="createStaffModal" tabindex="-1" role="dialog" aria-labelledby="createStaffModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;">Thêm nhân viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../dao/create_staff.php" method="POST">

                <div class="modal-body">

                    <input type="hidden" name="store_id" value="" class="form-control store_id">

                    <div class="form-group search-box" >
                        <input type="text" autocomplete="off" class="form-control" name="search_text" id="search_text" placeholder="Nhập số điện thoại tìm kiếm ..." style="background: white;border-color: red" />
                        <div class="result" id="result"></div>
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Mã người dùng  </label>
                        <input type="text" name="user_id" readonly="readonly" class="form-control staff_id" placeholder="">
                        <input type="hidden" name="store_id" value='<?php echo $_idStore;?>' class="form-control store_id">
                        <input type="hidden" name="create_by_user_id" value='<?php echo $_idUser;?>' class="form-control store_id">
                    </div>
                    <div class="form-group">
                        <label style="color: blue">Họ tên </label>
                        <input type="text" name="staff_name" readonly="readonly" class="form-control staff_name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label style="color: blue"> Số điện thoại </label>
                        <input type="text" name="staff_phone" readonly="readonly"  class="form-control staff_phone" placeholder=" ">
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
                    <button type="submit" name="create_btn" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>

        </div>
    </div>
</div>