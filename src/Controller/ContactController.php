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
                        $test1 = $this->request->getData('email');
                        $test3 = $this->request->getData('content');
                        $this->sendUserEmail($test1,'Subject',$test3);
            }
    }
}