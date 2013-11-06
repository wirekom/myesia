<?php
$this->breadcrumbs = array(
    'News' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List News', 'url' => array('index')),
    array('label' => 'Create News', 'url' => array('create')),
    array('label' => 'Update News', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete News', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage News', 'url' => array('admin')),
);
?>

<h1>View News #<?php echo $model->title; ?></h1>

<?php

$this->widget('ext.jwplayer.Jwplayer', array(
    'width' => 'auto',
    'height' => 360,
    'file' => Yii::app()->baseUrl . Yii::app()->params['uploads_videos'] . $model->image, // the file of the player, if null we use demo file of jwplayer
//    'image' => null, // the thumbnail image of the player, if null we use demo image of jwplayer
    'options' => array(
        'controlbar' => 'bottom'
    )
));
?>

<div class="blog-comments-container" id="comments">
    <?php if ($model->commentCount >= 1): ?>
        <h3>
            <?php echo $model->commentCount > 1 ? $model->commentCount . ' comments' : 'One comment'; ?>
        </h3>

        <?php
        $this->renderPartial('_comments', array(
            'post' => $model,
            'comments' => $model->comments,
        ));
        ?>
    <?php endif; ?>

    <?php if (Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
        <h3>Leave a Comment</h3>
        <?php
        $this->renderPartial('/comment/_form', array(
            'model' => $comment,
        ));
        ?>
    <?php endif; ?>
</div><!-- blog-comments-container-->