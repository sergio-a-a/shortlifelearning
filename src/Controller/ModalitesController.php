<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modalites Controller
 *
 * @property \App\Model\Table\ModalitesTable $Modalites
 *
 * @method \App\Model\Entity\Modalite[] paginate($object = null, array $settings = [])
 */
class ModalitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $modalites = $this->paginate($this->Modalites);

        $this->set(compact('modalites'));
        $this->set('_serialize', ['modalites']);
    }

    /**
     * View method
     *
     * @param string|null $id Modalite id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modalite = $this->Modalites->get($id, [
            'contain' => ['Formations']
        ]);

        $this->set('modalite', $modalite);
        $this->set('_serialize', ['modalite']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modalite = $this->Modalites->newEntity();
        if ($this->request->is('post')) {
            $modalite = $this->Modalites->patchEntity($modalite, $this->request->getData());
            if ($this->Modalites->save($modalite)) {
                $this->Flash->success(__('The modalite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modalite could not be saved. Please, try again.'));
        }
        $this->set(compact('modalite'));
        $this->set('_serialize', ['modalite']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modalite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modalite = $this->Modalites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modalite = $this->Modalites->patchEntity($modalite, $this->request->getData());
            if ($this->Modalites->save($modalite)) {
                $this->Flash->success(__('The modalite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modalite could not be saved. Please, try again.'));
        }
        $this->set(compact('modalite'));
        $this->set('_serialize', ['modalite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modalite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modalite = $this->Modalites->get($id);
        if ($this->Modalites->delete($modalite)) {
            $this->Flash->success(__('The modalite has been deleted.'));
        } else {
            $this->Flash->error(__('The modalite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
