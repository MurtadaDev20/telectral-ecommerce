<?php

// if (!isset($_SESSION['email'])) {
//     header("location:login.php");
// }

?>

<?php
if (isset($_SESSION['email'])) {
    $querys = mysqli_query($con, "SELECT * FROM customers where email = '$_SESSION[email]'");

    $row_cust = mysqli_fetch_assoc($querys);

    $cust_id = $row_cust['cust_id'];
}

?>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark  sticky-top">
        <div class="container">

            <a class="navbar-brand " href="index.php"><span class="logo">TE</span> P.O.S</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link action " aria-current="page" href="index.php">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link action active" aria-current="page" href="index.php#servece">خدماتنا</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link action" aria-current="page" href="index.php#products">المنتجات</a>
                    </li>
                    <!-- <li class="nav-item ">
                        <a class="nav-link action" href="#">حول المتجر</a>
                    </li> -->

                    <li class="nav-item ">
                        <a class="nav-link action" href="index.php#contact">اتصل بنا</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            التصنيفات
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" dir="rtl !importint">
                            <li><a class="dropdown-item" href="#">طابعات</a></li>
                            <li><a class="dropdown-item" href="#">شاشات</a></li>
                            <li><a class="dropdown-item" href="#">اكسسوارات</a></li>
                            <li><a class="dropdown-item" href="#">ورق باركود</a></li>

                        </ul>
                    </li> -->

                </ul>
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li>
                        <a aria-current="page" href="./cart.php">
                            <button type="button" class=" position-relative border-0 bg-0 backg">
                                <i class="fa-solid fa-cart-shopping" width="40px"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php
                                    $count = 0;
                                    if (isset($_SESSION['email'])) {

                                        $query = mysqli_query($con, "SELECT * FROM cart where cust_id = '$cust_id'");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $count;
                                    ?>

                                    <?php
                                            $count++;
                                        }
                                    }


                                    ?>
                                    <?php echo $count; ?>
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </button>

                        </a>
                    </li>
                    <li>
                        <a aria-current="page" href="logout.php">

                            <button type="button" class=" position-relative border-0 bg-0 backg">
                                <i class="fas fa-sign-out-alt" width="40px"></i>
                            </button>
                        </a>

                    </li>
                </ul>
            </div>

        </div>
        </div>
    </nav>