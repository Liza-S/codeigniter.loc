<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
</head>
<body>
	<form method="post" action="<?=base_url();?>index.php/first/upload_photo" enctype="multipart/form-data">
		<input type="file" name="userfile">
		<input type="submit" name="download" value="Загрузить">
	</form>
</body>
</html>