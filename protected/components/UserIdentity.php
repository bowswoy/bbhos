<?php

class UserIdentity extends CUserIdentity
{
	private $_id;

	public function authenticate()
	{
		$user = User::model()->find('u_status = 1 AND u_usr = ?', array($this->username));
		if ($user === null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} else if ($user->u_pwd != md5($this->password)) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$this->_id = $user->u_id;
			Yii::app()->user->setState('detail', $user);
			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}