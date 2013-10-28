<?php foreach ($comments as $comment): ?>
    <div class="row-fluid comment" id="c<?php echo $comment->id; ?>">
        <div class="span12 ">
            <?php
            echo CHtml::link('<img class="media-object" src="http://placehold.it/64x64">', $comment->getUrl($post), array(
                'class' => 'pull-left',
                'title' => 'Permalink to this comment',
            ));
            ?>
            <br />
            <?php echo nl2br(CHtml::encode($comment->comment)); ?>
        </div><!-- comment -->
    </div>
<?php endforeach; ?>