<?php include 'inc/header.php' ?>
<?php
include 'function/config.php'; ?>
<?php

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

?>
<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $count = 0;
    global $con;
    $id = $_GET['id'];
    $query = "SELECT * FROM products where p_id = '$id'";
    $res = mysqli_query($con, $query);
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($res);
    } else {
        header("location:products_manage.php");
    }
} else {
    header("location:products_manage.php");
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
                                <h3 class="card-title">اضافة منتج</h3>
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
                                        <label for="exampleInputText1" class="form-label"> اسم المنتج</label>
                                        <input type="text" class="form-control" id="exampleInputText1" name="product_name" value="<?php echo $row['product_name'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">التصنيف</label>
                                        <select name="cat_name" class="form-control" id="">
                                            <?php
                                            global $con;
                                            $query = mysqli_query($con, "SELECT * FROM categories ");

                                            while ($rows = mysqli_fetch_assoc($query)) {
                                            ?>
                                                <option value="<?php echo $rows['id'] ?>"><?php echo $rows['cat_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label"> الكمية</label>
                                        <input type="number" class="form-control" id="exampleInputText1" name="qty" value="<?php echo $row['qty'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label"> السعر </label>
                                        <input type="text" class="form-control" id="exampleInputText1" name="price" value="<?php echo $row['price'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">اضافة صورة </label>
                                        <input type="file" class="form-control" id="exampleInputText1" name="img" required>
                                    </div>
                                    <img src="img/<?php echo $row['img']; ?>" height="100px" width="100px" class="img-circle">
                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">وصف المنتج </label>
                                        <textarea type="text" class="form-control" cols="30" rows="10" id="summernote" name="desc" required><?php echo $row['description'] ?></textarea>
                                    </div>




                                    <button type="submit" class="btn btn-primary" name="product_add_btn">ارسال</button>
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_add_btn'])) {

        $product_name = $_POST['product_name'];
        $cat_name = $_POST['cat_name'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];

        $img = $_FILES['img']['name'];
        $type = $_FILES['img']['type'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $size = $_FILES['img']['size'];

        $img_ext = explode('.', $img);
        $img_correct_ext = strtolower(end($img_ext));
        $allow = array('jpg', 'png', 'jpeg');
        $path = "img/" . $img;

        $msg = "";
        if (empty($product_name)) {
    ?>
            <script>
                $(function() {
                    Swal.fire('حدث خطا', 'الرجاء ادخل اسم المنتج', 'error')
                })
            </script>
        <?php
        } elseif (empty($price)) {
        ?>
            <script>
                $(function() {
                    Swal.fire('حدث خطا', 'الرجاء قم بادخال السعر ', 'error')
                })
            </script>
        <?php
        } elseif (empty($desc)) {
        ?>
            <script>
                $(function() {
                    Swal.fire('حدث خطا', 'الرجاء قم بادخال الوصف ', 'error')
                })
            </script>
            <?php
        } elseif (in_array($img_correct_ext, $allow)) {
            if ($size < 5000000) {

                $query = "UPDATE products SET product_name = '$product_name', categories_name ='$cat_name'	 , qty ='$qty' , price='$price', description = '$desc' , img ='$img' WHERE p_id = '$id'";
                $result = mysqli_query($con, $query);

                if ($result) {

            ?>
                    <script>
                        $(function() {
                            Swal.fire(' تمت تعديل الخبر', '  ', 'success')
                        })
                    </script>
                <?php
                    header("location:products_manage.php");
                    move_uploaded_file($tmp_name, $path);
                }
            } else {
                ?>
                <script>
                    $(function() {
                        Swal.fire('حجم الصورة كبير', '  ', 'error')
                    })
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                $(function() {
                    Swal.fire('لايمكنك اضافة هذا النوع من الامتداد في الصور', '  ', 'error')
                })
            </script>
    <?php
        }
    }




    ?>