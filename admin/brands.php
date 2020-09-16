<?php

include '../common/db.php';

$brands=GetBrands();

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
<a href="addbrand.php">Add New Brand</a>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
	            <th>Id</th>				
				<th>Name</th>			
				<th>Logo</th>
				<th>Command</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($brands as $brand) { ?>
		<tr>
			<td><?php echo $brand['brandid']; ?></td>
			<td><?php echo $brand['name']; ?></td>
			<td><img width="30px" height="30px" src="<?php echo "../images/" . $brand['logo']; ?>"></td>
			<td>
			<a href="deletebrand.php?bid=<?php echo $brand['brandid']; ?>">
			<i class="fa fa-fw" aria-hidden="true" title="Copy to use trash-o"></i>			
			</a>

			<a href="updatebrand.php?bid=<?php echo $brand['brandid']; ?>">
			<i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i>
			</a>

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