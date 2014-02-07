<?php
/* @var $this OperadorController */
/* @var $model Operador */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'operador-form',
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
		<?php echo $form->labelEx($model,'idfactura'); ?>
		<?php echo $form->dropDownlist($model,'idfactura',CHtml::ListData(Factura::model()->findAll(" estado = 2 "),'idFactura','nFactura')); ?>
		<?php echo $form->error($model,'idfactura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idProducto'); 
		?>
		<?php // echo $form->dropDownlist($model,'idProducto',CHtml::ListData(Producto::model()->findAll(),'idproducto','nombre'), array('empty'=>'Seleccione')); 

         $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'idProductos',
            'value'=>'Carga',
            'source'=>CController::createUrl('autoComplete'),
            'options'=>array(
            'showAnim'=>'fold',         
            'minLength'=>'2',
            'select'=>'js:function( event, ui ) {
            			$("#idProductos").val( ui.item.label );
                        $("#Operador_idProducto").val( ui.item.value );
                        return false;
                  }',
            )
            ));
         	echo $form->hiddenField($model,'idProducto');
		?>
		<?php echo $form->error($model,'idProducto'); 
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->