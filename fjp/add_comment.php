<?php 
include './connect.php';

//add data 
global $conn;

if(isset($_GET['book_id'])){
	$book_id = $_GET['book_id'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['comment'])){

			$comment = $_POST['comment'];
		}
		
		$sql = "INSERT INTO book_comment (comment, book_id) VALUES ('$comment', '$book_id')";
		if($conn->query($sql) === TRUE){
			// return;
			$redirect = 'Location: comment.php?book_id=' . $book_id ;
			header($redirect);
			exit;
		}else{
			echo "Error: ". $conn->error;
		}

	}
	$conn->close();



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>感想の編集</title>
	<link rel="stylesheet" href="style.css">
	<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
</head>
<body>
<h1>感想の編集</h1>
<div class="underline">
	
</div>
<form action="add_comment.php?book_id=<?php echo $book_id; ?>" method="post" accept-charset="utf-8">
		<div class="wrapper">
		<div class="title">コメント</div>
		<textarea name="comment" ></textarea>
		</div>
		<button type="submit" class="button submit">送信</button>
</form>
<?php 
	$url = 'comment.php?book_id=' . $_GET['book_id'];
	
		 ?>
<a href="<?php echo $url; ?>" title="戻る" class="button">戻る</a>

</body>
</html>

<?php

}