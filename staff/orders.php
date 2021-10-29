<?php
include './includes/session-check-admin.php';
$nameStore = $_SESSION['nameStore'];
$_idStore = $_SESSION['storeId'];
$_idStaff = $_SESSION['staffId'];
include('includes/header_1.php');
include('includes/navbar_admin_store.php');
include '../dao/BillDAO.php';
include '../dao/functions.php';
?>
<?php
include('includes/edit_order_form.php');
include('includes/cancel_order_modal.php');
$funcs = new Functions();
?>
<!-- Begin Page Content -->

<!-- container-fluid -->

<?php
$billDAO = new BillDAO();
$arrayBills = $billDAO->get_array_order_on_store($_idStore);
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" >ĐƠN HÀNG  


            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr style="background-color: #1cc88a;color: white;">
                            <th> </th>
                            <th> Mã đơn hàng </th>
                            <th> Mã vận đơn </th>
                            <th> File vận chuyển </th>
                            <th> Người mua  </th>
                            <th> SĐT </th>
                            <th> Địa chỉ nhận hàng </th>
                            <th> Chú thích </th>
                            <th> Tình trạng </th>
                            <th> Ngày tạo </th>
                            <th> Action</th>
                            <!--<th> Hành động</th>-->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr style="background-color: #1cc88a;color: white;">
                            <th> </th>
                            <th> Mã đơn hàng </th>
                            <th> Mã vận đơn </th>
                            <th> File vận chuyển </th>
                            <th> Người mua  </th>
                            <th> SĐT </th>
                            <th> Địa chỉ nhận hàng </th>
                            <th> Chú thích </th>
                            <th> Tình trạng </th>
                            <th> Ngày tạo </th>
                            <th>Action</th>
                            <!--<th> Hành động</th>-->
                        </tr>
                    </tfoot>
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

<script>
    $(document).on("click", '.details_button', function (e) {
        var idbill = $(this).data('idbill');
        var idExpress = $(this).data('idexpress');
        var linkExpress = $(this).data('linkexpress');
        var note = $(this).data('note');
        var createat = $(this).data('createat');
        var buyername = $(this).data('buyername');
        var buyeradd = $(this).data('buyeradd');
        var buyeremail = $(this).data('buyeremail');
        var buyernphone = $(this).data('buyernphone');
        $(".bill_id").val(idbill);
        $(".bill_express").val(idExpress);
        $(".file_express").val(linkExpress);
        $(".create_at").val(createat);
        $(".buyer_name").val(buyername);
        $(".buyer_address").val(buyeradd);
        $(".buyer_email").val(buyeremail);
        $(".buyer_phone").val(buyernphone);
        $.ajax({
            url: '../dao/ajax-bill-details.php', //This is the current doc
            type: "POST",
            data: ({idBill: idbill}),
            success: function (data) {
                console.log(data);
                $(".note").val(data);
                //or if the data is JSON
//                var jdata = jQuery.parseJSON(data);

            }
        });


    });

</script>
<script>
    /* Formatting function for row details - modify as you need */
    function format(d) {
        const myJSON = JSON.parse(d.array_product);

        var html = '<table cellpadding="5" cellspacing="0" border="1" style="padding-left:50px;">' +
                '<tr style="background-color: #04AA6D;color: white;">' +
                '<td > Mã sản phẩm  </td>' +
                '<td> Mã SKU  </td>' +
                '<td> Tên sản phẩm  </td>' +
                '<td> Giá </td>' +
                '<td> Số lượng </td>';
        const myObj = JSON.parse(myJSON[0].category);


        for (const x in myObj) {
            html += '<td>' + x + '</td>';
        }
        html += '</tr>';
        for (let i = 0; i < myJSON.length; i++) {
            html += '<tr>' +
                    '<td>' + myJSON[i].idProduct + '</td>' +
                    '<td>' + myJSON[i].skuProduct + '</td>' +
                    '<td>' + myJSON[i].nameProduct + '</td>' +
                    '<td>' + myJSON[i].finalPrice + '</td>' +
                    '<td>' + myJSON[i].quantity + '</td>';
            const jsonCategory = JSON.parse(myJSON[i].category);
            for (const y in jsonCategory) {
                html += '<td>' + jsonCategory[y] + '</td>';
            }
        }
        html += '</tr>' + '</table>';
        return html;
    }

    $(document).ready(function () {
        var table = $('#example').DataTable({
//            "ajax": "../dao/ajax-bill-details_1.php",
            "ajax": {
                "url": "../dao/ajax-array-bills_by_staff.php",
                "type": "POST",
                "data": ({idStore: <?php echo $_idStore; ?>, idStaff: <?php echo $_idStaff; ?>}),
            },
            "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "idBill"},
                {"data": "idExpress"},
                {
                    "data": "linkExpress",
                    "render": function (data, type, row, meta) {
                        if (type === 'display') {
                            data = '<a href="' + data + '">' + 'Link' + '</a>';
                        }
                        return data;
                    }
                },
                {"data": "buyerName"},
                {"data": "buyerPhone"},
                {"data": "buyerAddress"},
                {"data": "note"},
                {
                    "data": "orderStatus",
                    "render": function (data, type, row, meta) {
                        switch (data) {
                            case '1':
                                return '<strong style="color: black;">Đã xác nhận</strong>';
                            case '10':
                                return '<strong style="color: black;">Đã in file vận chuyển</strong>';
                            case '11':
                                return '<strong style="color: black;">Đã giao vận chuyển</strong>';
                            case '2':
                                return '<strong style="color: green;">Chờ xác nhận</strong>';
                            case '3':
                                return '<strong style="color: red;">Hủy</strong>';
                            case '30':
                                return '<strong style="color: red;">Yêu cầu hủy </strong>';
                            case '31':
                                return '<strong style="color: red;">Đã hủy </strong>';
                        }
                        return data;
                    }
                },
                {"data": "createAt"},
                {
                    "data": "orderStatus",
                    "name": "ActionBill",
                    "render": function (value, type, row, meta) {
                        var sel = $('<select  id="action-bill" />')
                                .addClass("form-control action-bill")
                                .attr("name", "ActionBill")
                                .append($("<option disabled selected/>", {text: "Chọn", value: "0"}))
                                .append($("<option/>", {text: "Hủy", value: "30"}))[0];

                        $(sel.options).each(function () {
                            if (value == '31') {
                                if (this.value == "3") {
                                    this.disabled = true;
                                }
                            }

                        });

                        return sel.outerHTML;
                    },
                    "autoWidth": true
                }

            ],

            "order": [[1, 'DESC']]
        });

        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });

        // thực hiện hành động hủy đơn hàng qua button 
        $('#example').on('click', 'button.cancel-btn', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var idBill = row.data().idBill;
            $.ajax({
                url: '../dao/cancel_order.php', //This is the current doc
                type: "POST",
                data: ({idBill: idBill}),
                success: function (data) {
                    console.log(data);
                    if (data === 'success') {
                        location.reload();
                    } else {
                        alert(data);
                    }

                    //or if the data is JSON
//                var jdata = jQuery.parseJSON(data);

                }
            });
        });

        $('#example').on('change', 'select.action-bill', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var idBill = row.data().idBill;
            var action = this.value;
            actionbill(action, idBill);
        });


    });
</script>
<script>
    $(document).ready(function () {
        $('.cancel_button').on('click', function () {
            $('#cancelOrderModal').modal('show');
            var idBill = $(this).data('idbill');
            $(".order_id").val(idBill);
        });
    });


</script>
<script>
    function actionbill(action, idBill) {

        switch (action) {
            case '10':
                window.print();
                clearSelected();
//                alert(idBill);
                break;
            case '30':
                update_bill_status(idBill, action);
                location.reload();
                break;
            case '3':
                cancel_bill(idBill);
                clearSelected();
                break;
            default:
                clearSelected();
                break;
        }

    }
    function clearSelected() {
        var elements = document.getElementById("action-bill").options;

        for (var i = 0; i < elements.length; i++) {
            elements[i].selected = false;
        }
    }

    function cancel_bill(idBill) {
        $.ajax({
            url: '../dao/cancel_order.php', //This is the current doc
            type: "POST",
            data: ({idBill: idBill}),
            success: function (data) {
                console.log(data);
                if (data === 'success') {
                    location.reload();
                } else {
                    alert(data);
                }

                //or if the data is JSON
//                var jdata = jQuery.parseJSON(data);

            }
        });
    }

    function update_bill_status(idBill, status) {
        $.ajax({
            url: '../dao/update-order-status.php', //This is the current doc
            type: "POST",
            data: ({idBill: idBill, status: status}),
            success: function (data) {
                console.log(data);
                if (data === 'success') {
                    alert(data);
                } else {
                    alert(data);
                }
                clearSelected();
                //or if the data is JSON
//                var jdata = jQuery.parseJSON(data);

            }
        });
    }
</script>
<script>


</script>

</body>

</html>