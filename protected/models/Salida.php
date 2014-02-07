<?php

/**
 * This is the model class for table "salida".
 *
 * The followings are the available columns in table 'salida':
 * @property integer $idSalida
 * @property string $fecha
 * @property integer $codEntrada
 * @property integer $codProducto
 * @property integer $cantidad
 * @property string $nEntrega
 */
class Salida extends CActiveRecord
{
	public $miProducto;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'salida';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, codEntrada, codProducto, cantidad, nEntrega', 'required'),
			array('codEntrada, codProducto, cantidad', 'numerical', 'integerOnly'=>true),
			array('nEntrega', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idSalida, fecha, codEntrada, codProducto, cantidad, nEntrega', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSalida' => 'Id Salida',
			'fecha' => 'Fecha de Salida',
			'codEntrada' => 'Codigo de Entrada',
			'codProducto' => 'Producto',
			'cantidad' => 'Cantidad de Salida',
			'nEntrega' => 'Nota de Entrega o Orden',
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

		$criteria->compare('idSalida',$this->idSalida);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('codEntrada',$this->codEntrada);
		$criteria->compare('codProducto',$this->codProducto);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('nEntrega',$this->nEntrega,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Salida the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getSalidaCompleta()
    {
        return $this->idSalida.'-'.$this->cantidad;
    }

}
