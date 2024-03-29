<div class="comments-list">
	<ul>
		<?php while($comment = $commentList->hasNext()): $commentURL->setCommentUID($comment->uid);?>
		<li itemscope itemtype="http://schema.org/Comment" class="kboard-comments-item" data-username="<?php echo $comment->user_display?>" data-created="<?php echo $comment->created?>">
			<div class="comments-list-username" itemprop="author"><?php echo $comment->user_display?></div>
			<div class="comments-list-create" itemprop="dateCreated"><?php echo date("Y-m-d H:i", strtotime($comment->created))?></div>
			<div class="comments-list-content" itemprop="description">
				<?php echo nl2br($comment->content)?>
			</div>
			
			<hr>
			
			<!-- 댓글 리스트 시작 -->
			<?php $commentBuilder->buildTreeList('list-template.php', $comment->uid)?>
			<!-- 댓글 리스트 끝 -->
			
			<!-- 댓글 입력 폼 시작 -->
			<form action="<?php echo $commentURL->getInsertURL()?>" method="post" id="kboard_comments_reply_form_<?php echo $comment->uid?>" class="comments-reply-form" onsubmit="return kboard_comments_execute(this);">
				<input type="hidden" name="content_uid" value="<?php echo $comment->content_uid?>">
				<input type="hidden" name="parent_uid" value="<?php echo $comment->uid?>">
				<input type="hidden" name="member_uid" value="<?php echo $member_uid?>">
			</form>
			<!-- 댓글 입력 폼 끝 -->
		</li>
		<?php endwhile?>
	</ul>
</div>