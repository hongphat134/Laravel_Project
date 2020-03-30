
<link rel="stylesheet" href="public/pwgslider/pgwslider.min.css">

<script src="public/js/jquery.min.js"></script>
<script src="public/pwgslider/pgwslider.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>	
	<div class="container">
		<ul class="pgwSlider">
			<li><img src="public/images/img1.jpg" alt=""><span>Sách 1</span></img></li>
			<li><img src="public/images/img2.jpg" alt=""><span>Sách 2</span></img></li>
			<li><img src="public/images/img3.jpg" alt=""><span>Sách 3</span></img></li>
			<li><img src="public/images/img4.jpg" alt=""><span>Sách 4</span></img></li>
		</ul>	
	</div>
	
	<style>
		.container{
			width: 40%;
		}
	</style>
	<script>
		$('.pgwSlider').pgwSlider({
			displayControls: true,
			transition: 'fading',
			maxHeight: 1500,
			intervalDuration: 2000,
			listPosition : 'left'

		});
	</script>
</body>
</html>