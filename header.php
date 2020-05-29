<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <!-- menu style -->
    <!-- //Custom-Files -->

    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //web fonts -->

</head>

<body>
    <!-- top-header -->
    <div class="agile-main-top">
        <div class="container-fluid">
            <div class="row main-top-w3l py-2">

                <div class="col-lg-8 header-right mt-lg-0 mt-2">
                    <!-- header lists -->
                    <ul>
                        <li class="text-center border-right text-white">
                            <i class="fas fa-phone mr-2"></i> 8198033994
                        </li>
                        <?php
                        if (!isset($_SESSION['cus_name'])) { ?>
                            <li class="text-center border-right text-white">
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
                            </li>
                            <li class="text-center border-right text-white">
                            <a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
                                <i class="fas fa-address-card mr-2"></i>Register </a>
                        </li>
                        <?php } ?>
                       
                        <li class="text-center border-right text-white">
                            <a href="#" class="text-white">
                                <i class="fas fa-user mr-2"></i> 
                                <?php
                                    if (isset($_SESSION['cus_name']))
                                     {
                                        echo strtoupper($_SESSION['cus_name']);
                                        } else {
                                                 echo 'Guest';
                                                }
                                    ?> </a>
                        </li>
                        <?php
                        if (isset($_SESSION['cus_name'])) { ?>
                            <li class="text-center border-right text-white">
                                <a href="logout.php" class="text-white">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout </a>
                            </li>
                        <?php    }
                        ?>

                    </ul>
                    <!-- //header lists -->
                </div>
            </div>
        </div>
    </div>
    <!-- modals -->
    <!-- log in -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="log.php" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="pass" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Log in" name="login">
                        </div>
                        <div class="sub-w3l">

                        </div>
                        <p class="text-center dont-do mt-3">Don't have an account?
                            <a href="regester.php" data-toggle="modal" data-target="#exampleModal2">
                                Register Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- register -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="reg.php" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Your Name</label>
                            <input type="text" class="form-control" placeholder=" " name="cus_name" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="cus_email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Phone no.</label>
                            <input type="text" class="form-control" placeholder=" " name="cus_phone" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Country</label>
                            <input type="text" class="form-control" placeholder=" " name="cus_country" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">State</label>
                            <input type="text" class="form-control" placeholder=" " name="cus_state" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">City</label>
                            <input type="text" class="form-control" placeholder=" " name="cus_city" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Address</label>
                            <input type="text" class="form-control" placeholder=" " name="cus_address" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pincode</label>
                            <input type="text" class="form-control" placeholder=" " name="cus_pincode" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="cus_pass" id="password1" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Register" name="reg">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal -->
    <!-- //top-header -->
    <!-- header-bottom-->
    <div class="header-bot">
        <div class="container">
            <div class="row header-bot_inner_wthreeinfo_header_mid">
                <!-- logo -->
                <div class="col-md-3">
                    <a href="index.php" class="font-weight-bold font-italic">
                        <img style="width: 400px;height:100px" src="images/logo2.jpg" alt=" " class="img-fluid">
                    </a>
                </div>
                <!-- //logo -->
                <!-- header-bot -->
                <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                    <div class="row">
                        <!-- search -->
                        <div class="col-10 agileits_search">
                            <form class="form-inline" action="search.php" method="post">
                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
                                <button class="btn my-2 my-sm-0" type="submit" name="ser">Search</button>
                            </form>
                        </div>
                        <!-- //search -->
                        <!-- cart details -->
                        <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                                <a href="cart.php">
                                    <button class="btn w3view-cart">
                                        <i class="fas fa-cart-arrow-down">
                                            <span class="badge badge-warning">
                                                <?php
                                                if (!empty($_SESSION["shopping_cart"])) {
                                                    $qtotal = 0;
                                                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                        $qtotal += $values["item_quantity"];
                                                    }
                                                    echo $qtotal;
                                                }
                                                ?>
                                            </span>
                                        </i>
                                    </button></a>
                            </div>
                        </div>
                        <!-- //cart details -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop locator (popup) -->
    <!-- //header-bottom -->