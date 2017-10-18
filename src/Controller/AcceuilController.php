<?php

namespace App\Controller;

use App\Controller\AppController;

class AcceuilController extends AppController
{
    
    public function initialize() {
        parent::initialize();
            
        $this->Auth->allow('index');
    }
         
    
    public function index()
    {   
        $this->loadModel('Employes');
        if ($this->request->is('post')) {
            
             $query = $this->Employes
            ->find()
            ->select(['courriel'])
            ->where(['courriel' => $this->request->data('courriel')]);
         
            if (!$query->isEmpty()) {
                $this->SendUserPlan($this->request->data('courriel'));
            } 
            
             $this->Flash->Success('Votre plan a été envoyé');
        }
        
       /* if (exist($this->request->data('courriel'))){
            
        }*/
        
       
        $this->set(compact('employes', 'query', 'subquery'));
       
        
        
        /*$subquery = $this->Employes->find()
        ->select(['courriel'])
        ->where(function ($exp, $q) {
        return $exp->equalFields('Employes.courriel', $this->request->data('courriel'));
        });

        $query = $this->Employes->find()
        ->select(['courriel'])
        ->where(function ($exp) use ($subquery) {
            return $exp->exists($subquery);
        });*/
        
        
       /* $query = $this->Employes->find()
        ->where(function ($exp) use ($subquery) {
            return $exp->exists($subquery);
        });*/
        
     
        
        /*if ($this->request->is('post')) {
            $verify = array ('Employe.courriel' => $this->request->data('courriel'));
            echo $verify;
            if ($this->employes->hasAny($verify)){
                $this->Flash->Success('hey');
            }

        } */
        
       /* echo $this->request->data['courriel'];
        $userTable = TableRegistry::get('Employes');
        $employes = $userTable->exists(['courriel' => $this->request->data['courriel']]);
        if (empty($employes)){
            echo "bad";
        }*/ 
    }
}