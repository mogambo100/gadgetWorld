<!DOCTYPE html>
<?php

include '../common/db.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{

    $name=$_POST['name'];
	$bid=$_POST['bid'];
	$cid=$_POST['cid'];
	$price=$_POST['price'];


	$result=AddProduct($bid,$cid,$name,$price);
    
    if($result>0)
    {
        $featuresdl = new FeaturesValueDL(GetConnection());

        $productid=$result;   
        $features=$_POST['features'];
        foreach ($features as $featureid => $value) 
        {
            $feature=new FeaturesValues($featureid,$productid,$value);
            $featuresdl->AddFeature($feature);
        }     
    }
}

$categories=GetCategories();
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
            	Add New Product
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="post" enctype="multipart/form-data">

                        	<div class="form-group">
                                <label>Category</label>                                
                                <select class="form-control" name="cid" onchange="LoadFeatures(this.value);">
                                    <option value="0">Select Category</option>
                                    <?php foreach($categories as $category) { ?>
									<option value="<?php echo $category['categoryid']  ?>"><?php echo $category['name']; ?></option>
									<?php } ?>
                                </select>
            				</div>

                        	<div class="form-group">
                                <label>Brand</label>
                                <select class="form-control" name="bid">
                                    <option value="0">Select Brand</option>
                                    <?php foreach($brands as $brand) { ?>
									<option value="<?php echo $brand['brandid']; ?>"><?php echo $brand['name']; ?></option>
									<?php } ?>
                                </select>
            				</div>

	                        <div class="form-group">
    	                       <label>Product Name</label>
                               <input name="name" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                            	<label>Product Price</label>
                            	<input type="text" name="price" class="form-control">
                            </div>

                            <div id="features">
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