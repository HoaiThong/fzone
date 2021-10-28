<div class="modal fade" id="notifyMsgModal" tabindex="-1" role="dialog" aria-labelledby="notifyMsgModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-weight: bold;color: red"><?php echo $notify_label;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p><?php echo $notify_content;?></p>
                <input type="hidden" name="product_id" value="" class="form-control product_id">
                <input type="hidden" name="store_id" value="" class="form-control store_id">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" onclick="executeConfirmModal()" name="accept_btn" class="btn btn-primary">OK </button>
            </div>

        </div>
    </div>
</div>
