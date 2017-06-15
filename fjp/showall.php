<?php
global $conn;
$sql  = "Select * from book";

$result = $conn->query($sql);

if($result->num_rows > 0){
	?>
	<table>
		
		<thead>
			<tr>
				<th>ID</th>
				<th>書籍名</th>
				<th>出版社名</th>
				<th>ページ数</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php 
        	while ($row = $result->fetch_assoc()) {
			
			
		?>
			<tr>
				<td><?php echo $row['book_id']; ?></td>
				<td><?php echo $row['book_name']; ?></td>
				<td><?php echo $row['book_publisher']; ?></td>
				<td><?php echo $row['book_page']; ?></td>
				<td>
					
					<a href="edit.php?book_id=<?php echo $row['book_id']; ?>" class="button edit" title="">修正</a>
					
					<a href="delete.php?book_id=<?php echo $row['book_id']; ?>" class="button delete" title="">削除</a>
					
					<a href="comment.php?book_id=<?php echo $row['book_id']; ?>" class="button comment" title="">感想の一覧</a>
				</td>
			</tr>

		<?php  
			}	
		?>
		</tbody>
	</table>
	<?php
		
	}
    $conn->close();
