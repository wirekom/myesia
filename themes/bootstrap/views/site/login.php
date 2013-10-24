<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="container inner">
	<div class="innerLR">
	<div class="row-fluid"><!--========== Content ===========-->
	<div class="wid"><!--========== Content ===========-->
		<div class="span12"><!-- Topic Terbaru -->
			<div class="alat">
<h1 class="title-hed"><i class="icons-user"></i>&nbsp;Log On User</h1>


<div class="wid-body">
<p>Please fill out the following form with your login credentials:</p>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'vertical',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->textFieldRow($model,'username',array('placeholder'=>'Username')); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('placeholder'=>'Password')); ?>

	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

	<div class="control-group">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Login',
        )); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'reset',
            'type'=>'primary',
            'label'=>'Reset',
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
			</div>
		</div>
	</div>
    </div>
	</div><!-- /innerLR -->
</div><!-- /container -->