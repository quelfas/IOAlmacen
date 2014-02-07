<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
  		<h4>Info</h4>
		<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	</div>
	
	
	<?php echo $form->errorSummary($model,"<button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Error en el Formulario</h4>","",array("class"=>"alert alert-error")); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo"<br>". $form->error($model,'username',array("class"=>"label label-important")); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo"<br>". $form->error($model,'password',array("class"=>"label label-important")); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mail'); ?>
		<?php echo $form->textField($model,'mail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo"<br>". $form->error($model,'mail',array("class"=>"label label-important")); ?>
	</div>

	<div class="row buttons">
		<?php echo"<br>". CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->