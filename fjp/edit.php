<?php 
include './connect.php';

//add data 
global $conn;

if(isset($_GET['book_id'])){
	$book_id = $_GET['book_id'];
	$book = get_book_from_book_id($book_id);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['book_name'])){
			$book_name = $_POST['book_name'];
		}
		if(isset($_POST['book_publish'])){
			$book_publish = $_POST['book_publish'];
		}
		if(isset($_POST['book_page'])){
			$book_page = $_POST['book_page'];
			if($book_page< 0){
				$book_page = 0;
			}
		}
		$sql = "update book set book_name='$book_name',book_publisher='$book_publish',book_page='$book_page' where book_id='$book_id'";
		if($conn->query($sql) === TRUE){
			// return;
			header('Location: index.php');
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
		<title>書籍の編集</title>
		<link rel="stylesheet" href="style.css">
		<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
	</head>
	<body>
	<h1>書籍の編集</h1>
	<div class="underline">
		
	</div>
	<form action="edit.php?book_id=<?php echo $book_id; ?>" method="post" accept-charset="utf-8">
			<div class="title">書籍名</div> 
			<input type="text" name="book_name" value="<?php echo $book['book_name']; ?>">
			<div class="title"><span>出版社名</span></div>
			<input type="text" name="book_publish" value="<?php echo $book['book_publisher']; ?>">
			<div class="title"><span>ページ数</span></div>
			<input type="number" name="book_page" value = "<?php echo $book['book_page']; ?>">
			<button type="submit" class="button submit">更新</button>
	</form>

	<a href="./" title="戻る" class="button">戻る</a>

	</body>
	</html>

	<?php
}
$conn->close();
 ?>


