<?php
/* @var $this FacturaController */
/* @var $model Factura */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	'Administrar Facturas',
);

$this->menu=array(
	array('label'=>'Lista de Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#factura-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Facturas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'id'=>'factura-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'idFactura',
		
		'idProveedor',
		*/
		array(
			'name' =>'idProveedor',
			'header'=>'Proveedor',
			'value'=>'$data->idProveedor0->proveedor',
			'filter'=>CHtml::listData(Proveedor::model()->findAll(),'idProveedor','proveedor'),
		),
		'fecha',
		/*'nFactura',*/
		array(
			'name'=>'nFactura',
			'value'=>'CHtml::link($data->nFactura, Yii::app()->createUrl("factura/view",array("id"=>$data->idFactura)))',
			'type'=>'raw',
			),
		'eFecha',
		'monto',
		/*
		'estado',
		*/
		array(
			'name'=>'estado',
			'value'=>'factura::getActivos($data->estado)',
			'filter'=>factura::getActivos(),
			),
		array(
			//'class'=>'CButtonColumn',
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
