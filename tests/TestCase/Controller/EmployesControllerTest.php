<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EmployesController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\EmployesController Test Case
 */
class EmployesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employes',
        'app.civilites',
        'app.langues',
        'app.immeubles',
        'app.postes',
        'app.formations',
        'app.categories',
        'app.frequences',
        'app.modalites',
        'app.statuss',
        'app.employes_formations'
    ];


    public function testUnauthenticatedFails()
    {
        // No session data set.
        $this->get('/employes');

        $this->assertRedirect('/users/login?redirect=%2Femployes');
    }
    
    public function testAuthenticated()
    {
        // Set session data
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'gogocharter',
                    'email' => 'Cooolnico@hotmail.com',
                    'role_id' => 1
                ]
            ]
        ]);
        $this->get('/employes');

        $this->assertResponseOk();
        // Other assertions.
    }
    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'gogocharter',
                    'email' => 'Cooolnico@hotmail.com',
                    'role_id' => 1
                ]
            ]
        ]);
        
        $data = [
            'id' => 5,
            'numero' => '1234567891',
            'nom' => 'Lorem222',
            'prenom' => 'Lorem',
            'civilite_id' => 1,
            'cellulaire' => '5129128932',
            'courriel' => 'sergio.b.arevalo@gmail.com',
            'langue_id' => 1,
            'immeuble_id' => 1,
            'employe_id' => 1,
            'poste_id' => 1,
            'actif' => 1,
            'date_envoi_plan_formation' => '2015-11-14',
            'informations_supplementaires' => 'Lorem ipsum dolor sit amet'
        ];
        
        $this->post('/employes/add', $data);

        $employes = TableRegistry::get('Employes');
        $query = $employes->find()->where(['nom' => $data['nom']]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        
        
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'gogocharter',
                    'email' => 'Cooolnico@hotmail.com',
                    'role_id' => 1
                ]
            ]
        ]);
        
        $data = [
            'id' => 1,
            'numero' => '1234567891',
            'nom' => 'Lorem222',
            'prenom' => 'Lorem',
            'civilite_id' => 1,
            'cellulaire' => '5129128932',
            'courriel' => 'sergio.b.arevalo@gmail.com',
            'langue_id' => 1,
            'immeuble_id' => 1,
            'employe_id' => 1,
            'poste_id' => 1,
            'actif' => 1,
            'date_envoi_plan_formation' => '2015-11-14',
            'informations_supplementaires' => 'Lorem ipsum dolor sit amet'
        ];
        
        
        //Edit
        $this->post('/employes/edit/1', $data);
        $employes = TableRegistry::get('Employes');
        $query = $employes->find()->where(['nom' => $data['nom']]);
        
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'gogocharter',
                    'email' => 'Cooolnico@hotmail.com',
                    'role_id' => 1
                ]
            ]
        ]);
        
        $employes = TableRegistry::get('Employes');
        $query2 = $employes->find()->all();
        $this->assertEquals(1, $query2->count());
        
        
        //Edit
        $this->delete('/employes/delete/1');
        $employes = TableRegistry::get('Employes');
        $query = $employes->find()->all();
        
        $this->assertEquals(0, $query->count());
    }
}
