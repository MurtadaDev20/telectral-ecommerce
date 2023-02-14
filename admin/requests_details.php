<?php include 'inc/header.php' ?>
<?php include 'function/config.php' ?>
<?php

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

?>
<?php
if (isset($_GET['id_name']) && !empty($_GET['id_name'])) {
    $count = 0;
    global $con;
    $id_name = $_GET['id_name'];
    $sql = "SELECT * FROM requests  where full_name = '$id_name'";
    $res = mysqli_query($con, $sql);
    $row_req = mysqli_fetch_assoc($res);
    $full_name = $row_req['full_name'];
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($res);
    } else {
        header("location:requests.php");
    }
} else {
    header("location:requests.php");
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

                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ادارة المنتجات الاكثر طلبا</h3>

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
                                    <th scope="col">اسم المنتج</th>
                                    <th scope="col"> الكمية</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">التاريخ</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                global $con;
                                $sql = "SELECT * FROM sales_invoice where full_name = '$full_name'";
                                $res = mysqli_query($con, $sql);
                                $num = 1; //Count
                                while ($row = mysqli_fetch_assoc($res)) {
                                        
                                ?>
                                    <tr>

                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $row['products_name'] ?></td>
                                        <td><?php echo $row['qty'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        

                                        <td><?php echo $row['date'] ?></td>
                                        <!-- <td>
                                            <a class="btn btn-info btn-md" href="#"><i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-md" href="request_del.php?id=<?php echo $row['sales_id'] ?>"><i class="fas fa-trash"></i></a>
                                        </td> -->



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

                $query = "UPDATE products SET status = '$status' WHERE p_id='$id'";
                $result = mysqli_query($con, $query);

                if ($result) {
                    header("location:product_most.php");
                }
            }
        }

        function active_type()
        {
            global $con;

            if (isset($_GET['opr_trans']) && $_GET['opr_trans'] != "") {
                $operation_transfer = $_GET['opr_trans'];
                $id = $_GET['id'];

                if ($operation_transfer == 'activee') {
                    $type = 0;
                } else {
                    $type = 1;
                }

                $query = "UPDATE products SET type = '$type' WHERE p_id='$id'";
                $result = mysqli_query($con, $query);

                if ($result) {
                    header("location:product_most.php");
                }
            }
        }

        ?>