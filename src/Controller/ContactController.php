<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ContactController extends AppController{
        
        public function initialize() {
            parent::initialize();
            
            $this->Auth->allow('index');
        }

        
        function index(){
                    if($this->request->is('post')){
                        $email = $this->request->getData('email');
                        $message = $this->request->getData('content');
                        $nom = $this->request->getData('name');
                        $this->sendUserEmail($email,$nom,$message);
            }
    }
}