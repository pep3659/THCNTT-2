function ConvertCtoF (DoC)
{
	DoF = 1.8*DoC + 32;
	return DoF.toFixed(0);
	
}
function load_ajax()
		{
			$.ajax({
				//cache: false; // không lưu cache file xử lí
				url : 'truyvandatabaseRT.php', // đường dẫn file xử lý
				type : 'POST', // phương thức
				datatype: 'json',// dữ liệu trả về là json
				 
					})
			/*.done( function(result) 
						{
							$('#NhietDoBenNgoai').html(result);
						})*/
			.fail( function() 
						{
							alert('Có lỗi trong quá trình xử lý');
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
								$('#NhietDoBenNgoai').html(DoF);
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
			



setInterval(  load_ajax, 5000);
		//alert("hello");



