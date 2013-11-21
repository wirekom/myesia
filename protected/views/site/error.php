<?php
$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>

<div class="container inner">
    <div class="row-fluid">
        <div class="span12">
            <h2>Error <?php echo $code; ?></h2>
            <?php echo CHtml::encode($message); ?>
        </div>
    </div>
</div>