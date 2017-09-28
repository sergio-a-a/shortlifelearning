<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Civilites Controller
 *
 * @property \App\Model\Table\CivilitesTable $Civilites
 *
 * @method \App\Model\Entity\Civilite[] paginate($object = null, array $settings = [])
 */
class CivilitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $civilites = $this->paginate($this->Civilites);

        $this->set(compact('civilites'));
        $this->set('_serialize', ['civilites']);
    }

    /**
     * View method
     *
     * @param string|null $id Civilite id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $civilite = $this->Civilites->get($id, [
            'contain' => ['Employes']
        ]);

        $this->set('civilite', $civilite);
        $this->set('_serialize', ['civilite']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $civilite = $this->Civilites->newEntity();
        if ($this->request->is('post')) {
            $civilite = $this->Civilites->patchEntity($civilite, $this->request->getData());
            if ($this->Civilites->save($civilite)) {
                $this->Flash->success(__('The civilite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The civilite could not be saved. Please, try again.'));
        }
        $this->set(compact('civilite'));
        $this->set('_serialize', ['civilite']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Civilite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $civilite = $this->Civilites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $civilite = $this->Civilites->patchEntity($civilite, $this->request->getData());
            if ($this->Civilites->save($civilite)) {
                $this->Flash->success(__('The civilite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The civilite could not be saved. Please, try again.'));
        }
        $this->set(compact('civilite'));
        $this->set('_serialize', ['civilite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Civilite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $civilite = $this->Civilites->get($id);
        if ($this->Civilites->delete($civilite)) {
            $this->Flash->success(__('The civilite has been deleted.'));
        } else {
            $this->Flash->error(__('The civilite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
