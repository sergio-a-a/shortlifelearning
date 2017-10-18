<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DebutRappels Controller
 *
 * @property \App\Model\Table\DebutRappelsTable $DebutRappels
 *
 * @method \App\Model\Entity\DebutRappel[] paginate($object = null, array $settings = [])
 */
class DebutRappelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $debutRappels = $this->paginate($this->DebutRappels);

        $this->set(compact('debutRappels'));
        $this->set('_serialize', ['debutRappels']);
    }

    /**
     * View method
     *
     * @param string|null $id Debut Rappel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $debutRappel = $this->DebutRappels->get($id, [
            'contain' => []
        ]);

        $this->set('debutRappel', $debutRappel);
        $this->set('_serialize', ['debutRappel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $debutRappel = $this->DebutRappels->newEntity();
        if ($this->request->is('post')) {
            $debutRappel = $this->DebutRappels->patchEntity($debutRappel, $this->request->getData());
            if ($this->DebutRappels->save($debutRappel)) {
                $this->Flash->success(__('The debut rappel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The debut rappel could not be saved. Please, try again.'));
        }
        $this->set(compact('debutRappel'));
        $this->set('_serialize', ['debutRappel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Debut Rappel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $debutRappel = $this->DebutRappels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $debutRappel = $this->DebutRappels->patchEntity($debutRappel, $this->request->getData());
            if ($this->DebutRappels->save($debutRappel)) {
                $this->Flash->success(__('The debut rappel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The debut rappel could not be saved. Please, try again.'));
        }
        $this->set(compact('debutRappel'));
        $this->set('_serialize', ['debutRappel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Debut Rappel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $debutRappel = $this->DebutRappels->get($id);
        if ($this->DebutRappels->delete($debutRappel)) {
            $this->Flash->success(__('The debut rappel has been deleted.'));
        } else {
            $this->Flash->error(__('The debut rappel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
