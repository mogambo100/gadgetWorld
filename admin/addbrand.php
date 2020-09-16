<!DOCTYPE html>
<?php

include '../common/db.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$name=$_POST['name'];
	$logo=$_FILES['logo']['name'];

	$result=AddBrand($name,$logo);
	if($result>0)
	{
		$tmpname=$_FILES['logo']['tmp_name'];
		move_uploaded_file($tmpname, "../images/" . $logo);
	}
}

?>

<?php
include 'header.php';
?>

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
            	Add New Brand
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post" enctype="multipart/form-data">
	                        <div class="form-group">
    	                       <label>Brand Name</label>
                               <input name="name" type="text" class="form-control">
                            </div>
							<div class="form-group">
                                <label>Brand Logo</label>
                                <input type="file" name="logo">
                            </div>
                            <div class="form-group">
                                <label>Brand Description</label>
                                <input type="text" name="desc">
                            </div>
                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
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
