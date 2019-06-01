<?php
if ($_GET['taikhoan'] == null)
{
	header ("location: Login.php");
}

header("Content-type: text/html; charset=utf-8");

include "./include/connectdb.php";
mysqli_set_charset($DBC, 'UTF8');

//đã được kết nối database trong file indexuser
/*$DBC = mysqli_connect("localhost", "pep3659", "cao123659258","thcntt_project");
mysqli_set_charset($DBC, 'UTF8');
//in ra nếu kết nối không thành công và lỗi của nó "debug"
if (mysqli_connect_error())
  {
  echo "kết nối không thành công: " . mysqli_connect_error();
  }
  */
  
  //get tai khoản về cho biến tài khoản để truy vấn
  
  
$taikhoan = $_GET['taikhoan'];
// truy vấn theo tài khoản đã được get về
$query = 	"select Phong, Ho, Ten

			from khach_hang

			where tai_khoan = '$taikhoan' ";
$result = mysqli_query($DBC, $query);
if ($result)
{
	while ($row = mysqli_fetch_array($result))
	{
		$phong = $row['Phong'];
		$ho = $row ['Ho'];
		$ten = $row ['Ten'];
	}
}
else echo "khong thanh cong ";	

// xử truy vấn về số lượng thiết bị và số lượng cảm biến		
$query1 = "select Loai_TB, count(*) as SL
			from thiet_bi
			group by Loai_TB" ;
$result1 = mysqli_query($DBC, $query1);
if 	($result1)
{
	while ($row = mysqli_fetch_array($result1))
	{
		if ($row['Loai_TB'] == "TB")
		{
			$sl_thietbi = $row['SL'];
		}
		if ($row ['Loai_TB'] == "CB")
		{
			$sl_cambien = $row['SL'];
		}
	}
} else echo "không thành công 1";

// xử lí truy vẫn các cảm biến 			
$query2 =  
                        "SELECT ten_thiet_bi,trang_thai,thang_do

                         FROM thiet_bi
 
                         WHERE phong = $phong ";

                         
$result2 = mysqli_query($DBC, $query2);

if ($result2)
{
  while ($row = mysqli_fetch_array($result2))
  {
	  //xét tên thiết bị để lấy dữ liệu
	  //update xét mã ID
	  if($row['ten_thiet_bi'] == 'DenPhongKhach')
	  {
        $DenPhongKhach = $row['trang_thai'];
	  }
	  if($row['ten_thiet_bi'] == 'DenPhongNgu')
	  {
		  $DenPhongNgu = $row['trang_thai'];
	  }
	  if($row['ten_thiet_bi'] == 'NhietDoTrongNha')
	  {
		  $NhietDoTrongNha = $row['thang_do'];
	  }
	  if ($row ['ten_thiet_bi'] == 'NhietDoBenNgoai')
	  {
		  $NhietDoBenNgoai = $row['thang_do'];
	  }
	  if($row['ten_thiet_bi'] == 'DoSangBenNgoai')
	  {
		 $DoSangBenNgoai = $row['thang_do'];		 
	  }
      if($row ['ten_thiet_bi'] == 'DoSangTrongNha')
	  {
		 $DoSangTrongNha = $row ['thang_do'];
	  }
	  if($row ['ten_thiet_bi'] == 'DoAmTrongNha')
	  {
		  $DoAmTrongNha = $row ['thang_do'];
	  }
	  if($row ['ten_thiet_bi'] == 'DoAmBenNgoai')
	  {
		  $DoAmBenNgoai = $row ['thang_do'];
	  }
  }
     
}
else echo "Không thành công 2";

// chuyển đổi độ c sang f
function ConvertCtoF($DoC)
{
	$DoF = 1.8*$DoC + 32;
	
	echo $DoF;
}

?>
<html>
<head>
						<script language="javascript">
						alert("Đăng Nhập Thành Công");
						</script>
						<script src = "JS/jquery-3.4.1.min.js">
						</script>
						
						
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<title>Web User</title>
	<link rel="stylesheet" type="text/css" href="./css/webuserstyle.css">
</head>


<body >

	
	<header>
	
		<img src="./PIC/hs.png" class="avatar">
		<h2>Web User</h2>
		<h6>Hi!User | Đăng Xuất</a></h6>
        
	</header>
	<section>
		<nav>
			<div class="logo-user">
				<img src="./PIC/family.png" width="80px" class="logo-user-radius">
			</div>
			<div class="nd">
				<div class="paragraph-line-first">
				<h3>Họ Tên Chủ Hộ:</h3>
				 <h3><?php echo ($ho ." ". $ten) ?></h3>
				</div>
				<div class="paragraph-line">
				<h3>Phòng: <?php echo $phong ?></h3>
				</div>
				<div class="paragraph-line">
				<h3>Số lượng cảm biến: <?php echo $sl_cambien ?> </h3>
				</div>
				<div class="paragraph-line">
				<h3>Số lượng thiết bị: <?php echo $sl_thietbi?> </h3>
				</div>
				<div class="paragraph-line">
				
				</div>
			</div>
		</nav>
  
		<article>
			
			<div id="time"></div>
			
			<script  src = "./JS/DongHo.js">	</script>
			
			
			<div id="box">
				<div class="loginbox">
					<p>Nhiệt Độ Bên Ngoài <img src="./PIC/sun.png" width="45px" height="45px" class="icon"></p>
					<h4 class = "thangdo" id = "NhietDoBenNgoai"><?php echo $NhietDoBenNgoai?></h4><h4 class = "thangdoF">℃ - <?php ConvertCtoF($NhietDoBenNgoai) ?>℉</h4>
					<h5 class ="saiso"> sai số: ± x ℃ </h5>
				</div>
				
				
				<div class="loginbox1">
					<p>Độ Sáng Bên Ngoài <img src="./PIC/house.png" width="45px" height="45px" class="icon"></p>
					<h4><?php echo $DoSangBenNgoai?> Lx </h4>
					<h5> sai số: ± x Lx </h5>
				</div>
				
				
				<div class="loginbox2">
					<p>Nhiệt Độ Trong Nhà <img src="./PIC/hot.png" width="45px" height="45px" class="icon"></p>
					<h4><?php echo $NhietDoTrongNha ?> ℃  -  <?php ConvertCtoF($NhietDoTrongNha) ?>℉</h4>
					<h5> sai số: ± x ℃ </h5>
				</div>
				
				
				<div class="loginbox3">
					<p>Độ Sáng Trong Nhà  <img src="./PIC/sparkles.png" width="45px" height="45px" class="icon"></p>
					<h4><?php echo $DoSangTrongNha ?> Lx </h4>
					<h5> sai số: ± x Lx </h5>
				</div>
				
				
				<div class="loginbox4">
					<p>Độ Ẩm Bên Ngoài <img src="./PIC/storm.png" width="45px" height="45px" class="icon"></p>
					<h4><?php echo $DoAmBenNgoai ?> % </h4>
					<h5> sai số: ± x % </h5>
				</div>
				
				
				<div class="loginbox5">
					<p>Độ Ẩm Trong Nhà  <img src="./PIC/cloud.png" width="45px" height="45px" class="icon"></p>
					<h4><?php echo $DoAmTrongNha?> % </h4>
					<h5> sai số: ± x % </h5>
				</div>
				
				<div class="loginbox6">
					<div class="position">
					<label class="switch">
						<input type="checkbox">
						<span class="slider round">
						</span>
					</label>
					</div>
					<img src="./PIC/saving.png" width="35px" height="35px" class="icon1"> <p>Đèn Phòng Khách</p>
				</div>
				
				<div class="loginbox7">
					<div class="position">
					<label class="switch">
						<input type="checkbox">
						<span class="slider round">
						</span>
					</label>
					</div>
					<img src="./PIC/saving.png" width="35px" height="35px" class="icon1"> <p>Đèn Phòng Ngủ</p>
				</div>
			</div>
			<script src = "./JS/Ajax.js"> </script>
			
		</article>
		<footer>
		<p>Vui lòng liên hệ với chúng tôi qua các thông tin sau</p>
		<p>Địa chỉ:Trung tâm phần mềm Quang Trung, Quận 12, TP.Hồ Chí Minh</p>
		<p>Số Điện Thoại Cty: 090xxxxxxxx</p>
		<p>Email:CtyIOT@gmail.com</p>
	</footer>
	</section>
	
</body>
</html>