<?php
global $conn;



$sql  = "Select * from book_comment where book_id='$book_id'";

$result = $conn->query($sql);

if($result->num_rows > 0){
	$total_comment = $result->num_rows;
	$rand = rand();
	?>
	<table>
		<input type="hidden" id="current_page_<?php echo $rand; ?>">
		<input type="hidden" id="show_per_page_<?php echo $rand; ?>" value="<?php echo COMMENT_LIMITED; ?>">
		<thead>
			<tr>
				<th>ID</th>
				<th>コメント</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody class="comment-list" id="comment_<?php echo $rand; ?>" data-id="#comment_<?php echo $rand; ?>" data-current_page="#current_page_<?php echo $rand; ?>" data-show_per_page="#show_per_page_<?php echo $rand; ?>" data-navigation="#page_navigation_<?php echo $rand; ?>" >
		<?php 
        	while ($row = $result->fetch_assoc()) {
			
				
					
					?>
					
					<tr >

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
	<div class="pagination" >
		<ul class="page-numbers clearfix" id='page_navigation_<?php echo $rand; ?>'>
                </ul><!--page-numbers-->
	</div>
	<a href="./" title="戻る" class="button">戻る</a>
	<?php
		
	}
    $conn->close();
