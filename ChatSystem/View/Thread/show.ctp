
<?php

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
        $item['Chat']['id'])); 
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
