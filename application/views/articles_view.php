<!DOCTYPE html>
<html>
<head>
	<title>Статьи</title>
</head>
<body>
<? foreach ($articles as $item): ?>
	<p><?=$item['title']?></p>
	<p><?=$item['text']?></p>
	<p><?=$item['date']?></p>
<?endforeach;?>
<?echo $this->pagination->create_links();?>
</body>
</html>