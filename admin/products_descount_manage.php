<?php include 'inc/header.php' ?>
<?php include 'function/config.php' ?>
<?php

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

?>
<?php
global $con;
$sql = "SELECT * FROM products_discount   ORDER BY p_id DESC";
$res = mysqli_query($con, $sql);



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

                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ادارة المنتجات التي عليها خصم</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered  text-center">
                            <thead>
                                <tr>
                                    <th scope="col">العدد</th>
                                    <th scope="col"> اسم المنتج </th>
                                    <th scope="col"> التصنيف </th>

                                    <th scope="col">السعر قبل الخصم</th>
                                    <th scope="col">السعر بعد الخصم</th>
                                    <th scope="col">مقدار الخصم</th>
                                    <th scope="col">الصور</th>
                                    <th scope="col">الكمية</th>

                                    <th scope="col">التاريخ</th>

                                    <th scope="col">الحالة</th>

                                    <th scope="col">العمليات</th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $num = 1; //Count
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $cate_name = mysqli_query($con, "SELECT * FROM categories where id = $row[categories_name]");
                                    $row_cat = mysqli_fetch_assoc($cate_name);
                                ?>
                                    <tr>

                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $row['product_name'] ?></td>
                                        <td><?php echo $row_cat['cat_name'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td><?php echo $row['price_d'] ?></td>
                                        <td><?php echo $row['descount'] ?></td>
                                        <td><img src="img/<?php echo $row['img']; ?>" height="50px" width="50px" class="img-circle"></td>
                                        <td><?php echo $row['qty'] ?></td>
                                        <td><?php echo $row['postDate'] ?></td>


                                        <td>
                                            <?php

                                            if ($row['status'] == 1) {
                                                echo "مفعل";
                                            } else {
                                                echo "غير مفعل";
                                            }

                                            ?></td>



                                        <td>
                                            <a class="btn btn-info btn-md" href="products_descount_edit.php?id=<?php echo $row['p_id'] ?>"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-md" href="products_descount_del.php?id=<?php echo $row['p_id'] ?>"><i class="fas fa-trash"></i></a>


                                            <?php
                                            active_status();

                                            if ($row['status'] == '1') {
                                                echo " <a href='products_descount_manage.php?opr=deactive&id=" . $row['p_id'] . "' class='btn btn-danger '><i class='fas fa-times-circle'></i></a>";
                                            } else {
                                                echo " <a href='products_descount_manage.php?opr=active&id=" . $row['p_id'] . "' class='btn btn-success '><i class='fas fa-check-circle'></i></a>";
                                            }

                                            ?>
                                        </td>
                                    <?php
                                    $num++;
                                }
                                    ?>

                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include 'inc/footer.php' ?>

        <?php


        // active_status
        function active_status()
        {
            global $con;

            if (isset($_GET['opr']) && $_GET['opr'] != "") {
                $operation = $_GET['opr'];
                $id = $_GET['id'];

                if ($operation == 'active') {
                    $status = 1;
                } else {
                    $status = 0;
                }

                $query = "UPDATE products_discount SET status = '$status' WHERE p_id='$id'";
                $result = mysqli_query($con, $query);

                if ($result) {
                    header("location:products_descount_manage.php");
                }
            }
        }



        ?>