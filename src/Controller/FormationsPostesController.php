<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormationsPostes Controller
 *
 * @property \App\Model\Table\FormationsPostesTable $FormationsPostes
 *
 * @method \App\Model\Entity\FormationsPoste[] paginate($object = null, array $settings = [])
 */
class FormationsPostesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Postes', 'Formations']
        ];
        $formationsPostes = $this->paginate($this->FormationsPostes);

        $this->set(compact('formationsPostes'));
        $this->set('_serialize', ['formationsPostes']);
    }

    /**
     * View method
     *
     * @param string|null $id Formations Poste id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formationsPoste = $this->FormationsPostes->get($id, [
            'contain' => ['Postes', 'Formations']
        ]);

        $this->set('formationsPoste', $formationsPoste);
        $this->set('_serialize', ['formationsPoste']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formationsPoste = $this->FormationsPostes->newEntity();
        if ($this->request->is('post')) {
            $formationsPoste = $this->FormationsPostes->patchEntity($formationsPoste, $this->request->getData());
            if ($this->FormationsPostes->save($formationsPoste)) {
                $this->Flash->success(__('The formations poste has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations poste could not be saved. Please, try again.'));
        }
        $postes = $this->FormationsPostes->Postes->find('list', ['limit' => 200]);
        $formations = $this->FormationsPostes->Formations->find('list', ['limit' => 200]);
        $this->set(compact('formationsPoste', 'postes', 'formations'));
        $this->set('_serialize', ['formationsPoste']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formations Poste id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formationsPoste = $this->FormationsPostes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formationsPoste = $this->FormationsPostes->patchEntity($formationsPoste, $this->request->getData());
            if ($this->FormationsPostes->save($formationsPoste)) {
                $this->Flash->success(__('The formations poste has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations poste could not be saved. Please, try again.'));
        }
        $postes = $this->FormationsPostes->Postes->find('list', ['limit' => 200]);
        $formations = $this->FormationsPostes->Formations->find('list', ['limit' => 200]);
        $this->set(compact('formationsPoste', 'postes', 'formations'));
        $this->set('_serialize', ['formationsPoste']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formations Poste id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formationsPoste = $this->FormationsPostes->get($id);
        if ($this->FormationsPostes->delete($formationsPoste)) {
            $this->Flash->success(__('The formations poste has been deleted.'));
        } else {
            $this->Flash->error(__('The formations poste could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
