	<!-- recent -->
	<div class="f-grid py-2">
		<h3 class="agileits-sear-head mb-3">Recent</h3>
		<div class="box-scroll">
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
				<div class="">
					<?php
					include('conn.php');
					$sql2 = "SELECT * FROM shopping ORDER BY id DESC LIMIT 4";
					$result2 = $conn->prepare($sql2);
					$result2->execute();
					if ($result2->rowCount() > 0) {
						while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
					?>
							<div style="margin-bottom: 10px" class="row">
								<div class="col-lg-3 col-sm-2 col-3 left-mar">
									<a href="single.php?id=<?php echo $row2['id']; ?>"><img style="width: 30px;height:30px" src="Image/<?php echo $row2['img']; ?>" alt="" class="img-fluid"></a>
								</div>
								<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
									<a href="single.php?id=<?php echo $row2['id']; ?>"><?php echo strtoupper($row2['name']); ?></a>
									<a href="" class="price-mar mt-2">$<?php echo $row2['price']; ?></a>
								</div>
							</div>
					<?php }
					} ?>

				</div>
			</marquee>
		</div>
	</div>
	<!-- //recent -->