<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?=base_url();?>index.php/add_article">
		Название статьи: <br> <input type="text" name="title" value="<?=set_value('title');?>"><?=form_error('title');?> <br>
		Текст статьи: <br> <textarea name="text" rows="10" cols="40"><?=set_value('text');?></textarea><?=form_error('text');?> <br>
		<input type="submit" name="add" value="Добавить">
	</form>
</body>
</html>