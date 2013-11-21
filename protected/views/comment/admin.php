<?php
$this->breadcrumbs = array(
    'Comments' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Comment', 'url' => array('index')),
    array('label' => 'Create Comment', 'url' => array('create')),
);
?>

<h1>Manage Comments</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'comment-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'author',
        'comment',
        'created',
        'updated',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
