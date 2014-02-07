<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $idproducto
 * @property string $nombre
 * @property string $nParte
 * @property integer $precio
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property Entrada[] $entradas
 * @property Operador[] $operadors
 */
class Producto extends CActiveRecord
{
	public static $activos=array('1'=>'Activo','2'=>'Inactivo');

	public $task;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, nParte, precio, estado', 'required'),
			array('precio, estado', 'numerical', 'integerOnly'=>true),
			array('nombre, nParte', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idproducto, nombre, nParte, precio, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'entradas' => array(self::HAS_MANY, 'Entrada', 'idProducto'),
			'operadors' => array(self::HAS_MANY, 'Operador', 'idProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (activo - inactivo)
	 */
	public static function getActivos($key=null)
	{
		if($key!==null)
			return self::$activos[$key];
		return self::$activos;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproducto' => 'Idproducto',
			'nombre' => 'Descricion del Producto',
			'nParte' => 'Numero de Parte',
			'precio' => 'Precio',
			'estado' => 'Estado (Activo - Inactivo)',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nParte',$this->nParte,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getProductoCompleto()
    {
        return $this->nParte.' '.$this->nombre;
    }

    public function LinkToProducto($modelData)
	{
		$dataProductoArreglo = CHtml::listData(producto::model()->findAll(),'idproducto','nombre');

		foreach ($dataProductoArreglo as $key1 => $value1) {
			if($modelData==$key1)
			 echo CHtml::link($value1, array('producto/view', 'id'=>$modelData, 'task'=>'F'));
		}
	}
	public function LinkToProductoCompleto($modelData)
	{
		$dataProductoArreglo = CHtml::listData(producto::model()->findAll(),'idproducto','productoCompleto');

		foreach ($dataProductoArreglo as $key1 => $value1) {
			if($modelData==$key1)
			 return CHtml::link($value1, array('producto/view', 'id'=>$modelData, 'task'=>'F'));
		}
	}

	public function ejecutaString($dataString)
	{
		eval($dataString);
	}
	
	/**
	*public function resaltadorNparte($modelData,$g)
	*{
	*	//determinando si $objetivo esta definido
	*	//defino lo que se va a reemplazar
	*	if(isset($g)){
	*		$salida = str_replace($objetivo, "<span style='background-color:yellow'>".$g."</span>", $modelData);
	*	}else{
	*		$salida = $modelData;
	*	}
	*	return $salida." ".$g;
	*}
	**/
}
