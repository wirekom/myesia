<?php
$this->breadcrumbs = array(
    'News' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List News', 'url' => array('/category/index')),
    array('label' => 'Create News', 'url' => array('create')),
);
?>

<h1>Manage News</h1>


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'news-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'author',
        array(
            'name' => 'category_id',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->category->name)',
            'filter' => $model->categoryOptions,
        ),
        array(
            'name' => 'image',
            'type' => 'html',
            'value' => '$data->imageHtml',
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), $data->url)'
        ),
        array(
            'name' => 'status',
            'filter' => $model->statusOptions,
            'type' => 'raw',
            'value' => 'CHtml::encode($data->statusText)'
        ),
        array(
            'name' => 'is_banner',
            'filter' => $model->bannerOptions,
            'type' => 'raw',
            'value' => 'CHtml::encode($data->bannerText)'
        ),
        array(
            'name' => 'created',
            'type' => 'datetime',
            'filter' => false,
        ),
        array(
            'name' => 'updated',
            'type' => 'datetime',
            'filter' => false,
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
        ),
    ),
));
?>
