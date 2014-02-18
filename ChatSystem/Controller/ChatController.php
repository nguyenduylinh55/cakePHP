
<?php
class ChatController extends AppController {

    function index($threadid=null,$id=null) {
    	if($id!=null)
    	{
		$item = $this->Chat->find('first',array('conditions'=>array('Chat.id'=>$id,'Chat.username'=>$this->Session->read('Auth.User.username'))));
		if($item!=null)
			{
    		$this->request->data = $item;
			}
			else
			{
			$this->redirect(array('action'=>'index',$threadid));
			}
    	}	
	   $this->set('threadid', $threadid);
       $this->set('chat', $this->Chat->find('all', array(
       'order' => array('Chat.create_time' => 'desc'),'contain' => array('User'),'conditions'=>array('Chat.thread_id'=>$threadid))));
    }
	    function show($id=null) {
		    	$this->layout = false;
        $this->set('chat', $this->Chat->find('all', array(
       'order' => array('Chat.create_time' => 'desc'),'contain' => array('User'),'conditions'=>array('Chat.thread_id'=>$id))));
    }
    public function edit($id=null) {
    	if ($this->request->data['Chat']['content']!='') {
			$this->request->data['Chat']['create_time']=date("Y-m-d H:i:s");
		$item = $this->Chat->find('first',array('conditions'=>array('Chat.id'=>$this->request->data['Chat']['id'])));
		$this->Chat->save($this->request->data);	
    	}
			$this->redirect(array('action' => 'index',$item['Chat']['thread_id']));
    }
    public function delete($id=null) {
    
			   $item = $this->Chat->find('first',array('conditions'=>array('Chat.id'=>$id,'Chat.username'=>$this->Session->read('Auth.User.username'))));
			   $item['Chat']['delete_time']=date("Y-m-d H:i:s");
			   $this->Chat->save($item);
    		$this->redirect(array('action' => 'index',$item['Chat']['thread_id']));
    }

 public function add() {
        if ($this->request->is('post')) {
            $this->Chat->create();
			if (!empty($this->request->data['Chat']['content']))  
			{
			$username = $this->Session->read('Auth.User.username');
			$this->request->data['Chat']['create_time']=DboSource::expression('NOW()');
			$this->request->data['Chat']['username']=$username;
            if ($this->Chat->save($this->request->data)) {
			}
			 
        }
		return $this->redirect(array('action' => 'index',$this->request->data['Chat']['thread_id']));
}
} 
}
?>