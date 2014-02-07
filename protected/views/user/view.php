<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'Lista de Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar este Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Usuario: <?php echo $model->username; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'username',
		'password',
		'mail',
	),
)); ?>

<?php foreach (Yii::app()->authManager->getAuthItems() as $dataAuth):?>
<?php $habilitado = Yii::app()->authManager->checkAccess($dataAuth->name,$model->id); ?>
<?php if($dataAuth->type==0){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title"><?php echo $dataAuth->name; ?></h4>
	</div>
		<div class="panel-body">
			<?php echo "Rol: ";?>
			<?php echo Chtml::link($habilitado?"Revocar":"Asignar",array("user/assign","id"=>$model->id,"item"=>$dataAuth->name),array("class"=>$habilitado?"btn btn-primary":"btn")); ?>
			<p><?php echo $dataAuth->description; ?></p>
		</div>	
</div>
<?php } ?>

<?php if($dataAuth->type==1){?>
<div class="panel panel-success">
		<div class="panel-heading">
			<h4 class="panel-title"><?php echo $dataAuth->name; ?></h4>
		</div>
		<div class="panel-body">
			<?php echo "Tarea: ";?>
			<?php echo Chtml::link($habilitado?"Revocar":"Asignar",array("user/assign","id"=>$model->id,"item"=>$dataAuth->name),array("class"=>$habilitado?"btn btn-primary":"btn")); ?>
			<p><?php echo $dataAuth->description; ?></p>
		</div>
</div>
<?php } ?>

<?php if($dataAuth->type==2){?>
<div class="panel panel-info">
		<div class="panel-heading">
			<h4 class="panel-title"><?php echo $dataAuth->name; ?></h4>
		</div>
		<div class="panel-body">
			<?php echo "Operacion: ";?>
			<?php echo Chtml::link($habilitado?"Revocar":"Asignar",array("user/assign","id"=>$model->id,"item"=>$dataAuth->name),array("class"=>$habilitado?"btn btn-primary":"btn")); ?>
			<p><?php echo $dataAuth->description; ?></p>
		</div>
</div>
<?php } ?>

<?php endforeach; ?>