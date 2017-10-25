<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployesFormationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployesFormationsTable Test Case
 */
class EmployesFormationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployesFormationsTable
     */
    public $EmployesFormations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employes_formations',
        'app.employes',
        'app.civilites',
        'app.langues',
        'app.immeubles',
        'app.postes',
        'app.formations',
        'app.categories',
        'app.frequences',
        'app.debut_rappels',
        'app.modalites',
        'app.statuss'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmployesFormations') ? [] : ['className' => EmployesFormationsTable::class];
        $this->EmployesFormations = TableRegistry::get('EmployesFormations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmployesFormations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
