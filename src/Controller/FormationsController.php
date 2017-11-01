<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formations Controller
 *
 * @property \App\Model\Table\FormationsTable $Formations
 *
 * @method \App\Model\Entity\Formation[] paginate($object = null, array $settings = [])
 */
class FormationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Frequences', 'DebutRappels', 'Modalites', 'Statuss']
        ];
        $formations = $this->paginate($this->Formations);
            
        
        
        
        $this->set(compact('formations'));
        $this->set('_serialize', ['formations']);
    }

    /**
     * View method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formation = $this->Formations->get($id, [
            'contain' => ['Frequences', 'DebutRappels', 'Modalites', 'Statuss', 'Employes', 'Postes']
        ]);

        $this->set('formation', $formation);
        $this->set('_serialize', ['formation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formation = $this->Formations->newEntity();
        if ($this->request->is('post')) {
            $formation = $this->Formations->patchEntity($formation, $this->request->getData());
            if ($this->Formations->save($formation)) {
                
                $this->loadModel();
                

                $query = $articles->query()
                    ->insert(['title', 'body', 'published'])
                    ->values($select)
                    ->execute();
                $this->Flash->success(__('The formation has been saved.'));

                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formation could not be saved. Please, try again.'));
        }
        $frequences = $this->Formations->Frequences->find('list', ['limit' => 200]);
        $debutRappels = $this->Formations->DebutRappels->find('list', ['limit' => 200]);
        $modalites = $this->Formations->Modalites->find('list', ['limit' => 200]);
        $statuss = $this->Formations->Statuss->find('list', ['limit' => 200]);
        $employes = $this->Formations->Employes->find('list', ['limit' => 200]);
        $postes = $this->Formations->Postes->find('list', ['limit' => 200]);
        $this->set(compact('formation', 'frequences', 'debutRappels', 'modalites', 'statuss', 'employes', 'postes'));
        $this->set('_serialize', ['formation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formation = $this->Formations->get($id, [
            'contain' => ['Employes', 'Postes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formation = $this->Formations->patchEntity($formation, $this->request->getData());
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formation could not be saved. Please, try again.'));
        }
        $frequences = $this->Formations->Frequences->find('list', ['limit' => 200]);
        $debutRappels = $this->Formations->DebutRappels->find('list', ['limit' => 200]);
        $modalites = $this->Formations->Modalites->find('list', ['limit' => 200]);
        $statuss = $this->Formations->Statuss->find('list', ['limit' => 200]);
        $employes = $this->Formations->Employes->find('list', ['limit' => 200]);
        $postes = $this->Formations->Postes->find('list', ['limit' => 200]);
        $this->set(compact('formation', 'frequences', 'debutRappels', 'modalites', 'statuss', 'employes', 'postes'));
        $this->set('_serialize', ['formation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formation = $this->Formations->get($id);
        if ($this->Formations->delete($formation)) {
            $this->Flash->success(__('The formation has been deleted.'));
        } else {
            $this->Flash->error(__('The formation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
