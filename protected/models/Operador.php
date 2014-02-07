<?php

/**
 * This is the model class for table "operador".
 *
 * The followings are the available columns in table 'operador':
 * @property integer $idoperador
 * @property string $fecha
 * @property integer $idfactura
 * @property integer $idProducto
 * @property integer $cantidad
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property Factura $idfactura0
 * @property Producto $idProducto0
 */
class Operador extends CActiveRecord
{
	public $Total;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'operador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, idfactura, idProducto, precio', 'required'),
			array('idfactura, idProducto, cantidad', 'numerical', 'integerOnly'=>true),
			array('precio', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idoperador, fecha, idfactura, idProducto, cantidad, precio', 'safe', 'on'=>'search'),
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
			'idfactura0' => array(self::BELONGS_TO, 'Factura', 'idfactura'),
			'idProducto0' => array(self::BELONGS_TO, 'Producto', 'idProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idoperador' => 'Idoperador',
			'fecha' => 'Fecha',
			'idfactura' => 'Factura',
			'idProducto' => 'Producto',
			'cantidad' => 'Cantidad en Factura',
			'precio' => 'Precio',
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

		$criteria->compare('idoperador',$this->idoperador);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('idfactura',$this->idfactura);
		$criteria->compare('idProducto',$this->idProducto);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('precio',$this->precio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Operador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
