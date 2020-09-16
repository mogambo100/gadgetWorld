<?php

include '../common/db.php';

$categoryid=$_GET['cid'];

$featuresdl = new FeaturesLookupDL(GetConnection());
$features=$featuresdl->GetFeatures($categoryid);

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
<a href="addfeature.php">Add New Feature</a>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
	            <th>Feature Id</th>
				<th>Category Id</th>
				<th>Name</th>
				<th>Command</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($features as $feature) { ?>
			<tr>
				<td><?php echo $feature['featureid']; ?></td>
				<td><?php echo $feature['categoryid']; ?></td>
				<td><?php echo $feature['name']; ?></td>
				<td>
				<a href="deletefeature.php?fid=<?php echo $feature['featureid']; ?>">
				<i class="fa fa-fw" aria-hidden="true" title="Copy to use trash-o"></i>
				</a>
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