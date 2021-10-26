<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header('Location: login.php');
} else {
    include('includes/header.php');
    include('includes/navbar_admin.php');
    include('includes/create-store-modal.php');
    include '../dao/ProductsDAO.php';
    include '../dao/StoreDAO.php';
    $userName = $_SESSION['userName'];
    $_idUser = $_SESSION['idUser'];
    $_SESSION['cart'] = null;
    $storeDAO = new StoreDAO();
    $arrayStore = $storeDAO->get_array_store_by_idUser($_idUser);
    ?>
    <!-- Begin Page Content -->


    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 store_font create_store_btn" data-toggle="modal" data-target="#createStoreModal">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body" >
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New Store</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <h4>Tạo cửa hàng </h4>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-plus fa-2x " style="color: red"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $a = count($arrayStore);

            if ($a == 0) {
                ?>
            </div>
            <?php
        }
        for ($index = 0; $index < $a; $index++) {

            if ($index % 4 != 2 or $index == 0) {
                $id_store = $arrayStore[$index]['idStore'];
                $id_staff = $arrayStore[$index]['idStaff'];
                ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 store_font" onclick="select(<?php echo $id_store; ?>,<?php echo $id_staff; ?>)" >
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Store: </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                        <h4 style="font-weight: bold"><?php echo $arrayStore[$index]['nameStore']; ?></h4>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <input type="hidden" name="store_id" id="store_id" value='<?php echo $arrayStore[$index]['idStore']; ?>' class="form-control store_id">
                                    <input type="hidden" name="staff_id" id="staff_id" value='<?php echo $arrayStore[$index]['idStaff']; ?>' class="form-control store_id">
                                    <button  type="submit" name="store_btn" class="btn store_btn fa fa-arrow-right" ><i class="fa fa-arrow-right" style="color: red;font-size: 18px"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            if ($index % 4 == 2) {
                $id_store = $arrayStore[$index]['idStore'];
                $id_staff = $arrayStore[$index]['idStaff'];
                ?>
                <div class="col-xl-3 col-md-6 mb-4 store_font" onclick="select(<?php echo $id_store; ?>,<?php echo $id_staff; ?>)">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Store</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <h4 style="font-weight: bold"><?php echo $arrayStore[$index]['nameStore']; ?></h4>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <input type="hidden" name="store_id" id="store_id" value='<?php echo $arrayStore[$index]['idStore']; ?>' class="form-control store_id">
                                    <input type="hidden" name="staff_id" id="staff_id" value='<?php echo $arrayStore[$index]['idStaff']; ?>' class="form-control store_id">
                                    <button  type="submit" name="store_btn" class="btn store_btn fa fa-arrow-right" ><i class="fa fa-arrow-right" style="font-size: 18px;color: red"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <?php
            }
            if ($index == $a - 1) {
                ?>
            </div>
            <?php
        }
    }
    ?>




    <!-- Content Row -->






    </div>
    <!-- End of Main Content -->

    <?php
    include('includes/footer.php');
    ?>

    <script>
        function select(idStore, idStaff) {
            $.ajax({
                url: '../dao/redirect-by-role.php', //This is the current doc
                type: "POST",
                data: ({store_id: idStore, staff_id: idStaff}),
                success: function (data) {
                    switch (data) {
                        case '1':
                            window.location = "../admin/admin_store.php";
                            break;
                        case '0':
                            window.location = "../staff/test.php";
                            break;
                        case '2':
                            window.location = "../staff/test.php";

                            break;
                        default:
                            window.location = "../staff/test.php";
                    }
                }
            });
        }
    </script>
    </body>

    </html>
    <?php
}
?>
