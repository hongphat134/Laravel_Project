<link rel="stylesheet" href="public/css/bootstrap.min.css">
<link rel="stylesheet" href="vendor/kartik-v/bootstrap-fileinput/css/fileinput.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="vendor/kartik-v/bootstrap-fileinput/themes/explorer-fas/theme.min.css">

<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<!-- Js bundle để phóng to hình ảnh -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
<!-- <script src="vendor/kartik-v/bootstrap-fileinput/js/plugins/piexif.js" type="text/javascript"></script> -->
<!-- sortable js dùng để kéo thả hình theo thứ tự khi set mặc định ban đầu  -->
<script src="vendor/kartik-v/bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
<script src="vendor/kartik-v/bootstrap-fileinput/js/fileinput.min.js"></script>
<!-- vi.js để hiện Tiếng Việt -->
 <script src="vendor/kartik-v/bootstrap-fileinput/js/locales/vi.js" type="text/javascript"></script>
 <!-- Theme cho container kiểu fas (các kiểu kia bị lỗi icon) -->
<script src="vendor/kartik-v/bootstrap-fileinput/themes/fas/theme.min.js" type="text/javascript"></script>
<!-- Js explorer fas để chuyển ds hình thành dạng list -->
<!--   <script src="vendor/kartik-v/bootstrap-fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script> -->
<script src="https://cdn.jsdelivr.net/npm/metismenu"></script>

<div class="container">
	<form enctype="multipart/form-data" action="{{route('plugin')}}">
	<div class="file-loading">
		<input id="file_input" name="hinhanh[]" type="file"data-preview-file-type="any" multiple>
	</div>
    </form>		
	<ul id="metismenu">
		<li class="mm-active">
			<a class="has-arrow" aria-expanded="true">Menu 1</a>
			<ul>A</ul>
			<ul>B</ul>
			<ul>C</ul>
		</li>
		<li>
		  	<a class="has-arrow" aria-expanded="false">Menu 2</a>
		  	<ul>A</ul>
			<ul>B</ul>
			<ul>C</ul>
		</li>
	</ul>
</div>

<script type="text/javascript">
   $("#file_input").fileinput({
    'theme': 'fas',
    'language': 'vi',
  	'showUpload': false,   	
    //'elErrorContainer': '#errorBlock',
    'allowedFileExtensions': ['jpg', 'png', 'gif'],
    'uploadUrl': './',
    overwriteInitial: false,//true thì bỏ ds hình setup default
    initialPreviewAsData: true,//true thì nhận initialPreview như là dữ liệu orelse xem là 1 chuỗi
    initialPreview: [
        "http://lorempixel.com/1920/1080/nature/1",
        "http://lorempixel.com/1920/1080/nature/2",
        "http://lorempixel.com/1920/1080/nature/3",
        "http://lorempixel.com/1920/1080/nature/4",
        "http://lorempixel.com/1920/1080/nature/5",
        "http://lorempixel.com/1920/1080/nature/6",
        "http://lorempixel.com/1920/1080/nature/7",
        "http://lorempixel.com/1920/1080/nature/8"
    ],
    initialPreviewConfig: [
        {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
        {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
        {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3},
        {caption: "nature-4.jpg", size: 329892, width: "120px", url: "{$url}", key: 4},
      	{caption: "nature-5.jpg", size: 872378, width: "120px", url: "{$url}", key: 4},
        {caption: "nature-6.jpg", size: 632762, width: "120px", url: "{$url}", key: 4},
        {caption: "nature-7.jpg", size: 123456, width: "120px", url: "{$url}", key: 4},
        {caption: "nature-8.jpg", size: 987654, width: "120px", url: "{$url}", key: 4}
    ]
   });

    $("#metismenu").metisMenu({
    	// preventDefault: false,
    	// toggle: true
    });	
</script>



