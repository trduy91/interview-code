<?php
include './connect.php';

//add data 
global $conn;

if(isset($_GET['comment_id'])){
	$comment_id = $_GET['comment_id'];
	// var_dump($comment_id);
	// die();
	$comment = get_comment_from_comment_id($comment_id);


	$book_id = get_book_id_from_comment_id($comment_id);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['comment'])){

			$comment = $_POST['comment'];
		}
		
		$sql = "update book_comment set comment='$comment' where comment_id='$comment_id'";
		if($conn->query($sql) === TRUE){
			// return;
			$redirect = 'Location: comment.php?book_id=' . $book_id ;
			header($redirect);
			exit;
		}else{
			echo "Error: ". $conn->error;
		}

	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>感想の編集</title>
		<link rel="stylesheet" href="">
	</head>
	<body>
	<h1>感想の編集</h1>
	<form action="edit_comment.php?comment_id=<?php echo $comment_id; ?>" method="post" accept-charset="utf-8">
			コメント 
			<textarea name="comment"><?php echo $comment['comment']; ?></textarea>
			
			<button type="submit" class="button submit">送信</button>
	</form>
	<?php 
		$url = 'comment.php?book_id=' . $book_id;
		
			 ?>
	<a href="<?php echo $url; ?>" title="戻る">戻る</a>

	</body>
	</html>
	<?php
	$conn->close();
}