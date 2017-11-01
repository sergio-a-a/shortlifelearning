<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FormationsPostesFixture
 *
 */
class FormationsPostesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'poste_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'formation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'formation_id' => ['type' => 'index', 'columns' => ['formation_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['poste_id', 'formation_id'], 'length' => []],
            'formations_postes_ibfk_1' => ['type' => 'foreign', 'columns' => ['poste_id'], 'references' => ['postes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'formations_postes_ibfk_2' => ['type' => 'foreign', 'columns' => ['formation_id'], 'references' => ['formations', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'poste_id' => 1,
            'formation_id' => 1
        ],
    ];
}
