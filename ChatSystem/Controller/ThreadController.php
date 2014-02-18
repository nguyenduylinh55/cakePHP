
<?php
class ThreadController extends AppController {

    function index($id=null) {
    	if($id!=null)
    	{
		$item = $this->Chat->find('first',array('conditions'=>array('Chat.id'=>$id,'Chat.username'=>$this->Session->read('Auth.User.username'))));
		if($item!=null)
			{
    		$this->request->data = $item;
			}
			else
			{
			$this->redirect(array('action'=>'index'));
			}

		 //  $this->request->data = $this->Chat->findById($id);
    	}	
 $this->Thread->bindModel(
        array('belongsTo' => array(
                'User' => array(
                    'className' => 'User'
                )
            )
        )
    );

       $this->set('thread', $this->Thread->find('all'));
    }
	    function show() {
		    	$this->layout = false;
        $this->set('chat', $this->Chat->find('all', array(
       'order' => array('Chat.create_time' => 'desc'),'contain' => array('User'))));
    }
    public function edit($id=null) {
    	if ($this->request->data['Chat']['content']!='') {
			$this->request->data['Chat']['create_time']=date("Y-m-d H:i:s");
	//	$this->Chat->id=$this->request->data['Chat']['id'];
		$this->Chat->save($this->request->data);
    		//$this->Chat->query("UPDATE chats SET content='".$this->request->data['Chat']['content']."' , create_time=now() WHERE id=".$this->request->data['Chat']['id']);
    		
    	}
			$this->redirect(array('action' => 'index'));
    	//else {
    	//	$this->request->data = $this->Chat->find('first',array('conditions'=>array('chat.id'=>$id)));
    	//}
    }
    public function delete($id=null) {
    	if ($this->request->is('post')) {
    		if ($this->User->save($this->request->data)) {
    			$this->Session->setFlash('User successfully saved.');
    			$this->redirect(array('action' => 'index'));
    		}
    	}
    	else {
  /*  		$item = $this->Chat->find('all', array(
    'conditions' => array(
        'chat.id' => $id)));
    		$item[0]['Chat']['content']='test';
    		   $this->set('chat',$item);
    */		   
    		   $data = array('id' => 10, 'content' => 'My new title');
			   $item = $this->Chat->find('first',array('conditions'=>array('Chat.id'=>$id,'Chat.username'=>$this->Session->read('Auth.User.username'))));
			   $item['Chat']['delete_time']=date("Y-m-d H:i:s");
			   $this->Chat->save($item);
    		//$this->Chat->query('UPDATE chats SET delete_time=now() WHERE id='.$id);
    		$this->redirect(array('action' => 'index'));
    	} 
    }

 public function add() {
        if ($this->request->is('post')) {
            $this->Thread->create();
			if (!empty($this->request->data['Thread']['thread_name']))  
			{
			$username = $this->Session->read('Auth.User.id');
			$this->request->data['Thread']['create_time']=DboSource::expression('NOW()');
			$this->request->data['Thread']['user_id']=$username;
            if ($this->Thread->save($this->request->data)) {
              //  $this->Session->setFlash(__('Your post has been saved.')); 
            }
			}
			 return $this->redirect(array('action' => 'index'));
            //$this->Session->setFlash(__('Unable to add your post.'));
        }
}
} 
?>