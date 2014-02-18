<?php 
class Thread extends AppModel 
{
	public $actsAs = array('Containable');
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
	 public $hasMany = array(
        'Chat' => array(
            'className'  => 'Chat',
            'foreignKey' => 'thread_id'
         )
    );
} 
?>