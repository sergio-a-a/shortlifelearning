<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Postes Controller
 *
 * @property \App\Model\Table\PostesTable $Postes
 *
 * @method \App\Model\Entity\Poste[] paginate($object = null, array $settings = [])
 */
class PostesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $postes = $this->paginate($this->Postes);

        $this->set(compact('postes'));
        $this->set('_serialize', ['postes']);
    }

    /**
     * View method
     *
     * @param string|null $id Poste id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $poste = $this->Postes->get($id, [
            'contain' => ['Formations', 'Employes']
        ]);

        $this->set('poste', $poste);
        $this->set('_serialize', ['poste']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $poste = $this->Postes->newEntity();
        if ($this->request->is('post')) {
            $poste = $this->Postes->patchEntity($poste, $this->request->getData());
            if ($this->Postes->save($poste)) {
                $this->Flash->success(__('The poste has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poste could not be saved. Please, try again.'));
        }
        $formations = $this->Postes->Formations->find('list', ['limit' => 200]);
        $this->set(compact('poste', 'formations'));
        $this->set('_serialize', ['poste']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Poste id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $poste = $this->Postes->get($id, [
            'contain' => ['Formations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poste = $this->Postes->patchEntity($poste, $this->request->getData());
            if ($this->Postes->save($poste)) {
                $this->Flash->success(__('The poste has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poste could not be saved. Please, try again.'));
        }
        $formations = $this->Postes->Formations->find('list', ['limit' => 200]);
        $this->set(compact('poste', 'formations'));
        $this->set('_serialize', ['poste']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Poste id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $poste = $this->Postes->get($id);
        if ($this->Postes->delete($poste)) {
            $this->Flash->success(__('The poste has been deleted.'));
        } else {
            $this->Flash->error(__('The poste could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
