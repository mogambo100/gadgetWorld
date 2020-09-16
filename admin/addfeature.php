<?php

include '../common/db.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $categoryid=$_POST['cid'];
    $name=$_POST['name'];    

    $featuredl=new FeaturesLookupDL(GetConnection());
    $feature=new FeaturesLookup($categoryid,$name);

    $featuredl->AddFeature($feature);
}

$categories=GetCategories();

?>

<?php
include 'header.php';
?>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gadget World</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            	Add New Feature
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post">
	                        <div class="form-group">
    	                       <label>Category</label>
                               <select class="form-control" name="cid">
                                    <?php foreach($categories as $category) { ?>
                                    <option value="<?php echo $category['categoryid']  ?>"><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
							<div class="form-group">
                                <label>Feature Name</label>
                                <input type="text" name="name" class="form-control">
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
