<?php 
include './connect.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>書籍一覧</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
<h1>書籍一覧</h1>

<a href="add.php" class="button" title="">追加</a>
<?php include './showall.php'; ?>
</body>
</html>