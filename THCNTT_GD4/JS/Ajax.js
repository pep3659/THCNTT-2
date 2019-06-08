function ConvertCtoF (DoC)
{
	DoF = 1.8*DoC + 32;
	return DoF.toFixed(0);
	
}
function load_ajax_of_DB()
		{
			$.ajax({
				//cache: false; // không lưu cache file xử lí
				url : './JS/Jquery_DB/truyvandatabaseRT.php', // đường dẫn file xử lý
				type : 'POST', // phương thức
				datatype: 'json',// dữ liệu trả về là json
				 
					})
			/*.done( function(result) 
						{
							$('#NhietDoBenNgoai').html(result);
						})*/
			.fail( function() 
						{
							alert('Có lỗi trong quá trình xử lý DB');
						})
						
			
			
			.done ( function (output)
					{				
						//JSON.parse ép kiểu string về json để định dạng theo đối tượng
						//debug
						//console.log(JSON.parse (output));
						console.log(output);
						
						$.each (JSON.parse(output), function(key, value)
						{							
							/*
							if (key == 'DenPhongKhach')
							{
								//console.log(key+" "+value);
								//$('#Hiển thị đèn').html(value);
							}
							if (key == 'DenPhongNgu')
							{
								
							}
							*/
							if(key == 'NhietDoTrongNha')
							{
								$('#NhietDoTrongNha').html(value);
								var DoF = ConvertCtoF(value);
								$('#NhietDoTrongNhaF').html(DoF);
								
							}
							if(key == 'NhietDoBenNgoai')
							{
								$('#NhietDoBenNgoai').html(value);
								var DoF = ConvertCtoF(value);
								$('#NhietDoBenNgoaiF').html(DoF);
							}
							if(key == 'DoAmBenNgoai')
							{
								$('#DoAmBenNgoai').html(value);
							}
							if(key == 'DoAmTrongNha')
							{
								$('#DoAmTrongNha').html(value);
							}
							if(key == 'DoSangBenNgoai')
							{
								$('#DoSangBenNgoai').html(value);
							}
							if(key == 'DoSangTrongNha')
							{
								$('#DoSangTrongNha').html(value);
							}
							
							
						})
						
					})
			
		}
			




		
// hàm ajax xử lí phần bật tắt đèn với 3 tham số được truyền vào để định dạng thông tin trên database
function load_ajax_of_bat_tat_den (Ten, Phong, TrangThai)
{
	$.ajax({
		url:"./JS/Jquery_DB/BatTatDen_DB.php",
		type: 'POST',
		data: {Name: Ten, Room: Phong, Status: TrangThai },
	})
	.fail (function() {

		console.log("co loi trong qua trinh xu li bat tat den ajax");


	})
	.done (
		function ()
		{
			console.log("ajax bật ttawts thành công");
		}
	)
	

}
//hàm xem xét phần bật tắt ban đầu của các đèn
function Xet_Bat_Tat(TrangThai)
{
	if (TrangThai == 'On')
	{
		return false;
	} 
	else return true;

}




