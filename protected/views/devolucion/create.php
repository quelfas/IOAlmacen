<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */

$this->breadcrumbs=array(
	'Devoluciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Devoluciones', 'url'=>array('index')),
	array('label'=>'Administrar Devoluciones', 'url'=>array('admin')),
);
?>

<h1>Crear Devolucion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>