<?php

/**
 * This is the model class for table "entrada".
 *
 * The followings are the available columns in table 'entrada':
 * @property integer $idEntrada
 * @property integer $idFactura
 * @property integer $idProducto
 * @property string $fecha
 * @property integer $cEntrada
 * @property string $codEntrada
 * @property string $ubicacion
 * @property string $docEntrada
 *
 * The followings are the available model relations:
 * @property Factura $idFactura0
 * @property Producto $idProducto0
 */
class Entrada extends CActiveRecord
{
	public $Factura;
	public $Producto;
	public $conteoGeneral;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entrada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFactura, idProducto, fecha, cEntrada, codEntrada, ubicacion, docEntrada', 'required'),
			array('idFactura, idProducto, cEntrada', 'numerical', 'integerOnly'=>true),
			array('codEntrada', 'length', 'max'=>10),
			array('ubicacion', 'length', 'max'=>45),
			array('docEntrada', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEntrada, idFactura, idProducto, fecha, cEntrada, codEntrada, ubicacion, docEntrada', 'safe', 'on'=>'search'),
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
			'idFactura0' => array(self::BELONGS_TO, 'Factura', 'idFactura'),
			'idProducto0' => array(self::BELONGS_TO, 'Producto', 'idProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEntrada' => 'Entrada',
			'idFactura' => 'Factura',
			'idProducto' => 'Producto',
			'fecha' => 'Fecha Entrada',
			'cEntrada' => 'Cantidad Entrada',
			'codEntrada' => 'Codigo de Entrada',
			'ubicacion' => 'Ubicacion en Deposito',
			'docEntrada' => 'Guia o Nota de Entrega',
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

		$criteria->compare('idEntrada',$this->idEntrada);
		$criteria->compare('idFactura',$this->idFactura);
		$criteria->compare('idProducto',$this->idProducto);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('cEntrada',$this->cEntrada);
		$criteria->compare('codEntrada',$this->codEntrada,true);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('docEntrada',$this->docEntrada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Entrada the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function LinkToEntradaCompleta($modelData)
	{
		$dataEntradaArreglo = CHtml::listData(entrada::model()->findAll(),'idEntrada','codEntrada');

		foreach ($dataEntradaArreglo as $key1 => $value1) {
			if($modelData==$key1)
			 return CHtml::link($value1, array('entrada/view', 'id'=>$modelData));
		}
	}

	
}
