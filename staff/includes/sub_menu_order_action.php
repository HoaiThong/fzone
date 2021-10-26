<div class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Thao tác
        </h6>
        <a class="dropdown-item d-flex align-items-center font-weight-bold details_button" href="#"  data-toggle="modal" data-target="#editOrderModal" onclick="myFunction()"
           data-idbill="<?php echo $value["idBill"]; ?>"
           data-idexpress="<?php echo $value["idExpress"]; ?>"
           data-linkexpress="<?php echo $value["linkExpress"]; ?>"
           data-note="<?php echo $value['note']; ?>"
           data-createat="<?php echo $value["createAt"]; ?>"
           data-buyername="<?php echo $value["buyerName"]; ?>"
           data-buyeradd="<?php echo $value["buyerAddress"]; ?>"
           data-buyeremail="<?php echo $value["buyerEmail"]; ?>"
           data-buyernphone="<?php echo $value["buyerPhone"]; ?>"
           >
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>

                <span class="font-weight-bold">Xem / Sửa thông tin</span>
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center font-weight-bold cancel_button" href="#"  data-toggle="modal" data-target="#cancelOrderModal"
           data-idbill="<?php echo $value["idBill"]; ?>">
            <div class="mr-3">
                <div class="icon-circle bg-danger" >
                    <i class="fas fa-trash" style="color: white"></i>
                </div>
            </div>
            <div >
                <span>Hủy Nhanh</span>
            </div>
        </a>

    </div>
</div>