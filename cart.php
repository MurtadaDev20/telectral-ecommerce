<?php include "inc/header.php" ?>

<?php

if (!isset($_SESSION['email'])) {
    header("location:login.php");
}

?>

<?php
$querys = mysqli_query($con, "SELECT * FROM customers where email = '$_SESSION[email]'");

$row_cust = mysqli_fetch_assoc($querys);

$cust_id = $row_cust['cust_id'];
?>

<?php include "inc/nav.php" ?>
<div class="content">
    <div class="container">
        <div class="title-cart">
            <h1>عربة التسوق</h1>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <table class="table  table-bordered text-center">
                    <thead class="heaer-table cart-table">
                        <tr>
                            <th scope="col">اسم المنتج</th>
                            <th scope="col">صورة المنتج</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">السعر</th>
                            <th scope="col">السعر الكلي</th>
                            <th scope="col">حذف</th>
                        </tr>
                    </thead>
                    <?php
                    $query = (mysqli_query($con, "SELECT * FROM cart where cust_id = '$cust_id' ORDER BY cart_id DESC"));
                    $qty_total = 0;
                    $price_total = 0;
                    // 
                    while ($row_cart = mysqli_fetch_assoc($query)) {
                    ?>
                        <tbody class="cart-table">
                            <tr>
                                <th scope="row"><?php echo $row_cart['cart_name'] ?></th>
                                <td><img src="./admin/img/<?php echo $row_cart['img'] ?>" width="60px" class="rounded" alt=""></td>
                                <td><?php echo $row_cart['cart_qty'] ?></td>
                                <td><?php echo $row_cart['price'] ?></td>
                                <td><?php echo $row_cart['sum_price'] ?></td>
                                <td><a href="cart_del.php?id=<?php echo $row_cart['cart_id'] ?>"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a></td>
                            </tr>


                        </tbody>
                    <?php
                        $qty_total += $row_cart['cart_qty'];
                        $price_total +=  $row_cart['sum_price'];
                    }
                    $row_carts = mysqli_fetch_assoc($query);
                    ?>

                </table>

            </div>




            <div class="col-lg-5">
                <form method="POST">
                    <div class="cart-total">
                        <div class="title-cart-total">
                            <h6 class="">فاتورة عربة التسوق</h6>
                        </div>
                        <div class="qty">
                            الكمية<span><?php echo $qty_total; ?></span>
                        </div>
                        <div class="total">
                            المجموع<span><?php echo $price_total; ?>د.ع</span>
                        </div>
                    </div>
                    <div class="all-products text-center mt-5 mb-5 d-grid gap-2">
                        <button class=" btn btn-primary border-none" name="Buy">تاكيد الشراء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Buy'])) {
    $query = (mysqli_query($con, "SELECT * FROM cart where cust_id = '$cust_id' ORDER BY cart_id DESC"));
    

    $full_name = $row_cust['cust_id'];
    $email = $row_cust['email'];
    $address = $row_cust['address'];
    $phone_number = $row_cust['phone_number'];
    
    

    if($qty_total == 0)
    {
                    ?>
                        <script>
                            $(function() {
                                Swal.fire('قم باضافة منتج على الاقل', '  ', 'error')
                            })
                        </script>
                    <?php
    }
    else
        {
            while($row_sales = mysqli_fetch_assoc($query))  
            {
                $products_name = $row_sales['cart_name'];
                $qty = $row_sales['cart_qty'];
                $price = $row_sales['sum_price'];
                $insert = mysqli_query($con, "INSERT INTO sales_invoice ( `full_name`, `email`, `address`, `phone_number`,`products_name`, `qty`, `price`) 
                    VALUES('$full_name','$email','$address','$phone_number','$products_name','$qty','$price')");
            }

            $row_nam_pro = mysqli_fetch_assoc($query);
            
                $products_name = $row_nam_pro['cart_name'];
                $qty = $row_nam_pro['cart_qty'];
                $price = $row_nam_pro['sum_price'];
                $insert = mysqli_query($con, "INSERT INTO requests ( `full_name`, `email`, `address`, `phone_number`,`products_name`, `qty`, `price`) 
                VALUES('$full_name','$email','$address','$phone_number','$products_name','$qty','$price')");


            

                

                

            
            ?>
                <script>
            $(function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'تم شراء المنتجات',
                    showConfirmButton: false,
                    timer: 1000
                })
            })
        </script>
            <?php
            
            if($insert)
            {
                $query_del =mysqli_query($con, "DELETE from cart where cust_id = '$cust_id'");

                header("REFRESH:1;URL=cart.php");
            
            
            }
            
            
        }
    
}

?>


<?php include "inc/footer.php" ?>