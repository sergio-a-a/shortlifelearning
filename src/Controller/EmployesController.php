<?php
namespace App\Controller;

use Cake\Core\Configure;
use App\Controller\AppController;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

// reference the Dompdf namespace
use Dompdf\Dompdf;
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
            'contain' => ['Civilites', 'Langues', 'Immeubles', 'Postes', 'Superviseurs']
        ];
        
        if (!empty($this->request->data['search'])) {
            $employes = $this->paginate($this->Employes->find()->where(["OR" => [
                "Employes.nom LIKE" => $this->request->data['search'],
                "Employes.prenom LIKE" => $this->request->data['search'],
                "Employes.numero LIKE" => $this->request->data['search']
                    ]]));
        }else{
            $employes = $this->paginate($this->Employes);
        }
        
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
            'contain' => ['Civilites', 'Langues', 'Immeubles', 'Postes', 'Formations', 'Superviseurs']
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
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $civilites = $this->Employes->Civilites->find('list', ['limit' => 200]);
        $langues = $this->Employes->Langues->find('list', ['limit' => 200]);
        $superviseurs = $this->Employes->Superviseurs->find('list', ['limit' => 200]);
        $immeubles = $this->Employes->Immeubles->find('list', ['limit' => 200]);
        $postes = $this->Employes->Postes->find('list', ['limit' => 200]);
        $formations = $this->Employes->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employe', 'civilites', 'langues', 'immeubles', 'postes', 'formations', 'superviseurs'));
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
            'contain' => ['Formations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employe = $this->Employes->patchEntity($employe, $this->request->getData());
            if ($this->Employes->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $civilites = $this->Employes->Civilites->find('list', ['limit' => 200]);
        $superviseurs = $this->Employes->Superviseurs->find('list', ['limit' => 200]);
        $langues = $this->Employes->Langues->find('list', ['limit' => 200]);
        $immeubles = $this->Employes->Immeubles->find('list', ['limit' => 200]);
        $postes = $this->Employes->Postes->find('list', ['limit' => 200]);
        $formations = $this->Employes->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employe', 'civilites', 'langues', 'immeubles', 'postes', 'formations', 'superviseurs'));
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
    public function topdf($id = null){
        
        $employe = $this->Employe->get($id);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'filename' => 'Employe_' . $id
                ]
            ]);
        $this->set('employe', $employe);
        $CakePdf = new \CakePdf\Pdf\CakePdf();
        $CakePdf->template('newsletter', 'default');
        $CakePdf->viewVars($this->viewVars);
        // Get the PDF string returned
        $pdf = $CakePdf->output();
        // Or write it to file directly
        $pdf = $CakePdf->write(APP . 'files' . DS . 'newsletter.pdf');
        
//        // instantiate and use the dompdf class
//        $dompdf = new Dompdf();
//        
//        $this->autoRender = false;
//        $dompdf->loadHtml($this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']));
//
//        // (Optional) Setup the paper size and orientation
//        $dompdf->setPaper('A4', 'landscape');
//
//        // Render the HTML as PDF
//        $dompdf->render();
//
//        // Output the generated PDF to Browser
//        $dompdf->stream();
    }
    public function cakePdfDownload($id = null)
    {
        $id = $this->request->query['id'];
        $employe = $this->Employes->get($id, [
            'contain' => ['Civilites', 'Langues', 'Immeubles', 'Postes', 'Formations', 'Superviseurs']
        ]);
        $this->set('employe', $employe);
        
        $CakePdf = new \CakePdf\Pdf\CakePdf();
        $CakePdf->template("cake_pdf_download", "default");

        $CakePdf->viewVars($this->viewVars);
        $pdf = $CakePdf->write(APP . 'Files' . DS . 'Output.pdf');
        //echo $pdf;die();
//        
        return $this->redirect(['action' => 'index']);
        

    }
    
    
}
