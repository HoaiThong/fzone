<div class="modal fade" id="delStaffModal" tabindex="-1" role="dialog" aria-labelledby="delStaffModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;color: red">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../dao/delete_staff.php" method="POST">

                <div class="modal-body">
                    <p>Bạn chắc chắn muốn xóa!</p>
                    <input type="hidden" name="staff_id" value="" class="form-control staff_id">
                    <input type="hidden" name="store_id" value="" class="form-control store_id">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="delete_btn" class="btn btn-primary">Xóa </button>
                </div>
            </form>

        </div>
    </div>
</div>
