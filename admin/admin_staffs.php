<?php
include './includes/session-check-admin.php';
$nameStore = $_SESSION['nameStore'];
$_idStore = $_SESSION['storeId'];
$_idUser = $_SESSION['idUser'];
include('includes/header_1.php');
include('includes/navbar_admin_store.php');
include ('../dao/StaffDAO.php');
include '../dao/functions.php';
$staffDao = new StaffDAO();
$funcs = new Functions();
?>
<?php
include('includes/formStaff.php');
include('includes/edit_staff_form.php');
include('includes/delete_staff_modal.php');
include './includes/create_staff_modal.php';
?>
<!-- Begin Page Content -->

<!-- container-fluid -->


<?php
$arrayStaffs = $staffDao->get_array_staff_on_store($_idStore);
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" > NHÂN VIÊN   
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createStaffModal" style="margin-left:  40px;">
                    + Thêm nhân viên 
                </button>
                <!--                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile" style="background: white;color: black;margin-left:  10px;border-color: blue">
                                    <i class="fa fa-download" style="color:violet"></i>  Tải xuống hàng loạt 
                                </button>-->
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered " id="dataTable" style="width:100%" cellspacing="0">
                    <thead>
                        <tr style="background-color: #04AA6D;color: white;">
                            <th> Mã </th>
                            <th> Họ tên </th>
                            <th> Ngày sinh </th>
                            <th> SDT </th>
                            <th> Email </th>
                            <th> Địa chỉ </th>
                            <th> Quyền hạn </th>
                            <th> Mô tả </th>
                            <th> Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($arrayStaffs as $value) {
                            ?>
                            <tr>
                                <td> <?php echo $value["idStaff"] ?></td>
                                <td> <?php echo $value["fullName"] ?></td>
                                <td> <?php echo $value["dateOfBirth"] ?></td>
                                <td><?php echo $value["phone"] ?></td>
                                <td> <?php echo $value["email"] ?></td>
                                <td><?php echo $value["address"] ?></td>
                                <td style="color: red; font-weight: bold"><?php echo $funcs->get_role_staff($value["role"]) ?></td>
                                <td><?php echo $value["note"] ?></td>
                                <td>
                                    <?php
                                    include('includes/sub_menu_staff_action.php');
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include('includes/footer_1.php');
?>
<script src="cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.details_button').on('click', function () {
            $('#editStaffModal').modal('show');
            var idStaff = $(this).data('idstaff');
            var idStore = $(this).data('idstore');
            var phone = $(this).data('phone');
            var email = $(this).data('email');
            var fullName = $(this).data('fullname');
            var note = $(this).data('note');
            var role = $(this).data('role');
            $(".staff_id").val(idStaff);
            $(".store_id").val(idStore);
            $(".staff_name").val(fullName);
            $(".staff_phone").val(phone);
            $(".staff_email").val(email);
            $(".staff_description").val(note);
            $(".staff_role").val(role);
        });
    });


</script>

<script>
    $(document).ready(function () {
        $('.delete_button').on('click', function () {
            $('#delStaffModal').modal('show');
            var idStore = $(this).data('idStore');
            var idStaff = $(this).data('idStaff');
            $(".store_id").val(idStore);
            $(".staff_id").val(idStaff);
        });
    });


</script>
<script>
    $(document).ready(function () {

        load_data();

        function load_data(query)
        {
            $.ajax({
                url: "../dao/backend-search-staff.php",
                method: "POST",
                data: {phone: query},
                success: function (data)
                {
                    data = data.replace('[', "");
                    data = data.replace(']', "");
                    var obj = JSON.parse(data);
                    $('.staff_id').val(obj.idUser);
                    $('.staff_name').val(obj.fullName);
                    $('.staff_phone').val(obj.phone);
                    $('.staff_email').val(obj.email);
                }
            });
        }
        $('#search_text').keyup(function () {
            var search = $(this).val();
            if (search != '')
            {
                load_data(search);
            } else
            {
                load_data();
            }
        });
    });
</script>

</body>

</html>