<?php
global $conn;
$sql  = "Select * from book_comment where book_id='$book_id'";

$result = $conn->query($sql);

if($result->num_rows > 0){
	?>
	<table>
		
		<thead>
			<tr>
				<th>ID</th>
				<th>コメント</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php 
        	while ($row = $result->fetch_assoc()) {
			
			
		?>
			<tr>
				<td><?php echo $row['comment_id']; ?></td>
				<td><?php echo $row['comment']; ?></td>
				
				<td>
					
					<a href="edit_comment.php?comment_id=<?php echo $row['comment_id']; ?>" class="button edit" title="">修正</a>
					
					<a href="delete.php?comment_id=<?php echo $row['comment_id']; ?>" class="button delete" title="">削除</a>
					
					
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
