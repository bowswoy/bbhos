<?php

/**
 * This is the model class for table "attachment".
 *
 * The followings are the available columns in table 'attachment':
 * @property integer $a_id
 * @property string $a_name
 * @property string $a_filename
 * @property string $a_type
 * @property double $a_size
 * @property integer $a_status
 * @property integer $a_order
 * @property integer $n_id
 *
 * The followings are the available model relations:
 * @property News $n
 */
class Attachment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attachment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('a_name, a_filename, a_type', 'required'),
			array('a_status, a_order, n_id', 'numerical', 'integerOnly'=>true),
			array('a_size', 'numerical'),
			array('a_name, a_filename', 'length', 'max'=>255),
			array('a_type', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('a_id, a_name, a_filename, a_type, a_size, a_status, a_order, n_id', 'safe', 'on'=>'search'),
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
			'n' => array(self::BELONGS_TO, 'News', 'n_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'a_id' => 'à¸£à¸«à¸±à¸ª',
			'a_name' => 'à¸Šà¸·à¹ˆà¸­à¹„à¸Ÿà¸¥à¹Œ',
			'a_filename' => 'à¸Šà¸·à¹ˆà¸­à¹„à¸Ÿà¸¥à¹Œà¹ƒà¸™à¸£à¸°à¸šà¸š',
			'a_type' => 'à¸›à¸£à¸°à¹€à¸ à¸—',
			'a_size' => 'à¸‚à¸™à¸²à¸”',
			'a_status' => 'à¸ªà¸–à¸²à¸™à¸°',
			'a_order' => 'à¸à¸²à¸£à¹€à¸£à¸µà¸¢à¸‡',
			'n_id' => 'à¸‚à¹ˆà¸²à¸§',
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

		$criteria->compare('a_id',$this->a_id);
		$criteria->compare('a_name',$this->a_name,true);
		$criteria->compare('a_filename',$this->a_filename,true);
		$criteria->compare('a_type',$this->a_type,true);
		$criteria->compare('a_size',$this->a_size);
		$criteria->compare('a_status',$this->a_status);
		$criteria->compare('a_order',$this->a_order);
		$criteria->compare('n_id',$this->n_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Attachment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
