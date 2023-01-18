<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>註冊</title>
	<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
</head>
<body>
帳號<input type="text" name="account" id="account" value=""><br />
密碼<input type="password" name="password" id="password" value=""><br />
名稱<input type="text" name="name" id="name" value=""><br />
狀態<input type="radio" name="status" value="1">啟用 <input type="radio" name="status" value="2" checked>未啟用<br />
<button id="set">送出</button>

<script type="text/javascript">
$('#set').click(function(){
	var account = $('#account').val();
	var password = $('#password').val();
	var name = $('#name').val();
	var status = $('input[name="status"]:checked').val();

	$.ajax({
        method: 'POST',
        url: '/admin/inset',
        data: {"_token": "{{ csrf_token() }}",'account':account,'password':password,'name':name,'status':status},
        dataType: 'json',
        beforeSend: function () {
            
        },
        success: function (request) {
            console.log(request);
        },
        error: function (xhr) {
            
        }
    });
});
</script>
</body>
</html>