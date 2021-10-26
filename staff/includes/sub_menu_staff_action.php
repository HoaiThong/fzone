<div class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Thao tác
        </h6>
        <a class="dropdown-item d-flex align-items-center font-weight-bold details_button" 
           href="#"  data-toggle="modal" data-target="#editStaffModal"
           data-idstaff="<?php echo $value["idStaff"]; ?>"
           data-idstore="<?php echo $value["idStore"]; ?>"
           data-phone="<?php echo $value["phone"]; ?>"
           data-email="<?php echo $value["email"]; ?>"
           data-fullname="<?php echo $value["fullName"]; ?>"
           data-note="<?php echo $value["note"]; ?>"
           data-role="<?php echo $value["role"]; ?>"
           >
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fa fa-edit text-white"></i>
                </div>
            </div>
            <div >
                <span>Xem / Sửa thông tin</span>
            </div>
        </a>
        


    </div>
</div>

<script>
    $(document).on("click", '.details_button', function (e) {
        var idStaff = $(this).data('idStaff');
        var idStore = $(this).data('idStore');
        var phone = $(this).data('phone');
        var email = $(this).data('email');
        var fullName = $(this).data('fullName');
        var note = $(this).data('note');
        var role = $(this).data('role');
        $(".staff_id").val(idStaff);
        $(".store_id").val(idStore);
        $(".staff_name").val(fullName);
        $(".staff_phone").val(phone);
        $(".staff_email").val(email);
        $(".staff_description").val(note);
        $(".staff_role").val(role);
    }

    });

</script>



