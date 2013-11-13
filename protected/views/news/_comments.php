<ul class="komens">
<?php foreach ($comments as $comment): ?>
    <li class="row-fluid" id="c<?php echo $comment->id; ?>">
		<div class="span3">
		<?php
		echo CHtml::link('<img class="media-object" src="http://placehold.it/64x64">', $comment->getUrl($post), array(
			'class' => 'thumbnail',
			'title' => 'Permalink to this comment',
		));
		?>
		</div>
		<div class="span9">
			<span class="title">
				<h2><?php echo CHtml::encode($comment->author->username); ?></h2>
				<small><?php echo CHtml::encode($comment->created); ?></small>
				<ul class="tumben">
					<li><a href="#" rel="tooltip" title="Reply comments"><i class="icons-reply"></i></a></li>
					<li><a href="#" rel="tooltip" title="Like this comment"><i class="icons-thumbs-up"></i></a></li>
				</ul>
			</span>
			<blockquote>
				<?php echo nl2br(CHtml::encode($comment->comment)); ?>
			</blockquote>
		</div>
        <!-- comment -->
    </li>
<?php endforeach; ?>
</ul>