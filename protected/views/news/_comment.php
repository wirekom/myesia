<div class="span3">
    <?php
    echo CHtml::link('<img class="media-object" src="http://placehold.it/64x64">', '#', array(
        'class' => 'thumbnail',
        'title' => 'Permalink to this comment',
    ));
    ?>
</div>
<div class="span9">
    <span class="title">
        <h2><?php echo CHtml::encode($comment->author); ?></h2>
        <small><?php echo CHtml::encode($comment->created); ?></small>
        <?php if (!Yii::app()->user->isGuest): ?>
            <ul class="tumben">
                <li><a id="reply-comment-<?php echo $comment->id; ?>" href="#c<?php echo $comment->id; ?>" rel="tooltip" title="Reply comments"><i class="icons-reply"></i></a></li>
                <?php Yii::app()->clientScript->registerScript('reply-comment-' . $comment->id, "$('#reply-comment-$comment->id').click(function(){ $('#form-reply-comment-$comment->id').toggle();});"); ?>
                <li>
                    <span id="like-comment-<?php echo $comment->id; ?>"  class="likeThis">
                        <?php $this->renderPartial('_ajaxLikeCommentContent', array('is_like' => $comment->isLike, 'comment_id' => $comment->id)); ?>
                    </span>
                </li>
            </ul>
        <?php endif; ?>
    </span>
    <blockquote>
        <?php echo nl2br(CHtml::encode($comment->comment)); ?>
    </blockquote>
    <div id="form-reply-comment-<?php echo $comment->id; ?>" style="display: none;">
        <?php echo CHtml::form(); ?>
        <?php echo CHtml::textField('reply_comment', '', array('class' => 'span5', 'maxlength' => 225)); ?>
        <?php echo CHtml::hiddenField('parent_id', $comment->id); ?>
        <?php
        echo CHtml::ajaxSubmitButton('Reply', $this->createUrl('news/ajaxReplyComment'), array(
            'data' => 'js:jQuery(this).parents("form").serialize()',
            'success' => 'function(data){
               $("input[name=reply_comment]").val("");
                          $("#pcomments-' . $comment->id . '").append(data);
                   }'
        ), array('class' => 'btn'));
        ?>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>