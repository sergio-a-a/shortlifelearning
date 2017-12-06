<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FormationsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\FormationsController Test Case
 */
class FormationsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formations',
        'app.postes',
        'app.employes',
        'app.civilites',
        'app.langues',
        'app.immeubles',
        'app.employes_formations',
        'app.pieces',
        'app.formations_postes',
        'app.frequences',
        'app.debut_rappels',
        'app.modalites',
        'app.statuss',
        'app.categories'
    ];

    
    
    public function testUnauthenticatedFails()
    {
        // No session data set.
        $this->get('/formations');

        $this->assertRedirect('/users/login?redirect=%2Fformations');
    }
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
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
        $this->get('/formations');

        $this->assertResponseOk();
        // Other assertions.
    }
    
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
            'numero' => 'Lorem ipsum dolor sit amet',
            'Titre' => 'Lorem ipsum dolor sit amet',
            'poste_id' => 1,
            'frequence_id' => 1,
            'Debut_rappel_id' => 1,
            'modalite_id' => 1,
            'Duree' => 1.5,
            'Remarques' => 'Lorem ipsum dolor sit amet',
            'satus_id' => 1,
            'categorie_id' => 1
        ];
        
        $this->post('/formations/add', $data);

        $employes = TableRegistry::get('Formations');
        $query = $employes->find()->where(['Titre' => $data['Titre']]);
        $this->assertEquals(2, $query->count());
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
            'numero' => 'Lorem ipsum dolor sit amet',
            'Titre' => 'Testing',
            'poste_id' => 1,
            'frequence_id' => 1,
            'Debut_rappel_id' => 1,
            'modalite_id' => 1,
            'Duree' => 1.5,
            'Remarques' => 'Lorem ipsum dolor sit amet',
            'satus_id' => 1,
            'categorie_id' => 1
        ];
        
        
        
        $formations = TableRegistry::get('Formations');
        $query2 = $formations->find()->all();
        $this->assertEquals(1, $query2->count());
        
        //Edit
        $this->post('/formations/edit/2', $data);
        $formations = TableRegistry::get('Formations');
        $query = $formations->find()->where(['numero' => $data['numero']]);
        
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
        
        $formations = TableRegistry::get('Formations');
        $query2 = $formations->find()->all();
        $this->assertEquals(1, $query2->count());
        
        
        //Edit
        
        $formations = TableRegistry::get('Formations');
        $this->delete('/formations/delete/1');
        $query = $formations->find()->all();
        
        $this->assertEquals(0, $query->count());
    }
    
}
