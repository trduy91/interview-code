<?php 
include './connect.php';

global $conn;

if(isset($_GET['book_id'])){
	$book_id = $_GET['book_id'];

	$sql = "SELECT * FROM book where book_id='$book_id'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$book_name = $row['book_name'];
	}
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>感想一覧</title>
	<link rel="stylesheet" href="">
</head>
<body>
<h1>感想一覧</h1>
<?php if(isset($book_name)){
	?>
	<p class="book_name"><?php echo $book_name; ?></p>

	<?php
	} ?>

<a href="add_comment.php?book_id=<?php echo $book_id; ?>" title="">追加</a>
<?php include './showall_comment.php'; ?>
</body>
</html>