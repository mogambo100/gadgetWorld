<?php

include 'common/db.php';


if(!isset($_GET['type']))
{
	header('location:home.php');
}


$products=array();
switch (strtolower($_GET['type'])) 
{
	case 'mobile':
		$products=GetProductsByCategory("Mobile");
		break;	
}

$mobiles=GetProductsByCategory("Mobile");
$tablets=GetProductsByCategory("Tablet");
$laptops=GetProductsByCategory("Laptop");
$cameras=GetProductsByCategory("Camera");
$tvs=GetProductsByCategory("TV");
$accessories=GetProductsByCategory("Accessory");

?>

<?php include 'header.php'; ?>
<div class="total-ads main-grid-border">
		<div class="container">
			<div class="select-box">
				<div class="search-product ads-list" style="float:right;">
					<label>Search for a specific product</label>
					<div class="search">
						<div id="custom-search-input">
						<div class="input-group">
							<input type="text" class="form-control input-lg" placeholder="Buscar">
							<span class="input-group-btn">
								<button class="btn btn-info btn-lg" type="button">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</span>
						</div>
					</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="all-categories">
				<h3> Select your category and find the perfect gadget</h3>
				<ul class="all-cat-list">
					<li><a href="all-products.php?type=mobile">Mobiles <span class="num-of-ads">(<?php echo count($mobiles); ?>)</span></a></li>
					<li><a href="all-products.php?type=tablet">Tablets  <span class="num-of-ads">(<?php echo count($tablets); ?>)</span></a></li>
					<li><a href="all-products.php?type=laptop">Laptops  <span class="num-of-ads">(<?php echo count($laptops); ?>)</span></a></li>
					<li><a href="all-products.php?type=camera">Cameras    <span class="num-of-ads">(<?php echo count($cameras); ?>)</span></a></li>
					<li><a href="all-products.php?type=tv">TVs   <span class="num-of-ads">(<?php echo count($tvs); ?>)</span></a></li>
					<li><a href="all-products.php?type=accessory">Accessories    <span class="num-of-ads">(<?php echo count($accessories); ?>)</span></a></li>
				</ul>
			</div>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="index.html">Home</a></li>
			  <li class="active">All Products</li>
			</ol>
			<!---728x90--->
			<div class="ads-grid">
				<div class="side-bar col-md-3">
					<div class="search-hotel">
					<h3 class="sear-head">Name contains</h3>
					<form lpformnum="1">
						<input type="text" value="Product name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Product name...';}" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				
				<div class="range">
					<h3 class="sear-head">Price range</h3>
							<ul class="dropdown-menu6">
								<li>
									                
									<div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header" style="left: 0.555556%; width: 66.1111%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0.555556%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 66.6667%;"></a></div>							
										<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;">
									</li>			
							</ul>
							<!---->
							<script type="text/javascript" src="js/jquery-ui.js"></script>
							<script type="text/javascript">//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 50, 6000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
							
				</div>
				<div class="featured-ads">
					<h2 class="sear-head fer">Featured Ads</h2>
					<div class="featured-ad">
						<a href="single.html">
							<div class="featured-ad-left">
								<img src="images/f1.jpg" title="ad image" alt="">
							</div>
							<div class="featured-ad-right">
								<h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
								<p>$ 450</p>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
					<div class="featured-ad">
						<a href="single.html">
							<div class="featured-ad-left">
								<img src="images/f2.jpg" title="ad image" alt="">
							</div>
							<div class="featured-ad-right">
								<h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
								<p>$ 380</p>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
					<div class="featured-ad">
						<a href="single.html">
							<div class="featured-ad-left">
								<img src="images/f3.jpg" title="ad image" alt="">
							</div>
							<div class="featured-ad-right">
								<h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
								<p>$ 560</p>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
				</div>
				<div class="ads-display col-md-9">
					<div class="wrapper">					
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div>
												<div id="container">
								<div class="view-controls-list" id="viewcontrols">
									<label>view :</label>
									<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
									<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
								</div>
								<div class="sort">
								   <div class="sort-by">
										<label>Sort By : </label>
										<select>
														<option value="">Most recent</option>
														<option value="">Price: Rs Low to High</option>
														<option value="">Price: Rs High to Low</option>
										</select>
									   </div>
									 </div>
								<div class="clearfix"></div>
							<ul class="list">
							<?php 
								$records=count($products);
								$i=1;
								foreach ($products as $product) 
								{
									$image=GetImagesByProduct($product['productid'])[0]; 	
									if($i!=$records)
									{							
							?>	
										<a href="single.html">
											<li>
											<img src="images/<?php echo $image['url']; ?>" title="" alt="">
											<section class="list-left">
											<h5 class="title"><?php echo $product['name']; ?></h5>
											<span class="adprice">&#8377; <?php echo $product['price']; ?></span>
											<p class="catpath">Mobile Phones » Brand</p>
											</section>
											<section class="list-right">
											<span class="date">Today, 17:55</span>
											<span class="cityname">City name</span>
											</section>
											<div class="clearfix"></div>
											</li> 
										</a>
							<?php 	}
									else
									{ 
							?>
										<a href="single.html">
										<li>
										<img src="images/<?php echo $image['url']; ?>" title="" alt="">
										<section class="list-left">
										<h5 class="title"><?php echo $product['name']; ?></h5>
										<span class="adprice">&#8377; <?php echo $product['price']; ?></span>
										<p class="catpath">Mobile Phones » Brand</p>
										</section>
										<section class="list-right">
										<span class="date">Today, 17:02</span>
										<span class="cityname">City name</span>
										</section>
										<div class="clearfix"></div>
										</li> 
										<div class="clearfix"></div>
										</a>
							<?php 
									}
								}
							?>
							</ul>
						</div>
							</div>
						</div>
						<ul class="pagination pagination-sm">
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">6</a></li>
							<li><a href="#">7</a></li>
							<li><a href="#">8</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					  </div>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
<?php echo 'footer.php'; ?>

<!-- js -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="assets/js/jquery.leanModal.min.js"></script>
<link href="assets/css/jquery.uls.css" rel="stylesheet"/>
<link href="assets/css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="assets/css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="assets/js/jquery.uls.data.js"></script>
<script src="assets/js/jquery.uls.data.utils.js"></script>
<script src="assets/js/jquery.uls.lcd.js"></script>
<script src="assets/js/jquery.uls.languagefilter.js"></script>
<script src="assets/js/jquery.uls.regionfilter.js"></script>
<script src="assets/js/jquery.uls.core.js"></script>
<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
    <script src="js/tabs.js"></script>
	
<script type="text/javascript">
$(document).ready(function () {    
var elem=$('#container ul');      
	$('#viewcontrols a').on('click',function(e) {
		if ($(this).hasClass('gridview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('list').addClass('grid');
				$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
				$('#viewcontrols .gridview').addClass('active');
				$('#viewcontrols .listview').removeClass('active');
				elem.fadeIn(1000);
			});						
		}
		else if($(this).hasClass('listview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('grid').addClass('list');
				$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
				$('#viewcontrols .gridview').removeClass('active');
				$('#viewcontrols .listview').addClass('active');
				elem.fadeIn(1000);
			});									
		}
	});
});
</script>


