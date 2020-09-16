<?php

include '../common/db.php';


$categories=GetCategories();

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
<a href="addcategory.php">Add New Category</a>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
	            <th>Id</th>				
				<th>Name</th>			
				<th>Command</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($categories as $category) { ?>
		<tr>
			<td><?php echo $category['categoryid']; ?></td>
			<td><?php echo $category['name']; ?></td>
			<td>
			<a href="deletecategory.php?cid=<?php echo $category['categoryid']; ?>">
			<i class="fa fa-fw" aria-hidden="true" title="Copy to use trash-o"></i>
			</a>

			<a href="updatecategory.php?cid=<?php echo $category['categoryid']; ?>">
			<i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i>
			</a>

			<a href="features.php?cid=<?php echo $category['categoryid']; ?>">
			Manage Features
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