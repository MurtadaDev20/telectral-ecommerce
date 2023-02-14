<?php include "inc/header.php" ?>
<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $count = 0;
    global $con;
    $id = $_GET['id'];
    $query = "SELECT * FROM products_discount where p_id = '$id'";
    $res = mysqli_query($con, $query);
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($res);
    } else {
        header("location:index.php");
    }
} else {
    header("location:index.php");
}
?>

<?php
$query = mysqli_query($con, "SELECT * FROM products_discount  where p_id = '$id'");
$row_descount = mysqli_fetch_assoc($query);

?>
<?php include "inc/nav.php" ?>
<div class="box-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="title-products-details">
                    <?php echo $row_descount['product_name'] ?>
                </h2>
                <hr>
                <h4 class="selling-price">السعر قبل الخصم :<span class="descount"><?php echo $row_descount['price'] ?>د.ع</span></h4>
                <h4 class="selling-price ">السعر بعد الخصم :<span><?php echo $row_descount['price_d'] ?>د.ع</span></h4>

                <h2 class="title-products-details">
                    التفاصيل
                </h2>
                <hr>
                <div class="details">
                    <p>
                        <?php echo $row_descount['description'] ?>
                    </p>
                </div>
            </div>

            <div class="col-lg-5">
                <form method="POST">
                    <div class="main-img">
                        <img src="./admin/img/<?php echo $row_descount['img'] ?>" alt="">
                    </div>
                    <div class="all-products text-center mt-5 mb-5 d-grid gap-2">
                        <button class=" btn btn-primary border-none" name="add_cart">اضافة الى السلة</button>
                    </div>

                    <div class="control text-center">
                        <span>الكمية :</span> <input type="number" name="qty" title="الكميّة" class="input-text-qty" value="1" />
                    </div>
                </form>
            </div>
            </form>
            <div class="col-lg-1">
                <div class="sub-img">
                    <a href=""><img src="./img/pro1.png" alt=""></a>
                </div>
                <div class="sub-img">
                    <a href=""><img src="./img/pro1.png" alt=""></a>
                </div>
                <div class="sub-img">
                    <a href=""><img src="./img/pro1.png" alt=""></a>
                </div>
                <div class="sub-img">
                    <a href=""><img src="./img/pro1.png" alt=""></a>
                </div>
                <div class="sub-img">
                    <a href=""><img src="./img/pro1.png" alt=""></a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_cart'])) 
{

    if (isset($_SESSION['email']))
    {
        $querys = mysqli_query($con, "SELECT * FROM customers where email = '$_SESSION[email]'");

        $row_cust = mysqli_fetch_assoc($querys);

        $cust_id = $row_cust['cust_id'];
        $name_cart = $row_descount['product_name'];
        $img_cart = $row_descount['img'];
        $qty_cart = $_POST['qty'];
        $price_cart = $row_descount['price_d'];
        $price_total = $qty_cart * $price_cart;


        $querys = mysqli_query($con, "INSERT INTO cart (`cust_id`,`cart_name`, `img`, `cart_qty`, `price`, `sum_price`)VALUES('$cust_id','$name_cart','$img_cart','$qty_cart','$price_cart','$price_total')");


        if ($querys) {
            ?>
                <script>
                    $(function() {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'تمت الاضافة الى السلة',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    })
                </script>
            <?php
            header("REFRESH:1;URL=product_descount_details.php?id=$row_descount[p_id]");
        }
    }
    else
    {
        ?>
            <script>
                $(function() {
                    Swal.fire(
                        'انت لست مشترك',
                        'سجل الدخول اولا',
                        'question'
                    )
                })
            </script>
        <?php
        //header("location:product_details.php?id=$row_prod[p_id]");
        header("REFRESH:2;URL=regester.php");
    }
}



?>

<?php include "inc/footer.php" ?>