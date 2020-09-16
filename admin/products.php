<?php

include '../common/db.php';

$products=GetProducts();

?>


<?php include 'header.php'; ?>


<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">MYDEAL</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<a href="addproduct.php">Add New Product</a>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
	            <th>Id</th>
				<th>Bid</th>
				<th>Cid</th>
				<th>Name</th>
				<th>Price</th>
				<th>Command</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($products as $product) { ?>
			<tr>
				<td><?php echo $product['productid']; ?></td>
				<td><?php echo $product['brandid']; ?></td>
				<td><?php echo $product['categoryid']; ?></td>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['price']; ?></td>
				<td>
				<a href="deleteproduct.php?bid=<?php echo $product['productid']; ?>">
				<i class="fa fa-fw" aria-hidden="true" title="Copy to use trash-o"></i>
				</a>
				|
				<a href="updateproduct.php?bid=<?php echo $product['productid']; ?>">
				<i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i>
				</a>
				|
				<a href="addimages.php?pid=<?php echo $product['productid']; ?>"><i class="fa fa-fw" aria-hidden="true" title="Copy to use image"></i></a>
				</td>
			</tr>
			<?php } ?>
        </tbody>
    </table>
</div>
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



<?php include 'footer.php'; ?>