<?php
class User extends AppModel {
	public $actsAs = array('Containable');
    public $hasMany = array(
        'Chat' => array(
            'className'  => 'Chat',
            'foreignKey' => 'user_id'
         )
    );
    /* validate data enetered by user */
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );
    
    public function beforeSave($options = array()) {
        
    /* password hashing */    
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}
}
 