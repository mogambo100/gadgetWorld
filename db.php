<?php

include 'model.php';


//Database Logic Layer

//Database Configuration Settings

$server='localhost';
$dbuser='id2986854_gadgetworld';
$dbpassword='gadgetworld';
$database='gadgetworld';


//Database Connection
$con=mysqli_connect($server,$dbuser,$dbpassword,$database);

function GetConnection()
{
	global $server,$dbuser,$dbpassword,$database;	
	return mysqli_connect($server,$dbuser,$dbpassword,$database);
}

//Database Functions for Table 'Category'

function AddCategory($name)
{
	global $con;

	$query="INSERT INTO category(name) VALUES('$name')";
	$result=mysqli_query($con,$query);
	return $result;
}

function DeleteCategory($categoryid)
{
	global $con;

	$query="DELETE FROM category WHERE categoryid=$categoryid";
	$result=mysqli_query($con,$query);
	return $result;
}

function UpdateCategory($categoryid,$name)
{
	global $con;

	$query="UPDATE category SET name='$name' WHERE categoryid=$categoryid";
	$result=mysqli_query($con,$query);
	return $result;
}

function GetCategory($categoryid)
{
	global $con;

	$query="SELECT * FROM category WHERE categoryid=$categoryid";
	$result=mysqli_query($con,$query);

	$record=mysqli_fetch_assoc($result);
	return $record;
}

function GetCategories()
{
	global $con;

	$query="SELECT * FROM category";
	$result=mysqli_query($con,$query);

	$data=array();
	while($record=mysqli_fetch_assoc($result))
	{
		$data[]=$record;
	}

	return $data;
}


//Database Functions for Table 'Brand'

function AddBrand($name,$logo)
{
	global $con;

	$query="INSERT INTO brand(name,logo) VALUES('$name','$logo')";
	$result=mysqli_query($con,$query);
	return $result;
}

function DeleteBrand($brandid)
{
	global $con;

	$query="DELETE FROM brand WHERE brandid=$brandid";
	$result=mysqli_query($con,$query);
	return $result;
}

function UpdateBrand($brandid,$name,$logo)
{
	global $con;

	$query="UPDATE brand SET name='$name',logo='$logo' WHERE brandid=$brandid";
	$result=mysqli_query($con,$query);
	echo mysqli_error($con);
	return $result;
}

function GetBrand($brandid)
{
	global $con;

	$query="SELECT * FROM brand WHERE brandid=$brandid";
	$result=mysqli_query($con,$query);

	$record=mysqli_fetch_assoc($result);
	return $record;
}

function GetBrands()
{
	global $con;

	$query="SELECT * FROM brand";
	$result=mysqli_query($con,$query);

	$data=array();
	while($record=mysqli_fetch_assoc($result))
	{
		$data[]=$record;
	}

	return $data;
}


//Database Functions for Table 'Product'

function AddProduct($bid,$cid,$name,$price)
{
	global $con;

	$query="INSERT INTO product(brandid,categoryid,name,price) VALUES($bid,$cid,'$name',$price)";
	$result=mysqli_query($con,$query);
	return mysqli_insert_id($con);
}

function DeleteProduct($productid)
{
	global $con;

	$query="DELETE FROM product WHERE productid=$productid";
	$result=mysqli_query($con,$query);
	return $result;
}

function UpdateProduct($productid,$bid,$cid,$name,$price)
{
	global $con;

	$query="UPDATE product SET name='$name',brandid=$bid,categoryid=$cid,price=$price WHERE productid=$productid";
	$result=mysqli_query($con,$query);
	echo mysqli_error($con);
	return $result;
}

function GetProduct($productid)
{
	global $con;

	$query="SELECT * FROM product WHERE productid=$productid";
	$result=mysqli_query($con,$query);

	$record=mysqli_fetch_assoc($result);
	return $record;
}

function GetProducts()
{
	global $con;

	$query="SELECT * FROM product";
	$result=mysqli_query($con,$query);

	$data=array();
	while($record=mysqli_fetch_assoc($result))
	{
		$data[]=$record;
	}

	return $data;
}


function GetProductsByCategory($category)
{
	global $con;

	$query="SELECT * FROM product WHERE categoryid=(SELECT categoryid FROM CATEGORY WHERE NAME LIKE '%$category%') ";
	$result=mysqli_query($con,$query);

	$data=array();
	while($record=mysqli_fetch_assoc($result))
	{
		$data[]=$record;
	}

	return $data;
}



//Database Functions for Table 'Images'

function AddImage($pid,$url,$tag="NA")
{
	global $con;

	$query="INSERT INTO images(productid,url,tag) VALUES($pid,'$url','$tag')";
	$result=mysqli_query($con,$query);
	echo mysqli_error($con);
	return $result;
}


function GetImagesByProduct($pid)
{
	global $con;

	$query="SELECT * FROM images WHERE productid=$pid";
	$result=mysqli_query($con,$query);

	$data=array();
	while($record=mysqli_fetch_assoc($result))
	{
		$data[]=$record;
	}

	return $data;
}


class AdminDL
{
	private $con;

	public function __construct($con)
	{
		$this->con=$con;
	}

	public function AddAdmin($admin)
	{
		$userid=$admin->GetUserId();
		$email=$admin->GetEmail();
		$password=$admin->GetPassword();

		$stmt=$this->con->prepare("INSERT INTO ADMIN(USERID,EMAIL,PASSWORD) VALUES(?,?,?)");

		$stmt->bind_param("sss",$userid,$email,$password);

		$result=$stmt->execute();
	}

	public function VerifyLogin($admin)
	{
		$userid=$admin->GetUserId();
		$email=$admin->GetEmail();
		$password=$admin->GetPassword();

		$result=$this->con->query("SELECT * FROM ADMIN WHERE (USERID='$userid' OR EMAIL='$email') AND PASSWORD='$password'");

		var_dump($result);

		if($result->num_rows>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}



class FeaturesLookupDL
{
	private $con;

	public function __construct($con)
	{
		$this->con=$con;
	}

	public function AddFeature($feature)
	{
		$categoryid=$feature->GetCategoryId();
		$name=$feature->GetName();
		

		$stmt=$this->con->prepare("INSERT INTO FEATURESLOOKUP(CATEGORYID,NAME) VALUES(?,?)");

		$stmt->bind_param("is",$categoryid,$name);

		$result=$stmt->execute();
	}

	public function GetFeatures($cid)
	{
		$result=$this->con->query("SELECT * FROM FEATURESLOOKUP WHERE CATEGORYID=$cid");


		$features=array();
		while($record=$result->fetch_assoc())
		{
			$features[]=$record;
		}

		return $features;
	}

	public function GetFeatureName($fid)
	{
		$result=$this->con->query("SELECT name FROM FEATURESLOOKUP WHERE FEATUREID=$fid");
		$record=$result->fetch_assoc();

		return $record['name'];
	}
}


class FeaturesValueDL
{
	private $con;

	public function __construct($con)
	{
		$this->con=$con;
	}

	public function AddFeature($feature)
	{
		$featureid=$feature->GetFeatureId();
		$productid=$feature->GetProductId();
		$value=$feature->GetValue();
		

		$stmt=$this->con->prepare("INSERT INTO FEATURESVALUES(FEATUREID,PRODUCTID,VALUE) VALUES(?,?,?)");

		$stmt->bind_param("iis",$featureid,$productid,$value);

		$result=$stmt->execute();
	}

	public function GetFeatures($pid)
	{
		$result=$this->con->query("SELECT * FROM FEATURESVALUES WHERE PRODUCTID=$pid");


		$features=array();
		while($record=$result->fetch_assoc())
		{
			$features[]=$record;
		}

		return $features;
	}

}



?>