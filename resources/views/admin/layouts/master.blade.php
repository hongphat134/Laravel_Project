<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrators</title>
	<link rel="stylesheet" href="/public/admin/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="/vendor/kartik-v/bootstrap-fileinput/css/fileinput.min.css">
	<link rel="stylesheet" href="/vendor/kartik-v/bootstrap-fileinput/themes/explorer-fas/theme.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/public/selectize/selectize.default.css">
	<link rel="stylesheet" href="/public/toastr/toastr.min.css">

	<!-- Note:  Thứ tự file js phải đúng theo thứ tự này và dc đặt ở trên -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="/vendor/kartik-v/bootstrap-fileinput/js/fileinput.min.js"></script>
	<script src="/vendor/kartik-v/bootstrap-fileinput/js/locales/vi.js" type="text/javascript"></script>
	<script src="/vendor/kartik-v/bootstrap-fileinput/themes/fas/theme.min.js" type="text/javascript"></script>

	<script src="/public/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="/public/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

	<script src="public/js/jquery.min.js"></script> 
	<script src="/public/selectize/selectize.min.js"></script>
	<script src="/public/selectize/jqueryui.js"></script>
	<script src="/public/toastr/toastr.min.js"></script>

</head>
<body>

	@include('admin.layouts.header')
	<div class="container">
		@yield('content')	       
	</div>
	@include('admin.layouts.footer')

	
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="/public/admin/scripts.js"></script>
</body>
</html>
