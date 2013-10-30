<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'static-page-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model, $menu); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php
$this->widget('ext.editMe.widgets.ExtEditMe', array(
    'model' => $model,
    'attribute' => 'content',
    'toolbar' => Yii::app()->params['toolbar_editor'],
    'filebrowserImageBrowseUrl' => Yii::app()->baseUrl . '/kcfinder/browse.php?type=files',
    'filebrowserImageUploadUrl' => Yii::app()->baseUrl . '/kcfinder/upload.php?type=files',
));
?>
<?php echo $form->dropDownListRow($model, 'status', $model->getStatusOptions(), array('class' => 'span5')); ?>

<?php echo $form->checkBoxRow($model, 'menu_link', array('class' => 'span5')); ?>

<div class="menu-form">
    <?php $this->renderPartial('_menu', array('menu' => $menu, 'form' => $form)); ?>
</div>

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
