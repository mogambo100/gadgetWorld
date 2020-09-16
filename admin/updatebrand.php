<?php

include '../common/db.php';

$bid=$_GET['bid'];

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$name=$_POST['name'];
	$logo=$_POST['old_logo'];

	if(!empty($_FILES['logo']['name']))
	{
		$logo=$_FILES['logo']['name'];
		$tmp_name=$_FILES['logo']['tmp_name'];
		move_uploaded_file($tmp_name, $logo);
	}

	$result=UpdateBrand($bid,$name,"../images/".$logo);
	if($result>0)
	{
		header('location:brands.php');
	}
}

//Get Brand Data
$brand=GetBrand($bid);

?>


<?php include 'header.php'; ?>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td colspan="3"><center>Update Brand</center></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Brand Name</td>
				<td><input type="text" name="name" value="<?php echo $brand['name']; ?>"></td>
				<td></td>
			</tr>
			<tr>
				<td>Brand Logo</td>
				<td><input type="file" name="logo"></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit"></td>
				<td></td>
			</tr>
			<input type="hidden" name="old_logo" value="<?php echo $brand['logo']; ?>">
		</table>
	</form>
<?php include 'footer.php'; ?>