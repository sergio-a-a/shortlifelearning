<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employes Controller
 *
 * @property \App\Model\Table\EmployesTable $Employes
 *
 * @method \App\Model\Entity\Employe[] paginate($object = null, array $settings = [])
 */
class EmployesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Civilites', 'Langues', 'Immeubles', 'Postes', 'Employesparent']
        ];
        $employes = $this->paginate($this->Employes);

        $this->set(compact('employes'));
        $this->set('_serialize', ['employes']);
    }

    /**
     * View method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employe = $this->Employes->get($id, [
            'contain' => ['Civilites', 'Langues', 'Immeubles', 'Postes', 'Employesparent']
        ]);

        $this->set('employe', $employe);
        $this->set('_serialize', ['employe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employe = $this->Employes->newEntity();
        if ($this->request->is('post')) {
            $employe = $this->Employes->patchEntity($employe, $this->request->getData());
            $employe->nom = ucfirst($employe->nom);
            $employe->prenom = ucfirst($employe->prenom);
            $employe->numero = mb_strtoupper($employe->numero);
            $employe->courriel = mb_strtolower($employe->courriel);
            $employe->informations_supplementaires = ucfirst($employe->informations_supplementaire);
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $employes = $this->Employes->find('list', ['limit' => 200]);
        $civilites = $this->Employes->Civilites->find('list', ['limit' => 200]);
        $langues = $this->Employes->Langues->find('list', ['limit' => 200]);
        $immeubles = $this->Employes->Immeubles->find('list', ['limit' => 200]);
        $postes = $this->Employes->Postes->find('list', ['limit' => 200]);
        $this->set(compact('employe', 'civilites', 'langues', 'immeubles', 'postes', 'employes'));
        $this->set('_serialize', ['employe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employe = $this->Employes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employe = $this->Employes->patchEntity($employe, $this->request->getData());
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $employes = $this->Employes->find('list', ['limit' => 200]);
        $civilites = $this->Employes->Civilites->find('list', ['limit' => 200]);
        $langues = $this->Employes->Langues->find('list', ['limit' => 200]);
        $immeubles = $this->Employes->Immeubles->find('list', ['limit' => 200]);
        $postes = $this->Employes->Postes->find('list', ['limit' => 200]);
        $this->set(compact('employe', 'civilites', 'langues', 'immeubles', 'postes', 'employes'));
        $this->set('_serialize', ['employe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employe = $this->Employes->get($id);
        if ($this->Employes->delete($employe)) {
            $this->Flash->success(__('The employe has been deleted.'));
        } else {
            $this->Flash->error(__('The employe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
