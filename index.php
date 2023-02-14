<?php include "inc/header.php" ?>



<?php include "inc/nav.php" ?>

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/pro4.png" class="d-block w-100" alt="...">

        </div>
        <div class="carousel-item">
            <img src="./img/cc.png" class="d-block w-100" alt="...">

        </div>
        <div class="carousel-item">
            <img src="./img/aa.jpg" class="d-block w-100" alt="...">

        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="box-content">
    <div class="container">
        <div class="box2-product">
            <h2 class="text-center m-4 p-5 design-text" id="servece">خدماتنا</h2>

            <div class="row text-right mt-5 mb-5">

                <div class="col-lg-6 ">
                    <div class="row">
                        <div class="col-lg-2 text-center mt-4">
                            <i class="fa-solid fa-plug icon-service"></i>
                        </div>
                        <div class="col-lg-10 mt-4 txt-small">
                            <div class="title-service">
                                <h1>العنوان</h1>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو</p>
                            </div>

                        </div>

                        <div class="col-lg-2 text-center mt-4">
                            <i class="fa-solid fa-gear icon-service"></i>
                        </div>
                        <div class="col-lg-10 mt-4 txt-small">
                            <div class="title-service">
                                <h1>العنوان</h1>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو</p>
                            </div>

                        </div>

                    </div>


                </div>

                <div class="col-lg-6 ">

                    <div class="row">
                        <div class="col-lg-2 text-center mt-4">
                            <i class="fa-solid fa-desktop icon-service"></i>
                        </div>
                        <div class="col-lg-10 mt-4 txt-small">
                            <div class="title-service">
                                <h1>العنوان</h1>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو</p>
                            </div>

                        </div>

                        <div class="col-lg-2 text-center mt-4">
                            <i class="fa-solid fa-truck icon-service"></i>
                        </div>
                        <div class="col-lg-10 mt-4 txt-small">
                            <div class="title-service">
                                <h1>العنوان</h1>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>



        </div>

        <!-- Discount Products -->
        <div class="box1-product">
            <h2 class="text-center m-3 p-5 design-text">منتجات عليها خصومات</h2>
            <div class="owl-carousel owl-theme">
                <?php
                $query = mysqli_query($con, "SELECT * FROM products_discount where status = '1' ORDER BY p_id DESC");
                while ($row_descount = mysqli_fetch_assoc($query)) {

                ?>
                    <div class="item" >
                        <div class="card card-hov ">
                            <img src="./admin/img/<?php echo $row_descount['img'] ?>" class="card-img-top" alt="...">
                            <span class="dicount"></span>
                            <span class="dicount-num"><?php echo $row_descount['descount']; ?></span>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row_descount['product_name']; ?></h5>
                                <p>وصف بسيط للمنتج ....</p>
                                <div class="buy-disc mb-2">
                                    <p class="card-text befor-discount d-inline "><?php echo $row_descount['price']; ?>د.ع</p>
                                    <p class="card-text after-discount  d-inline"><?php echo $row_descount['price_d']; ?>د.ع</p>
                                </div>

                                <a href="Product_descount_details.php?id=<?php echo $row_descount['p_id'] ?>" class="btn btn-primary detils-btn">التفاصيل</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>



        <div class="box1-product web" id="products">
            <h2 class="text-center m-3 p-5 design-text">المنتجات</h2>
            <div class="cards mt-5">
                <div class="row">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM products where status = '1' and type = '0'  ORDER BY p_id DESC LIMIT 8");
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
            <div class="all-products text-center mt-5 mb-5">
                <a href="all_products.php" class="btn btn-primary detils-btn ">عرض كل المنتجات</a>
            </div>
        </div>

        <!-- For Mobile -->
        <div class="box1-product mob" style="display:none;" id="products">
            <h2 class="text-center m-3 p-5 design-text"> المنتجات </h2>


            <div class="owl-carousel owl-theme">
                <?php
                $query = mysqli_query($con, "SELECT * FROM products where status = '1' and type = '0' ORDER BY p_id DESC LIMIT 8 ");
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
            <div class="all-products text-center mt-5 mb-5">
                <a href="all_products.php" class="btn btn-primary detils-btn ">عرض كل المنتجات</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Start background prouduct -->
<div class="back-img">
    <div class="slide-text">
        <div class="owl-carousel owl-theme">

            <div class="item">

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="box1-product">
        <h2 class="text-center m-3 p-5 design-text"> المنتجات الاكثر طلبا</h2>


        <div class="owl-carousel owl-theme">

            <?php
            $query = mysqli_query($con, "SELECT * FROM products where status = '1' and type = '1' ORDER BY p_id DESC");
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
<!-- Contact Us -->
<!--Section: Contact v.2-->
<section class="mt-5 bg-black text-white p-4">
    <div class="container">
        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center  mb-5 mt-5" id="contact">اتصل بنا</h2>



        <div class="row">




            <div class="col-md-2">

            </div>
            <div class="col-md-4 text-center">
                <ul class="list-unstyled mb-0 d-inline">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>العراق , بغداد</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>07725933735</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>Telectral.p.o.s@gmail.com</p>
                    </li>
                </ul>
            </div>


        </div>
    </div>
</section>



<!--Section: Contact v.2-->

<?php include "inc/footer.php" ?>