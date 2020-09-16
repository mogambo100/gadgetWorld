<?php

include 'common/db.php';
$mobiles=GetProductsByCategory("Mobile");
$cameras=GetProductsByCategory("Camera");

?>




<?php include 'header.php'; ?>
		<!-- content-starts-here -->
		<div class="content">
			<div class="categories">
				<div class="container">
					<div class="col-md-2 focus-grid">
						<a href="all-products.php?type=mobile">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-mobile"></i></div>
									<h4 class="clrchg">Mobiles</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-2 focus-grid">
						<a href="all-products.php?type=tablet">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-laptop"></i></div>
									<h4 class="clrchg">Tablets</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-2 focus-grid">
						<a href="all-products.php?type=laptop">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-paw"></i></div>
									<h4 class="clrchg">Laptops</h4>
								</div>
							</div>
						</a>
					</div>	
					<div class="col-md-2 focus-grid">
						<a href="all-products.php?type=camera">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-book"></i></div>
									<h4 class="clrchg">Cameras</h4>
								</div>
							</div>
						</a>
					</div>	
					<div class="col-md-2 focus-grid">
						<a href="all-products.php?type=tv">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-asterisk"></i></div>
									<h4 class="clrchg">TV</h4>
								</div>
							</div>
						</a>
					</div>	
					<div class="col-md-2 focus-grid">
						<a href="all-products.php?type=accessories">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-asterisk"></i></div>
									<h4 class="clrchg">Accessories</h4>
								</div>
							</div>
						</a>
					</div>	
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="trending-ads">
				<div class="container">
				<!-- slider -->
				<div class="trend-ads">
					<h2>Latest Mobiles</h2>					
					<div class="row" id="flexiselDemo3">
					<?php foreach ($mobiles as $mobile) {
						$image=GetImagesByProduct($mobile['productid'])[0]; 
					?>	
						<div class="col-md-3 biseller-column">
							<a href="product.php?pid=<?php echo $mobile['productid']; ?>">
								<img  src="images/<?php echo $image['url']; ?>"/>
								<span class="price">&#8377; <?php echo $mobile['price']; ?></span>
							</a> 
							<div class="ad-info">
								<h5><?php echo $mobile['name']; ?></h5>
								<span>1 hour ago</span>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>				
			</div>							
								
			<div class="trending-ads">
				<div class="container">
				<!-- slider -->
				<div class="trend-ads">
					<h2>Latest Cameras</h2>					
					<div class="row" id="flexiselDemo3">
					<?php foreach ($cameras as $camera) {
						$image=GetImagesByProduct($camera['productid'])[0]; 
					?>	
						<div class="col-md-3 biseller-column">
							<a href="details.php?pid=<?php echo $camera['productid']; ?>">
								<img src="images/<?php echo $image['url']; ?>"/>
								<span class="price">&#8377; <?php echo $camera['price']; ?></span>
							</a> 
							<div class="ad-info">
								<h5><?php echo $camera['name']; ?></h5>
								<span>1 hour ago</span>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>				
			</div>							



					<script type="text/javascript">
						 $(window).load(function() {
							$("#flexiselDemo3").flexisel({
								visibleItems:1,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 5000,    		
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: { 
									portrait: { 
										changePoint:480,
										visibleItems:1
									}, 
									landscape: { 
										changePoint:640,
										visibleItems:1
									},
									tablet: { 
										changePoint:768,
										visibleItems:1
									}
								}
							});
							
						});
					   </script>
					   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
					</div>   
			</div>
			<!-- //slider -->				
			</div>
		</div>
<?php include 'footer.php'; ?>
