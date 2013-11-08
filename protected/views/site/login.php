<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="login">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'vertical',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<h1 class="title-hed">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_esia_baru2.png" title="<?php echo CHtml::encode($this->pageTitle); ?>" />
	</br><i class="icons-user"></i>&nbsp;Log On User</h1>

	<?php echo $form->textFieldRow($model,'username',array('placeholder'=>'Username')); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('placeholder'=>'Password')); ?>

	<?php echo $form->checkBoxRow($model,'rememberMe'); ?><br>

	<div class="control-group">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'label'=>'Login',
        )); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'reset',
            'label'=>'Reset',
        )); ?>
		<a href="<?php echo Yii::app()->request->baseUrl; ?>/" class="btn"><i class="icons-home"></i>&nbsp;Home</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->