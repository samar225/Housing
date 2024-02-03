<?php
class Product
{
	private $host  = 'localhost';
	private $user  = 'root';
	private $password   = "";
	private $database  = "uni";
	private $productTable = 'add_property';
	private $dbConnect = false;
	public function __construct()
	{
		if (!$this->dbConnect) {
			$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}
	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error());
		}
		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	private function getNumRows($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function cleanString($str)
	{
		return str_replace(' ', '_', $str);
	}
	public function getCategories()
	{
		$sqlQuery = "
			SELECT property_id, whose
			FROM " . $this->productTable . " 
			GROUP BY whose";
		return  $this->getData($sqlQuery);
	}

	public function getProductSize()
	{
		$sql = '';
		// if (isset($_POST['brand']) && $_POST['brand'] != "") {
		// 	$brand = $_POST['brand'];
		// 	$sql .= " WHERE brand IN ('" . implode("','", $brand) . "')";
		// }
		$sqlQuery = "
			SELECT distinct estimated_price
			FROM " . $this->productTable . " 
			$sql GROUP BY estimated_price";
		return  $this->getData($sqlQuery);
	}

	public function getProducts()
	{
		$productPerPage = 20;
		$totalRecord  = strtolower(trim(str_replace("/", "", $_POST['totalRecord'])));
		$start = ceil($totalRecord * $productPerPage);
		$sql = "SELECT * FROM " . $this->productTable . " WHERE qty != 0";
		if (isset($_POST['property']) && $_POST['property'] != "") {
			$sql .= " AND property_id IN ('" . implode("','", $_POST['property']) . "')";
		}


		if (isset($_POST['estimated_price']) && $_POST['estimated_price'] != "") {
			$sql .= " AND size IN (" . implode(',', $_POST['estimated_price']) . ")";
		}

		if (isset($_POST['sorting']) && $_POST['sorting'] != "") {
			$sorting = implode("','", $_POST['sorting']);
			if ($sorting == 'newest' || $sorting == '') {
				$sql .= " ORDER BY id DESC";
			} else if ($sorting == 'low') {
				$sql .= " ORDER BY price ASC";
			} else if ($sorting == 'high') {
				$sql .= " ORDER BY price DESC";
			}
		} else {
			$sql .= " ORDER BY id DESC";
		}
		$sql .= " LIMIT $start, $productPerPage";
		$products = $this->getData($sql);
		$rowcount = $this->getNumRows($sql);
		$productHTML = '';
		if (isset($products) && count($products)) {
			foreach ($products as $key => $product) {
				$productHTML .= '<article class="col-md-4 col-sm-6">';
				$productHTML .= '<div class="thumbnail product">';
				$productHTML .= '<figure>';
				$productHTML .= '<a href="#"><img src="images/' . $product['image'] . '" alt="' . $product['product_name'] . '" /></a>';
				$productHTML .= '</figure>';
				$productHTML .= '<div class="caption">';
				$productHTML .= '<a href="" class="product-name">' . $product['product_name'] . '</a>';
				$productHTML .= '<div class="estimated_price">$' . $product['estimated_price'] . '</div>';


				$productHTML .= '<h6>estimated_price : ' . $product['estimated_price'] . '</h6>';
				$productHTML .= '</div>';
				$productHTML .= '</div>';
				$productHTML .= '</article>';
			}
		}
		return 	$productHTML;
	}
}