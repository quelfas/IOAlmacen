<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devolucion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

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
		<?php echo $form->labelEx($model,'DocEntrada'); ?>
		<?php echo $form->textField($model,'DocEntrada',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'DocEntrada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'productoID'); ?>
		<?php echo $form->dropDownlist($model,'productoID',CHtml::ListData(salida::model()->findAll(),'codProducto','ProductoCompleto')); ?>
		<?php echo $form->error($model,'productoID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salidaID'); ?>
		<?php if ($model->isNewRecord): ?>

			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'salidaID',
            //'value'=>'productoID',
            'source'=>CController::createUrl('autoCompleteSalida'),
            'htmlOptions'=>array('placeholder'=>'Esperando Datos'),
            'options'=>array(
            'showAnim'=>'fold',         
            'minLength'=>'1',
            'select'=>'js:function( event, ui ) {
            			$("#salidaID").val( ui.item.label );
                        $("#Devolucion_salidaID").val(ui.item.value);
                        return false;
                  }',
            )
            )); ?>
			
			<?php else: ?>
			<?php echo $form->hiddenField($model,'salidaID'); ?>
		<?php endif ?>
		
		<?php echo $form->error($model,'salidaID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Orden'); ?>
		<?php echo $form->textArea($model,'Orden',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AutoEntrada'); ?>
		<?php echo $form->textField($model,'AutoEntrada'); ?>
		<?php echo $form->error($model,'AutoEntrada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->