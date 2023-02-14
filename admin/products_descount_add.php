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
                                        <input type="text" class="form-control" id="exampleInputText1" name="product_name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">التصنيف</label>
                                        <select name="cat_name" class="form-control" id="">
                                            <?php
                                            global $con;
                                            $query = mysqli_query($con, "SELECT * FROM categories");

                                            while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label"> الكمية</label>
                                        <input type="number" class="form-control" id="exampleInputText1" name="qty" value="1" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label"> السعر قبل الخصم </label>
                                        <input type="text" class="form-control" id="exampleInputText1" name="price" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label"> السعر بعد الخصم </label>
                                        <input type="text" class="form-control" id="exampleInputText1" name="price_d" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">مقدار الخصم %</label>
                                        <input type="text" class="form-control" id="exampleInputText1" name="descount" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">اضافة صورة </label>
                                        <input type="file" class="form-control" id="exampleInputText1" name="img" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputText1" class="form-label">وصف المنتج </label>
                                        <textarea type="text" class="form-control" cols="30" rows="10" id="summernote" name="desc" required></textarea>
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
        $price_d = $_POST['price_d'];
        $descount = $_POST['descount'];
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
        } elseif (empty($price_d)) {
        ?>
            <script>
                $(function() {
                    Swal.fire('حدث خطا', 'الرجاء قم بادخال السعر بعد الخصم ', 'error')
                })
            </script>
        <?php
        } elseif (empty($descount)) {
        ?>
            <script>
                $(function() {
                    Swal.fire('حدث خطا', 'الرجاء قم بادخال مقدار الخصم ', 'error')
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

                $exit = "SELECT * FROM products_discount where product_name = '$product_name'";
                $sql = mysqli_query($con, $exit);

                if (mysqli_fetch_assoc($sql)) {
            ?>
                    <script>
                        $(function() {
                            Swal.fire('الخبر موجود بالفعل', 'هل تريد اضافة خبر جديد  ', 'question')
                        })
                    </script>
                    <?php
                } else {
                    $query = "INSERT INTO  products_discount (product_name , categories_name, qty , price, price_d , descount, description , img  ,status ) VALUES ('$product_name','$cat_name','$qty','$price','$price_d','$descount','$desc','$img','1')";
                    $result = mysqli_query($con, $query);

                    if ($result) {

                    ?>
                        <script>
                            $(function() {
                                Swal.fire(' تمت اضافة المنتج بعد الخصم', '  ', 'success')
                            })
                        </script>
                <?php
                        move_uploaded_file($tmp_name, $path);
                    }
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