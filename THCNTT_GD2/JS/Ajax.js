
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
								$('#Hiển thị nhiệt độ trong nhà').html(value);
							}
							if(key == 'NhietDoBenNgoai')
							{
								$('#Hiển thị nhiệt độ bên ngoài').html(value);
							}
							if(key == 'DoAmBenNgoai')
							{
								$('#Hiển thị độ ẩm bên ngoài').html(value);
							}
							if(key == 'DoAmTrongNha')
							{
								$('#Hiển thị độ ẩm trong nhà').html(value);
							}
							if(key == 'DoSangBenNgoai')
							{
								$('#Hiển thị độ sáng bên ngoài').html(value);
							}
							if(key == 'DoSangTrongNha')
							{
								$('#Hiển thị độ sáng trong nhà').html(value);
							}
							
							
						})
						
					})
			
		}
			



setInterval(  load_ajax, 5000);
		//alert("hello");



