<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */
/* @var $form CActiveForm */
?>
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$('#Devolucion_productoID').on('change', function() {
  alert("Atencion!!! La Salida es "+this.value);
  $("#Devolucion_salidaID").val(this.value);
})


});//]]>  

</script>
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
		<?php 
		//por politicas de proteccion y acceso de datos el SuperAdmin tiene acceso a un año en el rango de fechas para el manejo de devoluciones
		//el valor para los demas es de 30 dias
				if (Yii::app()->user->checkAccess("SuperAdmin")) {
					//vista de un año al superAdmin
					$rangeEnd = 360;
					$SerchMessage = "<br>Segun politicas de control y acceso de datos";
				} else {
					//vista de 30 dias para no tengan el rol de SuperAdmin
					$rangeEnd = 30;
					$SerchMessage = "";
				}
				
		?>
		<?php echo $form->labelEx($model,'productoID'); ?>
		<div class="alert">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<strong>Atencion!</strong> Solo se consultan los <?php echo $rangeEnd ?> ultimos dias de Envios. <?php echo $SerchMessage; ?>
		</div>
		
		<?php
			 $ListSalida = Yii::app()
										->db
										->createCommand()
										->SELECT('idSalida, fecha, codEntrada, codProducto')
										->FROM('salida') 
										->WHERE('fecha BETWEEN DATE_SUB(CURDATE(), INTERVAL '.$rangeEnd.' DAY) AND CURDATE()')
										->queryAll();
			$volcado = array();
			$volcado[]="seleccione";
			foreach ($ListSalida as $key => $value) {
				//print_r($value);
				 $volcado[$value['idSalida'].".".$value['codEntrada'].".".$value['codProducto']] = Producto::ToProductoCompleto($value['codProducto'])." Salida:".$value['fecha'];
			}

			echo $form->dropDownlist($model, 'productoID', $volcado);

		?>
		<?php echo $form->error($model,'productoID'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'salidaID'); ?>
		<?php echo $form->hiddenField($model,'salidaID'); ?>
		<?php //echo $form->error($model,'salidaID'); ?>
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
		<?php
		$selectActionEntrada = array(1=>"Si", 2=>"No");
		 echo $form->dropDownlist($model,'AutoEntrada', $selectActionEntrada); 
		 ?>
		<?php echo $form->error($model,'AutoEntrada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->