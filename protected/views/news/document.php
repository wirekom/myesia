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
<div style="height:600px;">
    <?php
    Yii::app()->clientScript->registerCoreScript('jquery');

    $this->widget('ext.pdfJs.QPdfJs', array(
        'url' => Yii::app()->baseUrl . Yii::app()->params['uploads_documents'] . $model->image,
    ))
    ?>
</div>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'image',
            'type' => 'html',
            'value' => $model->imageHtml,
        ),
        'title',
        array(
            'name' => 'category_id',
            'type' => 'raw',
            'value' => CHtml::encode($model->category->name),
        ),
        array(
            'name' => 'content',
            'type' => 'html',
        ),
        array(
            'name' => 'status',
            'type' => 'raw',
            'value' => CHtml::encode($model->statusText),
        ),
        'is_banner',
        array(
            'name' => 'author_id',
            'type' => 'raw',
            'value' => CHtml::encode($model->author->username),
        ),
    ),
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