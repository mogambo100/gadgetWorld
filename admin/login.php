<?php

session_start();

if(isset($_SESSION['userid']))
{
    header('location:products.php');
}

$isvalid=true;

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include '../common/db.php';

	$userid=$_POST['userid'];
	$password=$_POST['password'];

	$admindl=new AdminDL(GetConnection());
	$admin=new Admin($userid,$userid,$password);

	$isvalid=$admindl->VerifyLogin($admin);

	if($isvalid)
	{
        session_start();
        $_SESSION['userid']=$userid;
		header('location:products.php');
	}
}


?>


<?php
include 'header-2.php';
?>

<div class="row">
    <div class="col-lg-4 col-md-4 col-md-offset-4">
        <h1 class="page-header" style="text-align: center">MYDEAL</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-4 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center">
            	LOGIN
            </div>
            <div class="panel-body">

				<?php if($isvalid===false) { ?>
					<div class="alert alert-danger">
	            		Invalid Username or EmailId or Password
	        		</div>	
	        	<?php } ?>

                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <form role="form" method="post">
	                        <div class="form-group">
                               <input name="userid" type="text" class="form-control" placeholder="User Id or Email">
                            </div>
							<div class="form-group">
                               <input name="password" type="password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-block btn-default">Submit Button</button>
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

			
<?php include 'footer.php'; ?>
