<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Immeubles Controller
 *
 * @property \App\Model\Table\ImmeublesTable $Immeubles
 *
 * @method \App\Model\Entity\Immeuble[] paginate($object = null, array $settings = [])
 */
class ImmeublesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $immeubles = $this->paginate($this->Immeubles);

        $this->set(compact('immeubles'));
        $this->set('_serialize', ['immeubles']);
    }

    /**
     * View method
     *
     * @param string|null $id Immeuble id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $immeuble = $this->Immeubles->get($id, [
            'contain' => ['Employes']
        ]);

        $this->set('immeuble', $immeuble);
        $this->set('_serialize', ['immeuble']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $immeuble = $this->Immeubles->newEntity();
        if ($this->request->is('post')) {
            $immeuble = $this->Immeubles->patchEntity($immeuble, $this->request->getData());
            if ($this->Immeubles->save($immeuble)) {
                $this->Flash->success(__('The immeuble has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The immeuble could not be saved. Please, try again.'));
        }
        $this->set(compact('immeuble'));
        $this->set('_serialize', ['immeuble']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Immeuble id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $immeuble = $this->Immeubles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $immeuble = $this->Immeubles->patchEntity($immeuble, $this->request->getData());
            if ($this->Immeubles->save($immeuble)) {
                $this->Flash->success(__('The immeuble has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The immeuble could not be saved. Please, try again.'));
        }
        $this->set(compact('immeuble'));
        $this->set('_serialize', ['immeuble']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Immeuble id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $immeuble = $this->Immeubles->get($id);
        if ($this->Immeubles->delete($immeuble)) {
            $this->Flash->success(__('The immeuble has been deleted.'));
        } else {
            $this->Flash->error(__('The immeuble could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
