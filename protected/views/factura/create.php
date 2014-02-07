<?php
/* @var $this FacturaController */
/* @var $model Factura */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	'Crear Factura',
);

$this->menu=array(
	array('label'=>'Lista de Facturas', 'url'=>array('index')),
	array('label'=>'Administrar Factura', 'url'=>array('admin')),
);
?>

<h1>Crear Factura</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>