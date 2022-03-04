<?php
include 'connection.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchByAge = $_POST['searchByAge'];

if($searchByAge != ''){
    $searchQuery  ="";
    $value = explode('-',$searchByAge);
    $searchQuery .= " and (Age BETWEEN '".$value[0]."' AND '".$value[1]."')";
}

$searchBySalary = $_POST['searchBySalary'];
if($searchBySalary != ''){
    $searchQuery  ="";
    $value = explode('-',$searchBySalary);
    $searchQuery .= " and (Salary BETWEEN '".$value[0]."' AND  '".$value[1]."') ";
}


if($searchValue != ''){
    $searchQuery  ="";
	$searchQuery .= " and (Name like '%".$searchValue."%' or 
        Email like '%".$searchValue."%' or 
        City like '%".$searchValue."%' or
        Country like '%".$searchValue."%' or
        Phone like '%".$searchValue."%' or
        Age like '%".$searchValue."%' or
        Office like '%".$searchValue."%' or
        Date like '%".$searchValue."%' or 
        Salary like '%".$searchValue."%' or 
        Zip like '%".$searchValue."%' or 
        id like '%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from employee_tbl");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from employee_tbl WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from employee_tbl WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
            "Id"=>$row['Id'],
    		"Name"=>$row['Name'], 
            "Age"=>$row['Age'],           
            "Office"=>$row['Office'],
            "Joined_Date"=>$row['Joined_Date'],
            "Salary"=>$row['Salary'],          
    		"Email"=>$row['Email'],
            "Phone_Number"=>$row['Phone_Number'],
    		"City"=>$row['City'],
    		"Country"=>$row['Country'],
            "Zip"=>$row['Zip'],

    	);       
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);

