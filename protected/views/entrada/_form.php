<?php
/* @var $this EntradaController */
/* @var $model Entrada */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrada-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idFactura'); ?>
		<?php //echo $form->textField($model,'idFactura'); 
		echo $form->dropDownlist($model,'idFactura',CHtml::ListData(Factura::model()->findAll(" estado = 2 "),'idFactura','nFactura'));
		?>
		<?php echo $form->error($model,'idFactura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idProducto'); ?>
		<?php //echo $form->textField($model,'idProducto'); 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'idProducto',
            'value'=>'Carga',
            'source'=>CController::createUrl('autoComplete'),
            'options'=>array(
            'showAnim'=>'fold',         
            'minLength'=>'2',
            'select'=>'js:function( event, ui ) {
            			$("#idProducto").val( ui.item.label );
                        $("#Entrada_idProducto").val( ui.item.value );
                        return false;
                  }',
            )
            ));
		echo $form->hiddenField($model,'idProducto');
		?>
		<?php echo $form->error($model,'idProducto'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'cEntrada'); ?>
		<?php echo $form->textField($model,'cEntrada'); ?>
		<?php echo $form->error($model,'cEntrada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codEntrada'); ?>
		<?php echo $form->textField($model,'codEntrada',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codEntrada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ubicacion'); ?>
		<?php echo $form->textField($model,'ubicacion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ubicacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'docEntrada'); ?>
		<?php echo $form->textField($model,'docEntrada',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'docEntrada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->