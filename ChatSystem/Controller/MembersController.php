<?php 
class MembersController extends AppController {

    function index() {
        $this->set('members', $this->Member->find('all'));
    }

    function hello_world() {
        
    }
} 
?>