<?php
$pg = 'sort';
$pg_title = 'sort';
include('header.php');
?>
<!-- navigation -->
<div class="navbar-inner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </nav>
    </div>
</div>
<!-- //navigation -->

<!-- banner -->
<!-- //banner -->

<!-- top Products -->
<div class="">
    <div class="">
        <!-- tittle heading -->
        <!-- //tittle heading -->
        <div class="row">

            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="">
                    <!-- first section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                        <h3 class="heading-tittle text-center font-italic">
                            <?php
                            include('conn.php');
                            if (isset($_REQUEST['cid'])) {
                                $cate = $_REQUEST['cid'];
                            } else {
                                $cate = TRUE;
                            }
                            $sql4 = "SELECT * FROM cate WHERE cid = :cate";
                            $result4 = $conn->prepare($sql4);
                            $result4->execute(array(':cate' => $cate));
                            if ($result4->rowCount() > 0) {
                                while ($row4 = $result4->fetch(PDO::FETCH_ASSOC)) {
                                    echo strtoupper($row4['cate']);
                                }
                            } ?>

                        </h3>
                        <div class="row">
                            <!-- pdroduct display -->
                            <?php
                            include('conn.php');
                            if (isset($_REQUEST['sort'])) {
                                $sort = $_REQUEST['sort'];
                                if (isset($_REQUEST['cid'])) {
                                    $cate = $_REQUEST['cid'];
                                } else {
                                    $cate = TRUE;
                                }

                                //page limit
                                $limit = 8;
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = 1;
                                }
                                $offset = ($page - 1) * $limit;
                                // page limit code end
                                if ($sort == 'ut') {
                                    $sql = "SELECT * FROM shopping WHERE cate = :cate AND price <= 1000  LIMIT $offset,$limit";
                                } else if ($sort == 'btfive') {
                                    $sql = "SELECT * FROM shopping WHERE cate = :cate AND price BETWEEN 1000 AND 5000  LIMIT $offset,$limit";
                                } else if ($sort == 'bfiveten') {
                                    $sql = "SELECT * FROM shopping WHERE cate = :cate AND price BETWEEN 5000 AND 10000  LIMIT $offset,$limit";
                                } else if ($sort == 'btentwenty') {
                                    $sql = "SELECT * FROM shopping WHERE cate = :cate AND price BETWEEN 10000 AND 20000  LIMIT $offset,$limit";
                                } else if ($sort == 'btwentythirty') {
                                    $sql = "SELECT * FROM shopping WHERE cate = :cate AND price BETWEEN 20000 AND 30000  LIMIT $offset,$limit";
                                } else if ($sort == 'othirty') {
                                    $sql = "SELECT * FROM shopping WHERE cate = :cate AND price > 30000  LIMIT $offset,$limit";
                                }

                                $result = $conn->prepare($sql);
                                $result->execute(array(':cate' => $cate));
                                if ($result->rowCount() > 0) {
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                        <div class="col-md-3 product-men mt-5">
                                            <div class="men-pro-item simpleCart_shelfItem">
                                                <div class="men-thumb-item text-center">
                                                    <a href="single.php?id=<?php echo $row['id']; ?>"><img style="width: 100px;height:100px" src="Image/<?php echo $row['img']; ?>"></a>

                                                </div>
                                                <div class=" item-info-product text-center border-top mt-4">
                                                    <h4 class="pt-1">
                                                        <a href="single.php?id=<?php echo $row['id']; ?>"><?php echo strtoupper($row['name']); ?></a>
                                                    </h4>
                                                    <div class="info-product-price my-2">
                                                        <span class="item_price">$<?php echo $row['price']; ?></span>
                                                        <del>$<?php echo $row['discount']; ?></del></div>
                                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                        <form action="atc.php" method="post">
                                                            <fieldset>
                                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>" />
                                                                <input type="hidden" name="quant" value="1" />
                                                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>" />
                                                                <input type="hidden" name="item_img" value="<?php echo $row['img']; ?>" />

                                                                <input type="submit" name="atc" value="Add to cart" class="button btn" />
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php    }
                                } ?>
                                <!-- product Display end -->

                        </div>
                        <!-- pagination code start -->
                        <nav aria-label="..." style="margin-top: 10px">
                            <?php
                                include('conn.php');
                                $sql1 = "SELECT * FROM shopping WHERE cate = :cate";
                                $result1 = $conn->prepare($sql1);
                                $result1->execute(array(':cate' => $cate));
                                if ($result1->rowCount() > 0) {
                                    $total_record = $result1->rowCount();
                                    $total_page = ceil($total_record / $limit);
                            ?>
                                <ul class="pagination">
                                    <?php
                                    if ($page > 1) { ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="sort.php?page=<?php echo ($page - 1); ?>&cid=<?php echo $cate; ?>">Previous</a>
                                        </li>
                                    <?php }
                                    ?>

                                    <?php
                                    for ($i = 1; $i <= $total_page; $i++) {
                                        if ($page == $i) {
                                            $active = "active";
                                        } else {
                                            $active = "";
                                        }
                                    ?>
                                        <li class="page-item <?php echo $active ?>"><a class="page-link" href="sort.php?page=<?php echo $i ?>&cid=<?php echo $cate; ?>&sort=<?php echo $sort; ?>"><?php echo $i ?></a></li>
                                    <?php    }
                                    ?>

                                    <?php
                                    if ($page < $total_page) { ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="sort.php?page=<?php echo ($page + 1); ?>&cid=<?php echo $cate; ?>">Next</a>
                                        </li>
                                    <?php }
                                    ?>
                                </ul>
                            <?php }
                            ?>
                        </nav>

                        <!-- pagination code end -->
                    <?php } ?>
                    </div>
                    <!-- //first section -->
                </div>
            </div>
            <!-- //product left -->

            <!-- product right -->
            <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                <div class="side-bar p-sm-4 p-3">
                    <div class="agileits-navi_search">
                        <form action="#" method="post">
                            <select id="agileinfo-nav_search" onchange="location=this.value;" name="agileinfo_search" class="border" required="">
                                <option disabled selected value="">Category</option>
                                <option value="index.php">All
                                    <?php
                                    include('conn.php');


                                    $sqlc = "SELECT * FROM cate";
                                    $resultc = $conn->prepare($sqlc);
                                    $resultc->execute();
                                    if ($resultc->rowCount() > 0) {
                                        while ($rowc = $resultc->fetch(PDO::FETCH_ASSOC)) {

                                    ?>
                                <option value="cat.php?cid=<?php echo $rowc['cid']; ?>">
                                    <?php echo strtoupper($rowc['cate']); ?>
                                </option>
                        <?php
                                        }
                                    }
                        ?>
                            </select> </form>
                    </div>
                    <!-- price -->
                    <div class="range border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Price</h3>
                        <div class="w3l-range">
                            <ul>
                                <li>
                                    <a href="sort.php?sort=ut&cid=<?php echo $cate; ?>">Under $1,000</a>
                                </li>
                                <li class="my-1">
                                    <a href="sort.php?sort=btfive&cid=<?php echo $cate; ?>">$1,000 - $5,000</a>
                                </li>
                                <li>
                                    <a href="sort.php?sort=bfiveten&cid=<?php echo $cate; ?>">$5,000 - $10,000</a>
                                </li>
                                <li class="my-1">
                                    <a href="sort.php?sort=btentwenty&cid=<?php echo $cate; ?>">$10,000 - $20,000</a>
                                </li>
                                <li>
                                    <a href="sort.php?sort=btwentythirty&cid=<?php echo $cate; ?>">$20,000 $30,000</a>
                                </li>
                                <li class="mt-1">
                                    <a href="sort.php?sort=othirty&cid=<?php echo $cate; ?>">Over $30,000</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //price -->
                    <!-- recent start -->
                    <?php
                    require('recent.php');
                    ?>
                    <!-- recent end -->
                </div>
                <!-- //product right -->
            </div>
        </div>
    </div>
</div>
<!-- //top products -->

<?php
require('footer.php');
?>