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
	<title>感想の一覧</title>
	<link rel="stylesheet" href="style.css">
	<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
    <script src="custom.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
<div class="comment-title">
	

<h1>感想の一覧</h1>
<?php if(isset($book_name)){
	?>
	<div class="book_name"><?php echo $book_name; ?></div>

	<?php
	} ?>

</div>
<div class="underline">
	
</div>
<a href="add_comment.php?book_id=<?php echo $book_id; ?>" title="" class="button">追加</a>
<?php include './showall_comment.php'; ?>
</body>
</html>