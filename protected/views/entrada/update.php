<?php
/* @var $this EntradaController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	$model->idEntrada=>array('view','id'=>$model->idEntrada),
	'Update',
);

$this->menu=array(
	array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Create Entrada', 'url'=>array('create')),
	array('label'=>'View Entrada', 'url'=>array('view', 'id'=>$model->idEntrada)),
	array('label'=>'Manage Entrada', 'url'=>array('admin')),
);
?>

<h1>Update Entrada <?php echo $model->idEntrada; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>