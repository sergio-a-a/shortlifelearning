<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormationsPostesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormationsPostesTable Test Case
 */
class FormationsPostesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormationsPostesTable
     */
    public $FormationsPostes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formations_postes',
        'app.postes',
        'app.employes',
        'app.civilites',
        'app.langues',
        'app.immeubles',
        'app.formations',
        'app.frequences',
        'app.debut_rappels',
        'app.modalites',
        'app.statuss',
        'app.employes_formations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FormationsPostes') ? [] : ['className' => FormationsPostesTable::class];
        $this->FormationsPostes = TableRegistry::get('FormationsPostes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormationsPostes);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
