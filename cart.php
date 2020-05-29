<?php
$pg = 'cart';
$pg_title = 'cart';
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

<!-- banner-2 -->
<!-- //banner-2 -->
<!-- page -->

<!-- //page -->
<!-- checkout page -->
<div class="">
	<div class="container ">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>C</span>heckout
		</h3>
		<!-- //tittle heading -->
		<div class="checkout-right">
			<h4 class="mb-sm-4 mb-3">Your shopping cart contains:
				<span><?php
						if (!empty($_SESSION["shopping_cart"])) {
							$qtotal = 0;
							foreach ($_SESSION["shopping_cart"] as $keys => $values) {
								$qtotal += $values["item_quantity"];
							}
							echo $qtotal;
						}
						?> Products</span>
			</h4>
			<div class="table-responsive">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>
							<th>Product</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Quality</th>
							<th>Total</th>
							<th>Update</th>
							<th>Buy Now</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (!empty($_SESSION["shopping_cart"])) {
							$srno = 0;
							$total = 0;
							foreach ($_SESSION["shopping_cart"] as $keys => $values) {
								$srno++;
						?>
								<tr class="rem1">
									<td class="invert"><?php echo $srno; ?></td>
									<td class="invert-image">
										<a href="single.php?id=<?php echo $values["item_id"]; ?>">
											<img style="width: 50px;height:50px" src="Image/<?php echo $values["item_img"]; ?>" alt=" " class="img-responsive">
										</a>
									</td>
									<form action="action.php" method="post">
										<td class="invert"> <a href="single.php?id=<?php echo $values["item_id"]; ?>"><?php echo strtoupper($values["item_name"]); ?></a>

										</td>
										<td class="invert">$<?php echo $values["item_price"]; ?></td>
										<td class="invert">
											<!-- <div class="quantity">
												<div class="quantity-select">
													<div class="entry value-minus">&nbsp;</div>
													<div class="entry value"> -->
											<input type="text" name="item_quantity" value="<?php echo $values["item_quantity"]; ?>" id="">
											<input type="hidden" name="item_id" value="<?php echo $values["item_id"]; ?>">
											<!-- </div>
													<div class="entry value-plus active">&nbsp;</div>
												</div>
											</div> -->
										</td>


										<td>$<?php echo $values["item_quantity"] * $values["item_price"]; ?></td>
										<td><input type="submit" value="Update" name="update" class="btn btn-info">
									</form>
									</td>
									<td>
										<form action="buy.php" method="post">
											<input type="hidden" name="item_quantity" value="<?php echo $values["item_quantity"]; ?>" id="">
											<input type="hidden" name="id" value="<?php echo $values["item_id"]; ?>">
											<input type="submit" value="Buy Now" name="buynow" class="btn btn-info">
										</form>
									</td>

									<td class="invert">
										<a href="action.php?action=remove&id=<?php echo $values["item_id"]; ?>">
											<div class="rem">
												<div class="close3"> </div>
											</div>
										</a>
									</td>


								</tr>
							<?php
								$total = $total + ($values["item_quantity"] * $values["item_price"]);
							}
							?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Total</td>
								<td>$<?php echo $total; ?></td>
								<td></td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>
<!-- //checkout page -->

<!-- middle section -->

<!-- middle section -->

<!-- footer -->

<!-- //footer -->
<!-- copyright -->

<!-- //copyright -->

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
	paypals.minicarts
		.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

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

<!-- quantity -->
<script>
	$('.value-plus').on('click', function() {
		var divUpd = $(this).parent().find('.value'),
			newVal = parseInt(divUpd.text(), 10) + 1;
		divUpd.text(newVal);
	});

	$('.value-minus').on('click', function() {
		var divUpd = $(this).parent().find('.value'),
			newVal = parseInt(divUpd.text(), 10) - 1;
		if (newVal >= 1) divUpd.text(newVal);
	});
</script>
<!--quantity-->
<script>
	$(document).ready(function(c) {
		$('.close1').on('click', function(c) {
			$('.rem1').fadeOut('slow', function(c) {
				$('.rem1').remove();
			});
		});
	});
</script>
<script>
	$(document).ready(function(c) {
		$('.close2').on('click', function(c) {
			$('.rem2').fadeOut('slow', function(c) {
				$('.rem2').remove();
			});
		});
	});
</script>
<script>
	$(document).ready(function(c) {
		$('.close3').on('click', function(c) {
			$('.rem3').fadeOut('slow', function(c) {
				$('.rem3').remove();
			});
		});
	});
</script>
<!-- //quantity -->

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