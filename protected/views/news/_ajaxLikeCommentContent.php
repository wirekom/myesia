<?php

if ($is_like)
    echo CHtml::ajaxLink('Dislike <i class="icon-thumbs-down"></i>', $this->createUrl('news/ajaxLikeComment'), array(
        'type' => 'POST',
        'update' => '#like-comment-' . $comment_id,
        'data' => array('param' => '2', 'comment_id' => $comment_id)
            ), array('id' => 'unlike-link-' . uniqid()));
else
    echo CHtml::ajaxLink('Like <i class="icon-thumbs-up"></i>', $this->createUrl('news/ajaxLikeComment'), array(
        'type' => 'POST',
        'update' => '#like-comment-' . $comment_id,
        'data' => array('param' => '1', 'comment_id' => $comment_id)
            ), array(
        'id' => 'like-link-' . uniqid(),
        'title' => '',
        'rel' => 'tooltip'
    ));
?>
