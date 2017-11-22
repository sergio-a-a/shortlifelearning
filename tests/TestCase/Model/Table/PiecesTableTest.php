<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PiecesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PiecesTable Test Case
 */
class PiecesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PiecesTable
     */
    public $Pieces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pieces',
        'app.employes_formations',
        'app.employes',
        'app.civilites',
        'app.langues',
        'app.immeubles',
        'app.postes',
        'app.formations',
        'app.formations_postes',
        'app.frequences',
        'app.debut_rappels',
        'app.modalites',
        'app.statuss',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pieces') ? [] : ['className' => PiecesTable::class];
        $this->Pieces = TableRegistry::get('Pieces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pieces);

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
}
