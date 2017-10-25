<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Statuss Controller
 *
 * @property \App\Model\Table\StatussTable $Statuss
 *
 * @method \App\Model\Entity\Status[] paginate($object = null, array $settings = [])
 */
class StatussController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $statuss = $this->paginate($this->Statuss);

        $this->set(compact('statuss'));
        $this->set('_serialize', ['statuss']);
    }

    /**
     * View method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $status = $this->Statuss->get($id, [
            'contain' => []
        ]);

        $this->set('status', $status);
        $this->set('_serialize', ['status']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $status = $this->Statuss->newEntity();
        if ($this->request->is('post')) {
            $status = $this->Statuss->patchEntity($status, $this->request->getData());
            if ($this->Statuss->save($status)) {
                $this->Flash->success(__('The status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The status could not be saved. Please, try again.'));
        }
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $status = $this->Statuss->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Statuss->patchEntity($status, $this->request->getData());
            if ($this->Statuss->save($status)) {
                $this->Flash->success(__('The status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The status could not be saved. Please, try again.'));
        }
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $status = $this->Statuss->get($id);
        if ($this->Statuss->delete($status)) {
            $this->Flash->success(__('The status has been deleted.'));
        } else {
            $this->Flash->error(__('The status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
