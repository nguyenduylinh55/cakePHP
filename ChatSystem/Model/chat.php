<?php 
class Chat extends AppModel 
{
	public $actsAs = array('Containable');
    public $belongsTo = array(
        'User' => array(
            'className'  => 'Users',
            'foreignKey' => 'user_id'
        )
    );
} 
?>