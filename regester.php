<?php
include 'inc/header.php';
?>
<?php include 'inc/nav.php' ?>
<style>
    .login {
        width: 300px;
        margin: 80px auto;
    }

    .login h5 {
        color: #555;
        margin-bottom: 20px;
        text-align: center;
    }

    .login button {
        margin-right: 80px;
    }
</style>
</head>

<body>

    <div class="login">

        <form method="POST">

            <h5>انشاء حساب</h5>
            <?php


            ?>
            <div class="form-group ">
                <h6 class="text-right">الاسم بالكامل</h6>
                <input type="text " class="form-control mt-3 mb-3" id="mail" name="fullName" required />
            </div>

            <div class="form-group">
                <h6 class="text-right">البريد الالكتروني</h6>
                <input type="email" class="form-control mt-3 mb-3" id="mail" name="email" required />
            </div>

            <div class="form-group">
                <h6 class="text-right">الرمز السري</h6>
                <input type="password" class="form-control mt-3" id="pass" name="password" required />
            </div>

            <div class="form-group">
                <h6 class="text-right">عنوان السكن</h6>
                <input type="text" class="form-control mt-3" id="pass" name="address" required />
            </div>

            <div class="form-group">
                <h6 class="text-right">رقم الهاتف</h6>
                <input type="text" class="form-control mt-3" id="pass" name="phone" required />
            </div>


            <button class="btn btn-primary detils-btn mt-3 display-inline-block" name="regester">انشاء حساب</button>


        </form>
        <div class="mt-3">
            <a href="login.php">تسجيل الدخول</a>
        </div>
    </div>

    <?php
    //Login Checking 


    global $con;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['regester'])) {

        $fullname = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];



        if (empty($fullname) && empty($password) && empty($email) && empty($address) && empty($phone)) {
            //set_message(display_error("please Fill in the Blanks "));
    ?>
            <script>
                $(function() {
                    Swal.fire('الحقول فارغة', 'املا الحقول اولا', 'question')
                })
            </script>
            <?php
        } elseif (is_numeric($phone)) {

            // query
            $query = "SELECT * FROM customers where email ='$email'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
            ?>
                <script>
                    $(function() {
                        Swal.fire('البريد الالكتروني موجود بالفعل استخدم بريد اخر', '  ', 'error')
                    })
                </script>
            <?php
            } else {
                $querys = mysqli_query($con, "INSERT INTO customers (`full_name`, `email`, `password`, `address`, `phone_number`) VALUES ('$fullname' , '$email' , '$password' , '$address' , '$phone')");

            ?>
                <script>
                    $(function() {
                        Swal.fire('تم التسجيل اذهب الى تسجيل الدخول', '  ', 'success')
                    })
                </script>
            <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                $(function() {
                    Swal.fire('ادخل رقم الهاتف الصحيح', '  ', 'error')
                })
            </script>
    <?php
        }
    }





    ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <?php include 'inc/footer.php' ?>