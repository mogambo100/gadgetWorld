<!DOCTYPE html>
<?php

include '../common/db.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$name=$_POST['name'];
	$result=AddCategory($name);
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
            	Add New Category
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post">
	                        <div class="form-group">
    	                       <label>Category Name</label>
                               <input name="name" type="text" class="form-control">
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