<?php
/* @var $this SalidaController */
/* @var $model Salida */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'salida-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<?php if (isset($_GET["CodId"])) {
	$miEntrada = $_GET["CodId"];
}else{
	$miEntrada = " ";
} 
?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php //echo $form->textField($model,'fecha'); 
		$this->widget('zii.widgets.jui.CJuiDatePicker',
				array(
					'model'=>$model,
					'attribute'=>'fecha',
					'language'=>'es',
					'options'=>array(
						'dateFormat'=>'yy-mm-dd',
						'constrainInput'=>'false',
						'duration'=>'fast',
						'showAdmin'=>'slide',
						),
					)
				);
		?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codEntrada'); ?>
		<?php if ($model->isNewRecord): ?>
			<h4><?php echo entrada::LinkToEntradaCompleta($_GET['CodId']); ?></h4>
			<?php echo $form->hiddenField($model,'codEntrada',array("value"=>$_GET['CodId'])); ?>
		<?php else: ?>
			<?php echo $form->textField($model,'codEntrada'); ?>
		<?php endif ?>
		
		<?php echo $form->error($model,'codEntrada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codProducto'); ?>
		<?php if ($model->isNewRecord): ?>
			<h4><?php echo Producto::LinkToProductoCompleto($_GET['prodId']); ?></h4> 
			<?php echo $form->hiddenField($model,'codProducto',array("value"=>$_GET['prodId'])); ?>
		<?php else: ?>
			<?php echo $form->textField($model,'codProducto'); ?>
		<?php endif ?>
		
		<?php echo $form->error($model,'codProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nEntrega'); ?>
		<?php echo $form->textField($model,'nEntrega',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nEntrega'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->