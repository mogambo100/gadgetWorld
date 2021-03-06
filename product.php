<?php

include 'common/db.php';

if(!isset($_GET['pid']))
{
	header('location:home.php');
}


$pid=$_GET['pid'];
$product=GetProduct($pid);
$productimages=GetImagesByProduct($pid);


//Get Features List
$featuresdl = new FeaturesValueDL(GetConnection());
$features=$featuresdl->GetFeatures($pid);


?>


<?php include 'header.php'; ?>

	<!--single-page-->
	<div class="single-page main-grid-border">
		<div class="container">
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="index.html">Home</a></li>
				<li><a href="all-classifieds.html">All Ads</a></li>
				<li class="active"><a href="mobiles.html">Mobiles</a></li>
				<li class="active">Mobile Phone</li>
			</ol>
			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2><?php echo $product['name']; ?></h2>
					<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">state</a>, <a href="#">city</a>| Added at 06:55 pm, Ad ID: 987654321</p>
					<div class="flexslider">
						<ul class="slides">
							<?php foreach($productimages as $image) { ?>
							<li data-thumb="images/<?php echo $image['url']; ?>">
								<img src="images/<?php echo $image['url']; ?>" />
							</li>
							<?php } ?>
						</ul>
					</div>
					<!-- FlexSlider -->
					  <script defer src="assets/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />

						<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
					<!-- //FlexSlider -->
					<div class="product-details">
						<h4>Brand : <a href="#">Company name</a></h4>
						<h4>Views : <strong>150</strong></h4>
						<p><strong>Display </strong>: 1.5 inch HD LCD Touch Screen</p>
						<p><strong>Summary</strong> : It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
					
						<table class="table table-striped table-bordered">
							<?php foreach ($features as $feature) { ?>
							<tr>
								<td>
									<?php 
										$featureslookupdl = new FeaturesLookupDL(GetConnection());
										$fname=$featureslookupdl->GetFeatureName($feature['featureid']);
										echo $fname;
								 	?>								 
								</td>
								<td><?php echo $feature['value']; ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>


				</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">
						<div class="product-price">
							<p class="p-price">Price</p>
							<h3 class="rate">&#8377; <?php echo $product['price']; ?></h3>
							<div class="clearfix"></div>
						</div>
						<div class="condition">
							<p class="p-price">Verdict</p>
							<h4>Hot</h4>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
							<p class="p-price">Item Type</p>
							<h4>Phone</h4>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="interested text-center">
						<h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
						<p><i class="glyphicon glyphicon-earphone"></i>00-85-9875462655</p>
					</div>
						<div class="tips">
						<h4>Popular Mobiles</h4>
							<ol>
								<li><a href="#">Samsung Galaxy S8</a></li>
								<li><a href="#">Apple Iphone 7</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
								<li><a href="#">Contrary to popular belief.</a></li>
							</ol>
						</div>
				</div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//single-page-->
<?php include 'footer.php'; ?>