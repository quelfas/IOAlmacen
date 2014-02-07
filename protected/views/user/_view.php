<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="well">

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mail')); ?>:</b>
	<?php echo CHtml::encode($data->mail); ?>
	<br />

	<?php 
	if(Yii::app()->authManager->checkAccess("SuperAdmin",$data->id))
	{
		echo "Rol: <span class='label label-danger'>SuperAdmin.</span>";
	}elseif(Yii::app()->authManager->checkAccess("Admin",$data->id))
	{
		echo "Rol: <span class='label label-danger'>Admin.</span>";
	}elseif(Yii::app()->authManager->checkAccess("Operador",$data->id))
	{
		echo "Rol: <span class='label label-danger'>Operador.</span>";
	}
	 ?>

</div>