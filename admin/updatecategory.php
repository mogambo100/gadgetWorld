<?php

include '../common/db.php';

$cid=$_GET['cid'];

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$name=$_POST['name'];
	$result=UpdateCategory($cid,$name);
	if($result>0)
	{
		header('location:categories.php');
	}
}

//Get Category Data
$category=GetCategory($cid);

?>


<?php include 'footer.php'; ?>	
	<form action="" method="post">
		<table>
			<tr>
				<td colspan="3"><center>Update Category</center></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Category Name</td>
				<td><input type="text" name="name" value="<?php echo $category['name']; ?>"></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit"></td>
				<td></td>
			</tr>
		</table>
	</form>
<?php include 'footer.php'; ?>