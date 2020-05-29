<?php
$pg = 'single';
$pg_title = 'single';
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


<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>S</span>ingle
			<span>P</span>age</h3>
		<!-- //tittle heading -->

		<?php
		include('conn.php');
		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM shopping WHERE id = :id";
			$result = $conn->prepare($sql);
			$result->execute(array(':id' => $id));
			if ($result->rowCount() > 0) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		?>


					<div class="row">
						<div class="col-lg-5 col-md-8 single-right-left ">
							<div class="grid images_3_of_2">
								<div class="flexslider">
									<ul class="slides">
										<li data-thumb="Image/<?php echo $row['img']; ?>">
											<div class="thumb-image">
												<img src="Image/<?php echo $row['img']; ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
										</li>

									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>


						<div class="col-lg-7 single-right-left simpleCart_shelfItem">
							<h3 class="mb-3"><?php echo  strtoupper($row['name']); ?></h3>
							<p class="mb-3">
								<span class="item_price">$<?php echo $row['price']; ?></span>
								<del class="mx-2 font-weight-light">$<?php echo $row['discount']; ?></del>
								<label>Free delivery</label>
							</p>
							<div class="single-infoagile">
								<ul>
									<li class="mb-3">
										Cash on Delivery Eligible.
									</li>
									<li class="mb-3">
										Shipping Speed to Delivery.
									</li>
									<li class="mb-3">
										EMIs from $655/month.
									</li>
									<li class="mb-3">
										Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C
									</li>
								</ul>
							</div>
							<div class="product-single-w3l">
								<p class="my-3">
									<i class="far fa-hand-point-right mr-2"></i>
									<label>1 Year </label> Warranty</p>
								<ul>
								<?php echo $row['disc']; ?>
								</ul>
								<p class="my-sm-4 my-3">
									<i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
								</p>
							</div>
							<div class="occasion-cart">
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
		<?php
				}
			}
		}
		?>
	</div>
</div>
<!-- //Single Page -->



<!-- js-files -->
<!-- jquery -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- //jquery -->

<!-- nav smooth scroll -->
<script>
	$(document).ready(function() {
		$(".dropdown").hover(
			function() {
				$('.dropdown-menu', this).stop(true, true).slideDown("fast");
				$(this).toggleClass('open');
			},
			function() {
				$('.dropdown-menu', this).stop(true, true).slideUp("fast");
				$(this).toggleClass('open');
			}
		);
	});
</script>
<!-- //nav smooth scroll -->

<!-- popup modal (for location)-->
<script src="js/jquery.magnific-popup.js"></script>
<script>
	$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

	});
</script>
<!-- //popup modal (for location)-->

<!-- cart-js -->
<script src="js/minicart.js"></script>
<script>
	paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

	paypals.minicarts.cart.on('checkout', function(evt) {
		var items = this.items(),
			len = items.length,
			total = 0,
			i;

		// Count the number of each item in the cart
		for (i = 0; i < len; i++) {
			total += items[i].get('quantity');
		}

		if (total < 3) {
			alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
			evt.preventDefault();
		}
	});
</script>
<!-- //cart-js -->

<!-- password-script -->
<script>
	window.onload = function() {
		document.getElementById("password1").onchange = validatePassword;
		document.getElementById("password2").onchange = validatePassword;
	}

	function validatePassword() {
		var pass2 = document.getElementById("password2").value;
		var pass1 = document.getElementById("password1").value;
		if (pass1 != pass2)
			document.getElementById("password2").setCustomValidity("Passwords Don't Match");
		else
			document.getElementById("password2").setCustomValidity('');
		//empty string means no validation error
	}
</script>
<!-- //password-script -->

<!-- imagezoom -->
<script src="js/imagezoom.js"></script>
<!-- //imagezoom -->

<!-- flexslider -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script src="js/jquery.flexslider.js"></script>
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>
<!-- //FlexSlider-->

<!-- smoothscroll -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event) {
			event.preventDefault();

			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script>
	$(document).ready(function() {
		/*
		var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		*/
		$().UItoTop({
			easingType: 'easeOutQuart'
		});

	});
</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- //js-files -->

</body>

</html>