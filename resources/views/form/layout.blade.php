<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="{!! asset('resources/views/form/style.css') !!}">
</head>
<body>
<div id="frm">
	<form enctype="multipart/form-data" action="{{route('ContentImage')}}" method="post">
		<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
		<h3 class="h3">Đăng Nhập</h3>
		<p>
			<label>Username:</label>
			<input type="text" id="user" name="user">
		</p>
		<p>
				<label>Password:</label>
				<input type="password" id="pass" name="pass">
		</p>
		<p>
				<label>UpLoad:</label>
				<input type="file" id="fImage" name="fImage">
		</p>
		<p>
				<input type="submit" id="sub" name="sub" value="Login">
		</p>
	</form>
	<?php
		foreach ($data as $key => $value) {
			?>
		
		<img src="http://localhost:8888/MyLaravel/public/upload/image/<?php echo $value['image'];?>">
			<?php }?>
</div>
</body>
</html>