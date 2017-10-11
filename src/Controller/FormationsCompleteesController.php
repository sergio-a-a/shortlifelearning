<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormationsCompletees Controller
 *
 * @property \App\Model\Table\FormationsCompleteesTable $FormationsCompletees
 *
 * @method \App\Model\Entity\FormationsCompletee[] paginate($object = null, array $settings = [])
 */
class FormationsCompleteesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employes', 'Formations']
        ];
        $formationsCompletees = $this->paginate($this->FormationsCompletees);

        $this->set(compact('formationsCompletees'));
        $this->set('_serialize', ['formationsCompletees']);
    }

    /**
     * View method
     *
     * @param string|null $id Formations Completee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formationsCompletee = $this->FormationsCompletees->get($id, [
            'contain' => ['Employes', 'Formations']
        ]);

        $this->set('formationsCompletee', $formationsCompletee);
        $this->set('_serialize', ['formationsCompletee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formationsCompletee = $this->FormationsCompletees->newEntity();
        if ($this->request->is('post')) {
            $formationsCompletee = $this->FormationsCompletees->patchEntity($formationsCompletee, $this->request->getData());
            if ($this->FormationsCompletees->save($formationsCompletee)) {
                $this->Flash->success(__('The formations completee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations completee could not be saved. Please, try again.'));
        }
        $employes = $this->FormationsCompletees->Employes->find('list', ['limit' => 200]);
        $formations = $this->FormationsCompletees->Formations->find('list', ['limit' => 200]);
        $this->set(compact('formationsCompletee', 'employes', 'formations'));
        $this->set('_serialize', ['formationsCompletee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formations Completee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formationsCompletee = $this->FormationsCompletees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formationsCompletee = $this->FormationsCompletees->patchEntity($formationsCompletee, $this->request->getData());
            if ($this->FormationsCompletees->save($formationsCompletee)) {
                $this->Flash->success(__('The formations completee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations completee could not be saved. Please, try again.'));
        }
        $employes = $this->FormationsCompletees->Employes->find('list', ['limit' => 200]);
        $formations = $this->FormationsCompletees->Formations->find('list', ['limit' => 200]);
        $this->set(compact('formationsCompletee', 'employes', 'formations'));
        $this->set('_serialize', ['formationsCompletee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formations Completee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formationsCompletee = $this->FormationsCompletees->get($id);
        if ($this->FormationsCompletees->delete($formationsCompletee)) {
            $this->Flash->success(__('The formations completee has been deleted.'));
        } else {
            $this->Flash->error(__('The formations completee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
