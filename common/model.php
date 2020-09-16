<?php

//Admin Model

class Admin
{
	private $id;
	private $userid;
	private $email;
	private $password;

	public function __construct($userid,$email,$password)
	{
		$this->userid=$userid;
		$this->email=$email;
		$this->password=$password;
	}

	public function GetId()
	{
		return $this->id;
	}

	public function SetUserId($userid)
	{
		$this->userid=$userid;
	}

	public function GetUserId()
	{
		return $this->userid;
	}

	public function SetEmail($email)
	{
		$this->email=$email;
	}

	public function GetEmail()
	{
		return $this->email;
	}

	public function SetPassword($password)
	{
		$this->password=$password;
	}

	public function GetPassword()
	{
		return $this->password;
	}
}

class FeaturesLookup
{
	private $featureid;
	private $categoryid;
	private $name;

	public function __construct($categoryid,$name)
	{
		$this->categoryid=$categoryid;
		$this->name=$name;
	}

	public function SetCategoryId($categoryid)
	{
		$this->categoryid=$categoryid;
	}

	public function GetCategoryId()
	{
		return $this->categoryid;
	}

	public function SetName($name)
	{
		$this->name=$name;		
	}

	public function GetName()
	{
		return $this->name;
	}
}

class FeaturesValues
{
	private $valueid;
	private $featureid;
	private $productid;
	private $value;

	public function __construct($featureid,$productid,$value)
	{
		$this->featureid=$featureid;
		$this->productid=$productid;
		$this->value=$value;
	}

	public function SetFeatureId($featureid)
	{
		$this->featureid=$featureid;
	}

	public function GetFeatureId()
	{
		return $this->featureid;
	}


	public function SetProductId($productid)
	{
		$this->productid=$productid;
	}

	public function GetProductId()
	{
		return $this->productid;
	}


	public function SetValue($value)
	{
		$this->value=$value;		
	}

	public function GetValue()
	{
		return $this->value;
	}
}


?>