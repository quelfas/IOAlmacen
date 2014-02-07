<?php
/* @var $this SalidaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Salidas',
);

$this->menu=array(
	array('label'=>'Create Salida', 'url'=>array('create')),
	array('label'=>'Manage Salida', 'url'=>array('admin')),
);
?>

<h1>Salidas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
