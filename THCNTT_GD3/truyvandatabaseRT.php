<?php

include "./include/connectdb.php";
$querry =  
                        "SELECT ten_thiet_bi,trang_thai,thang_do

                         FROM thiet_bi

                         WHERE phong = '101' ";
                  
$result = mysqli_query($DBC, $querry);
$output = array();
if ($result)
{
  while ($row = mysqli_fetch_array($result))
	{ 
		if ($row['ten_thiet_bi'] == 'DenPhongKhach')
		{ 
			$output   = array( $row['ten_thiet_bi'] => $row['trang_thai']);
			//dùng array push để chèn thêm chuỗi trong chuỗi	
			//array_push($output,$Temp);
		}
		if($row['ten_thiet_bi'] == 'DenPhongNgu')
		{
			$output = array($row['ten_thiet_bi'] => $row['trang_thai']);
		}
		if ($row['ten_thiet_bi'] == 'NhietDoBenNgoai')
		{
			$output  += array ($row['ten_thiet_bi'] => $row['thang_do']);		
		}
		if ($row['ten_thiet_bi'] == 'NhietDoTrongNha')
		{
			$output += array($row['ten_thiet_bi'] => $row['thang_do']);
		}
		if	($row['ten_thiet_bi'] == 'DoAmBenNgoai')
		{	
			$output += array($row['ten_thiet_bi'] => $row['thang_do']);
		}
		if($row['ten_thiet_bi'] == 'DoAmTrongNha')
		{
			$output += array ($row['ten_thiet_bi'] => $row['thang_do']);
		}
		if ($row['ten_thiet_bi'] == 'DoSangBenNgoai')
		{
			$output += array($row['ten_thiet_bi'] => $row['thang_do']);
		}
		if($row['ten_thiet_bi'] == 'DoSangTrongNha')
		{
			$output += array ($row['ten_thiet_bi'] => $row['thang_do']);
		}
							
	//  $output = array(
	//					"LIGHT" => $row['trang_thai'],				
	//				);
							   
	
	}
	//echo json_encode($output);
	
	
	//$string_output = json_encode($output);
	//trim($string_output, "[");
	//ltrim($string_output, "]");
	//echo $string_output;
	die (json_encode($output));
	
  
     
}
else echo "Không thành công";


?>