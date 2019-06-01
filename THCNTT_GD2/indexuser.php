<?php
include ('include/connectdb.php');
if(isset($_POST['submit']))
{
		
	//khai bao bien user va password de so sanh
		$username = $_POST['taikhoan'];
		$password = $_POST['matkhau'];
    //xem xét có tồn tại user không
		$querry = "select Tai_Khoan,Mat_Khau from khach_hang where Tai_Khoan = '$username' ";
    //truy vấn
		$querry_login = mysqli_query($DBC,$querry);
    //hàm mysql_num_rows trả về số lượng hàng của giá trị được truy vấn
		if (!mysqli_num_rows($querry_login))
			{	
				echo "đăng nhập thất bại";
				header('location:Login.php');
			}
		else
			{
        // hàm mysqli_fetch_array gán các hàng vào $row
				$row = mysqli_fetch_array($querry_login);
        //so sánh cột mật khẩu với password
				if ($row['Mat_Khau'] == md5($password) ) 
					{
						//echo "đăng nhập thành công";
						header("location:user_sc.php?taikhoan=$username");
					}
					else
					{	
						header("location:Login.php");
						echo md5($password);
					}
			
			}
}
?>