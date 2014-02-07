<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Proveedores', 'url'=>array('index')),
	array('label'=>'Administrar Proveedor', 'url'=>array('admin')),
);
?>

<h1>Crear Proveedor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>