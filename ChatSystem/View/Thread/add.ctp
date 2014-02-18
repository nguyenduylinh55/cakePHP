<?php
if ($this->Session->read('Auth.User')): ?>
        You are logged in as <?php echo $this->Session->read('Auth.User.username'); ?>. <?php echo $this->Html->link('logout', array('controller' => 'users', 'action' => 'logout')); ?>
    <?php else: ?>
        <?php echo $this->Html->link('login', array('controller' => 'users', 'action' => 'login')); ?>
    <?php endif; ?>
</p>
 <?php

    echo $this->Form->create('Thread');
    echo $this->Form->input('Thread.thread_name');

    echo $this->Form->end('Save user');

?>