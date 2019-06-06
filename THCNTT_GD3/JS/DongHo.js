function dongho(){
					var time=new Date();
					var ngay=["CN","T2","T3","T4","T5","T6","T7"];
					var thang=["1","2","3","4","5","6","7","8","9","10","11","12"];
					
					var gio=time.getHours();
					var phut=time.getMinutes();
					var giay=time.getSeconds();
					if (gio<10)
						gio="0"+gio;
					if (phut<10)
						phut="0"+phut;
					if (giay<10)
						giay="0"+giay;
					
					document.getElementById("time").innerHTML =  "Hôm nay,"+ngay[time.getDay()]+" ngày "+time.getDate()+" tháng "+thang[time.getMonth()]+" năm "+time.getFullYear() +" lúc " +gio + ":" + phut + ":" + giay;
					setTimeout("dongho()",1000);
				}
				dongho();