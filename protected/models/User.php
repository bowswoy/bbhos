<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $u_id
 * @property string $u_usr
 * @property string $u_pwd
 * @property string $u_fullname
 * @property string $u_position
 * @property string $u_department
 * @property string $u_lastlogin
 * @property integer $u_status
 *
 * The followings are the available model relations:
 * @property Log[] $logs
 * @property News[] $news
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('u_usr, u_pwd', 'required'),
			array('u_status', 'numerical', 'integerOnly'=>true),
			array('u_usr', 'length', 'max'=>32),
			array('u_pwd, u_fullname, u_position, u_department', 'length', 'max'=>255),
			array('u_lastlogin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('u_id, u_usr, u_pwd, u_fullname, u_position, u_department, u_lastlogin, u_status', 'safe', 'on'=>'search'),
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
			'logs' => array(self::HAS_MANY, 'Log', 'u_id'),
			'news' => array(self::HAS_MANY, 'News', 'u_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'u_id' => 'à¸£à¸«à¸±à¸ª',
			'u_usr' => 'à¸Šà¸·à¹ˆà¸­à¸œà¸¹à¹‰à¹ƒà¸Šà¹‰',
			'u_pwd' => 'à¸£à¸«à¸±à¸ªà¸œà¹ˆà¸²à¸™',
			'u_fullname' => 'à¸Šà¸·à¹ˆà¸­ - à¸ªà¸à¸¸à¸¥',
			'u_position' => 'à¸•à¸³à¹à¸«à¸™à¹ˆà¸‡',
			'u_department' => 'à¸«à¸™à¹ˆà¸§à¸¢à¸‡à¸²à¸™',
			'u_lastlogin' => 'à¹ƒà¸Šà¹‰à¸‡à¸²à¸™à¸¥à¹ˆà¸²à¸ªà¸¸à¸”',
			'u_status' => 'à¸ªà¸–à¸²à¸™à¸°',
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

		$criteria->compare('u_id',$this->u_id);
		$criteria->compare('u_usr',$this->u_usr,true);
		$criteria->compare('u_pwd',$this->u_pwd,true);
		$criteria->compare('u_fullname',$this->u_fullname,true);
		$criteria->compare('u_position',$this->u_position,true);
		$criteria->compare('u_department',$this->u_department,true);
		$criteria->compare('u_lastlogin',$this->u_lastlogin,true);
		$criteria->compare('u_status',$this->u_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
