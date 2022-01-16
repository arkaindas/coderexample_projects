<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "Password1";
$dbname = "test";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'invoice_no', 
	1 => 'product_name',
	2 => 'delivery_status',
	3 => 'pin_code'
);

// getting total number records without any search
$sql = "SELECT * ";  //intensionaly * to fetch all columns
$sql.=" FROM order_product";
$query=mysqli_query($conn, $sql) or die("order_product-grid-data.php: get order_products");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.



$sql = "SELECT * ";
$sql.=" FROM order_product WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	
	//$searchDataArray = array();
	//$searchDataArray = explode(",",$requestData['search']['value'];
	
	$sql.=" AND ( invoice_no LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR product_name LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR pin_code LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("order_product-grid-data.php: get order_products");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("order_product-grid-data.php: get order_products");


$data = array();
while( $row=mysqli_fetch_assoc($query) ) {  // preparing an array
	$nestedData=array(); 


	foreach($row as $index=>$value) {
		$nestedData[$index] = $value;
	}



/*	$nestedData[] = $row["order_product_name"];
	$nestedData[] = $row["order_product_salary"];
	$nestedData[] = $row["order_product_age"];
*/	
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"records"            => $data   // total data array
			);
//print_r($data);

echo json_encode($json_data);  // send data as json format

?>
