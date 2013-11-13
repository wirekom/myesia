<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'news-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->fileFieldRow($model, 'file', array('class' => 'span5', 'maxlength' => 150)); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 225)); ?>

<?php
$this->widget('ext.editMe.widgets.ExtEditMe', array(
    'model' => $model,
    'attribute' => 'content',
    'toolbar' => Yii::app()->params['toolbar_editor'],
    'filebrowserBrowseUrl' => Yii::app()->baseUrl . '/kcfinder/browse.php?type=files',
    'filebrowserImageBrowseUrl' => Yii::app()->baseUrl . '/kcfinder/browse.php?type=images',
    'filebrowserFlashBrowseUrl' => Yii::app()->baseUrl . '/kcfinder/browse.php?type=flash',
    'filebrowserUploadUrl' => Yii::app()->baseUrl . '/kcfinder/upload.php?type=files',
    'filebrowserImageUploadUrl' => Yii::app()->baseUrl . '/kcfinder/upload.php?type=images',
    'filebrowserFlashUploadUrl' => Yii::app()->baseUrl . '/kcfinder/upload.php?type=flash',
));
?>

<?php echo $form->dropDownListRow($model, 'category_id', $model->getCategoryOptions(), array('class' => 'span5')); ?>

<?php echo $form->dropDownListRow($model, 'status', $model->getStatusOptions(), array('class' => 'span5')); ?>

<?php echo $form->checkBoxRow($model, 'is_banner', array('class' => '')); ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
