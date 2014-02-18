 <?php

class UsersController extends AppController {
    public function beforeFilter() {
         parent::beforeFilter();
        $this->Auth->allow('add'); 
        
    }

    public function login() {
    	//$this->layout = false;
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect( array('controller' => 'chat', 'action' => 'index'));
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
         /* logout and redirect to url set in app controller */
		  if ($this->Auth->logout()) {
                return $this->redirect( array('controller' => 'users', 'action' => 'login'));
            }
        //return $this->redirect($this->Auth->logout());
    }

   public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('controller' => 'users','action' => 'login'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }


}
