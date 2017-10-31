<?php
namespace App\Controller;


use App\Controller\AppController;

use Cake\Mailer\Email;
use Cake\I18n\Time;

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
            'contain' => [
                'Civilites', 
                'Langues', 
                'Immeubles', 
                'Postes', 
                'Formations' => ['Categories', 'Frequences', 'DebutRappels', 'Modalites', 'Statuss'], 
                'Superviseurs']
        ]);
        
        $this->set('employe', $employe);
        $this->set('_serialize', 'employe');
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

    public function cakePdfDownload($id = null)
    {
        $id = $this->request->query['id'];
        
        $employe = $this->Employes->get($id, [
            'contain' => [
                'Civilites', 
                'Langues', 
                'Immeubles', 
                'Postes', 
                'Formations' => ['Categories', 'Frequences', 'DebutRappels', 'Modalites', 'Statuss'], 
                'Superviseurs']
        ]);
        
        $this->set('employe', $employe);
        
        // Creation du pdf dans src/template/files, nommé output.pdf
        $CakePdf = new \CakePdf\Pdf\CakePdf();
        $CakePdf->template("cake_pdf_download", "default");
        $CakePdf->viewVars($this->viewVars);
        $pdf = $CakePdf->write(APP . 'Files' . DS . 'Output.pdf');
        
        
        //obtient le courriel de l'employe
        $to = $employe->courriel;

        // Met la date l'envoi de la formation dans le button "Envoi formation" est cliquer
        $time = Time::now();
        $employe->date_envoi_plan_formation = $time;
                
        $this->Employes->save($employe);
        
        // Envoye le pdf 
//        $email = new Email('default');
//        $email
//             ->attachments(APP . 'Files' . DS . 'Output.pdf')
//             ->transport('gmail')
//             ->from(['cooolnico@gmail.com' => 'cooolnico@gmail.com'])
//             ->to($to)
//             ->subject("plan de formation")
//             ->emailFormat('html')
//             ->send("Voici votre plan de formation en piece jointe");
        
        return $this->redirect(['action' => 'index']);
        

    }
    
    
}
