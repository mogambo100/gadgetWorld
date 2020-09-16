<?php

include '../common/db.php';

if(!isset($_GET['pid']))
{
	header('location:products.php');
}

$pid=$_GET['pid'];

if($_SERVER['REQUEST_METHOD']=='POST')
{

	$index=0;
	foreach($_FILES['images']['name'] as $name)
	{
		$tmp_name=$_FILES['images']['tmp_name'][$index];
		$index++;

		move_uploaded_file($tmp_name, "../images/" . $name);

		AddImage($pid,$name);
	}
	
}

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
            	Add New Product
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="post" enctype="multipart/form-data">


                            <div class="form-group">
                            <table style="width:100%">
                            <tr>
                            <?php

                            $images=GetImagesByProduct($pid);
                            foreach($images as $image)
                            {

                            ?>
                            <td>
                            <img src="../images/<?php echo $image['url']?>" height="100px" width="100px">
                            </td>
                            <?php } ?>
                            <br><br>
                            </tr>
                            </table>

                            	<label>Upload Images</label>
                            	<input type="file" name="images[]" multiple="multiple" class="form-control">
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
