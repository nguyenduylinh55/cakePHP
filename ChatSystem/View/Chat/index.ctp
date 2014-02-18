

<?php
echo "
<script>
$(document).ready(function() {
setInterval(function() {
$('.messageArea').load('http://192.168.33.11/CakePHPChat/ChatSystem/chat/show/$threadid');
}, 1000); 
});
</script>
";
if ($this->Session->read('Auth.User')): ?>
        You are logged in as <?php echo $this->Session->read('Auth.User.username'); ?>. <?php echo $this->Html->link('logout', array('controller' => 'users', 'action' => 'logout')); ?>
    <?php else: ?>
        <?php echo $this->Html->link('login', array('controller' => 'users', 'action' => 'login')); ?>
    <?php endif; ?>
</p>
 <?php
 if (isset($this->request->data['Chat']['content']))
 {
       echo $this->Form->create(null, array(
    'url' => array('controller' => 'chat', 'action' => 'edit')));
    echo $this->Form->input('content',array('label'=>''));
    // and any other fields
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Edit');
    }
    else
    {
//echo $this->Form->create(null, array(
 //   'url' => array('controller' => 'chat', 'action' => 'add')));
 echo $this->Form->create('Chat',array(
   'url' => array('controller' => 'chat', 'action' => 'add')));
echo $this->Form->input('content',array('label'=>''));
echo $this->Form->input('thread_id',array('value'=>$threadid,'type'=>'hidden'));
echo $this->Form->end('Send');
}
echo "<div class='messageArea'>";
if($chat==NULL){
   
}
else{
$messageStatus = true;
foreach ($chat as $item): 

if($messageStatus)
  	{
  	 echo "<div class='blockMessage msg1'>";
  	}
  	else
  	{
  		echo "<div class='blockMessage msg2'>";
  	}
 	 echo "<div class='header'>";
 	 if($messageStatus)
 	 {
 	 echo "<p class='attribution'>";
 	 }
 	 else
 	 {
 	 	echo "<p class='attribution2'>";
 	 }
	 	 echo $item['Chat']['username']."</p>";
		 echo " at ".$item['Chat']['create_time']."</div>";
		 if( $item['Chat']['delete_time']=='')
{
echo "<div class='messageContent'>". $item['Chat']['content']."</div>";
 echo "<div class='hyper'>";
 if ($item['Chat']['username']==$this->Session->read('Auth.User.username'))
 {
 echo $this->Html->link('Delete',array(
        'controller' => 'Chat',
        'action' => 'delete',
        $item['Chat']['id']
    ))." | ";echo $this->Html->link('Edit',array(
        'controller' => 'Chat',
        'action' => 'index',
         $item['Chat']['thread_id'],$item['Chat']['id'])); 
		}
	  }
	  else
	  {
		echo "<div class='messageContent'>Message has been deleted!</div>";
		echo "<div class='hyper'>";
	  }
	  	 echo "</div>";
  	 echo "</div>";

  	 $messageStatus = !$messageStatus;
 endforeach; 
unset($chat);
}
?>
</div>
