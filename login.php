<?php
//Khai báo sử dụng session
session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Fzone.vn</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4" style="color: violet;font-weight: bold">Fzone</h1>
                                        </div>
                                        <form class="user" action='' method="POST">
                                            <div class="form-group">
                                                <input type='text' name='txtPhoneNumber' class="form-control form-control-user input-field"
                                                       id="inputUserName" aria-describedby="emailHelp" placeholder="Phone" value="<?php
                                                       if (isset($_COOKIE["member_login"])) {
                                                           echo $_COOKIE["member_login"];
                                                       }
                                                       ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                       id="inputPassword" placeholder="Password" name='txtPassword'/>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?>/>
                                                    <label class="custom-control-label" for="remember">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <input  type="submit" class="btn btn-primary btn-user btn-block" name="dangnhap" value='Login' onclick="doLogin()"/>

                                            <!--Login by social-->
                                            <!--                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                                                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                                                                    </a>
                                                                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                                                                    </a>-->
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.php">Forgot Password?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="register.php">Create an Account!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script>
                                                function doLogin() {
                                                    var username = document.getElementById('inputUserName').value;
                                                    var password = document.getElementById('inputPassword').value;
                                                    var checked = $("#remember").is(":checked");

                                                    $.ajax({
                                                        url: './dao/do-login.php', //This is the current doc
                                                        type: "POST",
                                                        data: ({username: username, password: password, checked: checked}),
                                                        success: function (data) {
                                                            switch (data) {
                                                                case 'true':
                                                                    window.location = "./index.php";
                                                                    break;
                                                                case 'false':
                                                                    var message = "Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng nhập lại.";
                                                                    alert(message);
                                                                    break;
                                                            }
                                                        }
                                                    });
                                                }
        </script>
    </body>

</html>