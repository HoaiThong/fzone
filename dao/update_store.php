<?php
//include '../admin/includes/session-check.php';
session_start();
include './StoreDAO.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_idStore = $_POST['store_id'];
    $_nameStore = $_POST['store_name'];
    $_phone = $_POST['store_phone'];
    $_email = $_POST['store_email'];
    $_address = $_POST['store_addr'];
    $_optionCategory = $_POST['store_option_category'];
    $_description = $_POST['store_description'];
    $storeDAO=new StoreDAO();
    $response=$storeDAO->update_store($_idStore, $_nameStore, $_phone, $_email, $_address, $_optionCategory, $_description);
    header("Location: ../admin/admin_store.php");
}
?>
<!--<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <style>
        #myBtn {
            width: 300px;
            padding: 10px;
            font-size:20px;
            position: absolute;
            margin: 0 auto;
            right: 0;
            left: 0;
            bottom: 50px;
            z-index: 9999;
        }
    </style>
    <body>

        <div class="container">
            <h2>Modal Methods</h2>
            <p>The <strong>show</strong> method shows the modal and the <strong>hide</strong> method hides the modal.</p>
             Trigger the modal with a button 

             Modal 
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                     Modal content
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Methods</h4>
                        </div>
                        <div class="modal-body">
                            <p>The <strong>show</strong> method shows the modal and the <strong>hide</strong> method hides the modal.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript">
            jsFunction(){
                    // Show the Modal on load
                    $("#myModal").modal("show");
            }

        </script>

    </body>
</html>-->