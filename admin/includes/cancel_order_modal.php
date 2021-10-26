<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;color: red">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../dao/cancel_order.php" method="POST">

                <div class="modal-body">
                    <p>Bạn chắc chắn muốn hủy đơn hàng này!</p>
                    <input type="hidden" name="order_id" value="" class="form-control order_id">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="cancel_btn" class="btn btn-primary"> Hủy đơn hàng </button>
                </div>
            </form>

        </div>
    </div>
</div>
