<?php include 'inc/header.php' ?>

<?php
include 'function/config.php';


?>
<?php

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'inc/nav.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'inc/aside.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">


                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">اضافة فئات</h3>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">

                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">اسم التصنيف</label>
                                        <input type="text" class="form-control" id="exampleInputText1" name="cat_name" required>
                                    </div>




                                    <button type="submit" class="btn btn-primary" name="cat_add">ارسال</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.card -->
        </div> -->
    </div>

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include 'inc/footer.php' ?>


    <?php

    global $con;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cat_add'])) {

        $cat_name = $_POST['cat_name'];

        $count = 0;
        $res = mysqli_query($con, "SELECT * FROM categories where cat_name = '$cat_name'");
        $count = mysqli_num_rows($res);


        if (empty($cat_name)) {
    ?><script>
                $(function() {
                    Swal.fire('حدث خطا', 'املأ الحقل اولا', 'error')
                })
            </script><?php
                    } elseif ($count == 0) {
                        $query = mysqli_query($con, "INSERT INTO categories (cat_name , status) VALUES ('$cat_name','1')");

                        ?><script>
                $(function() {
                    Swal.fire(' تمت اضافة التصنيف', '  ', 'success')
                })
            </script><?php
                    } else {
                        ?><script>
                $(function() {
                    Swal.fire('حدث خطا', ' التصنيف موجود بالفعل', 'error')
                })
            </script><?php
                    }

                    echo $count;
                }

                        ?>