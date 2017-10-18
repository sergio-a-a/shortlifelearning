<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Frequences Controller
 *
 * @property \App\Model\Table\FrequencesTable $Frequences
 *
 * @method \App\Model\Entity\Frequence[] paginate($object = null, array $settings = [])
 */
class FrequencesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $frequences = $this->paginate($this->Frequences);

        $this->set(compact('frequences'));
        $this->set('_serialize', ['frequences']);
    }

    /**
     * View method
     *
     * @param string|null $id Frequence id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frequence = $this->Frequences->get($id, [
            'contain' => []
        ]);

        $this->set('frequence', $frequence);
        $this->set('_serialize', ['frequence']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $frequence = $this->Frequences->newEntity();
        if ($this->request->is('post')) {
            $frequence = $this->Frequences->patchEntity($frequence, $this->request->getData());
            if ($this->Frequences->save($frequence)) {
                $this->Flash->success(__('The frequence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frequence could not be saved. Please, try again.'));
        }
        $this->set(compact('frequence'));
        $this->set('_serialize', ['frequence']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Frequence id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frequence = $this->Frequences->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frequence = $this->Frequences->patchEntity($frequence, $this->request->getData());
            if ($this->Frequences->save($frequence)) {
                $this->Flash->success(__('The frequence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frequence could not be saved. Please, try again.'));
        }
        $this->set(compact('frequence'));
        $this->set('_serialize', ['frequence']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Frequence id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frequence = $this->Frequences->get($id);
        if ($this->Frequences->delete($frequence)) {
            $this->Flash->success(__('The frequence has been deleted.'));
        } else {
            $this->Flash->error(__('The frequence could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
