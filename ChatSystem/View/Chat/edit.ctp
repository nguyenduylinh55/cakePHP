<?php
if ($this->Session->read('Auth.User')): ?>
        You are logged in as <?php echo $this->Session->read('Auth.User.username'); ?>. <?php echo $this->Html->link('logout', array('controller' => 'users', 'action' => 'logout')); ?>
    <?php else: ?>
        <?php echo $this->Html->link('login', array('controller' => 'users', 'action' => 'login')); ?>
    <?php endif; ?>
</p>
 <?php
echo $this->Form->create(null, array(
    'url' => array('controller' => 'chat', 'action' => 'add')
));
echo $this->Form->input('content');
echo $this->Form->end('Sent');
    echo $this->Form->create('Chat');
    echo $this->Form->input('Chat.content');
    // and any other fields
    echo $this->Form->input('Chat.chat_id', array('type' => 'hidden'));
    echo $this->Form->end('Save user');

?>