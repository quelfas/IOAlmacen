<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */

$this->breadcrumbs=array(
	'Devolucion'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de Devoluciones', 'url'=>array('index')),
	array('label'=>'Crear Devolucion', 'url'=>array('create')),
	array('label'=>'Actualizar Devolucion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Devolucion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar esta Devolucion?')),
	array('label'=>'Administrar Devoluciones', 'url'=>array('admin')),
);
?>

<h1>Devolucion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'DocEntrada',
		'productoID',
		'salidaID',
		'cantidad',
		'Orden',
		'AutoEntrada',
	),
)); ?>
