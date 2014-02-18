
<?php
if ($this->Session->read('Auth.User')): ?>
        You are logged in as <?php echo $this->Session->read('Auth.User.username'); ?>. <?php echo $this->Html->link('logout', array('controller' => 'users', 'action' => 'logout')); ?>
    <?php else: ?>
        <?php echo $this->Html->link('login', array('controller' => 'users', 'action' => 'login')); ?>
    <?php endif; ?>
</p>
 <?php
if($thread==NULL){
   
}
else{
foreach ($thread as $item): 
	 	 echo $this->Html->link($item['Thread']['thread_name'],array(
        'controller' => 'Chat',
        'action' => 'index',
         $item['Thread']['id'])); 
		echo " Created by ".$item['User']['username']."<br/>";

 endforeach; 
unset($thread);
}
?>
</div>
