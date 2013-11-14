<?php

if ($is_like)
    echo CHtml::ajaxLink('Dislike <i class="icon-thumbs-down"></i>', $this->createUrl('news/ajaxLikeNews'), array(
        'type' => 'POST',
        'update' => '#like-news',
        'data' => array('param' => '2', 'news_id' => $news_id)
            ), array('id' => 'unlike-link-' . uniqid()));
else
    echo CHtml::ajaxLink('Like <i class="icon-thumbs-up"></i>', $this->createUrl('news/ajaxLikeNews'), array(
        'type' => 'POST',
        'update' => '#like-news',
        'data' => array('param' => '1', 'news_id' => $news_id)
            ), array('id' => 'like-link-' . uniqid()));
?>
