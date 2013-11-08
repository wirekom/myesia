<?php
$this->breadcrumbs=array(
	'Shoutboxes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Shoutbox','url'=>array('index')),
	array('label'=>'Create Shoutbox','url'=>array('create')),
	array('label'=>'View Shoutbox','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Shoutbox','url'=>array('admin')),
);
?>

<h1>Update Shoutbox <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>