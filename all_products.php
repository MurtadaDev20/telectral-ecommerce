<?php include "inc/header.php" ?>


<?php include "inc/nav.php" ?>

<div class="container">

    <div class="box1-product web" id="products">
        <h2 class="text-center m-3 p-5 design-text">جميع المنتجات</h2>
        <div class="cards mt-5">
            <div class="row">
                <?php
                $query = mysqli_query($con, "SELECT * FROM products where status = '1' and type = '0'  ORDER BY p_id ");
                while ($row_prod = mysqli_fetch_assoc($query)) {

                ?>
                    <div class="col-lg-3 col-md-4 col-sm-4 mb-5">
                        <div class="card card-hov ">
                            <img src="./admin/img/<?php echo $row_prod['img'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $row_prod['product_name'] ?></h5>

                                <p class="card-text"><?php echo $row_prod['price'] ?>د.ع</p>
                                <a href="Product_details.php?id=<?php echo $row_prod['p_id'] ?>" class="btn btn-primary detils-btn">التفاصيل</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

        <!-- For Mobile -->
        <div class="box1-product mob" style="display:none;" id="products">
            <h2 class="text-center m-3 p-5 design-text"> جميع المنتجات </h2>


            <div class="owl-carousel owl-theme">
                <?php
                $query = mysqli_query($con, "SELECT * FROM products where status = '1' and type = '0' ORDER BY p_id ");
                while ($row_prod = mysqli_fetch_assoc($query)) {

                ?>
                    <div class="item">
                        <div class="card card-hov ">
                            <img src="./admin/img/<?php echo $row_prod['img'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $row_prod['product_name'] ?></h5>

                                <p class="card-text"><?php echo $row_prod['price'] ?>د.ع</p>
                                <a href="Product_details.php?id=<?php echo $row_prod['p_id'] ?>" class="btn btn-primary detils-btn">التفاصيل</a>
                            </div>
                        </div>



                    </div>
                <?php
                }
                ?>

            </div>
            
        </div>
    
</div>

<?php include "inc/footer.php" ?>