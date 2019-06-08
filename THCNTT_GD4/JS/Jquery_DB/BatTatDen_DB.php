<?php

// đưa các dữ liệu vào các biến được post từ hàm load_ajax_of_bat_tat_den
$Ten = $_POST['Name'];
$TrangThai = $_POST['Status'];
$Phong = $_POST['Room'];
 
//load file kết nối
include ("../../include/connectdb.php");

// query theo các sự kiện được truyền từ hàm load_ajax_of_bat_tat_den
$query =  
            "update thiet_bi

             set Trang_Thai = '$TrangThai'

             WHERE Phong = $Phong and Ten_Thiet_Bi = '$Ten' ";



// thực thi câu querry
mysqli_query($DBC, $query);

?>