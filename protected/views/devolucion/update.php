<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */

$this->breadcrumbs=array(
	'Devolucion'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Devoluciones', 'url'=>array('index')),
	array('label'=>'Crear Devolucion', 'url'=>array('create')),
	array('label'=>'Ver Devolucion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Devoluciones', 'url'=>array('admin')),
);
?>

<h1>Actualizacion de Devolucion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>