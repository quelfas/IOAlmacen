<?php
/* @var $this SalidaController */
/* @var $model Salida */

$this->breadcrumbs=array(
	'Salidas'=>array('index'),
	$model->idSalida,
);

$this->menu=array(
	array('label'=>'List Salida', 'url'=>array('index')),
	array('label'=>'Create Salida', 'url'=>array('create')),
	array('label'=>'Update Salida', 'url'=>array('update', 'id'=>$model->idSalida)),
	array('label'=>'Delete Salida', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSalida),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Salida', 'url'=>array('admin')),
);
?>

<h1>Salida #<?php echo $model->idSalida; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSalida',
		'fecha',
		//'codEntrada',
		array(
			'name'=>'codEntrada',
			'label'=>'Codigo de Entrada',
			'value'=>entrada::LinkToEntradaCompleta($model->codEntrada),
			'type'=>'raw',
			),
		//'codProducto',
		array(
			'name'=>'codProducto',
			'label'=>'Producto',
			'value'=>Producto::LinkToProductoCompleto($model->codProducto),
			'type'=>'raw',
			),
		'cantidad',
		'nEntrega',
	),
)); ?>
