<?php
include 'inc/header.php';
include 'function/config.php';


?>



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

            <h5>تسجيل الدخول</h5>
            <?php
            login_system();

            ?>
            <div class="form-group">
                <label for="mail">الاسم او الايميل</label>
                <input type="text " class="form-control mt-3 mb-3" id="mail" name="username" />
            </div>
            <div class="form-group">
                <label for="pass"> الرمز السري</label>
                <input type="password" class="form-control mt-3" id="pass" name="password" />
            </div>
            <button class="btn btn-success  mt-3 display-inline-block" name="btn_login"> تسجيل الدخول</button>

        </form>
    </div>

    <?php
    //Login Checking 
    function login_system()
    {
        global $con;
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];



            if (empty($username) || empty($password)) {
                //set_message(display_error("please Fill in the Blanks "));
    ?>
                <script>
                    $(function() {
                        Swal.fire('الحقول فارغة', 'املا الحقول اولا', 'question')
                    })
                </script>
                <?php
            } else {

                // query
                $query = "SELECT * FROM admin where username ='$username' or email = '$username'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                if ($row) {
                    if (password_verify($password, $row['password'])) {
                        if ($row) {
                            $_SESSION['username'] = $username;

                            header('location:dashbord.php');
                        } else {
                            echo "Not Work";
                        }
                    } else {
                ?>
                        <script>
                            $(function() {
                                Swal.fire('خطا في البريد الالكتروني او كلمة المرور', '  ', 'error')
                            })
                        </script>
                    <?php
                    }
                } else {
                    ?>
                    <script>
                        $(function() {
                            Swal.fire('خطا في البريد الاكتروني او كلمة المرور', '  ', 'error')
                        })
                    </script>
    <?php
                }
            }
        }
    }




    ?>