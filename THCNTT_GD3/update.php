<?php

setInterval(function() {
	$.ajax({
    type: 'POST',
    url: 'truyvandatabase.php',
   
    dataType: 'html',
    success: function(data) {
        $("div#result").html(indexuser.php);
    },
    error: function() {
        alert('Có lỗi trong quá trình xử lý');
    }
});
}, 1000)



?>