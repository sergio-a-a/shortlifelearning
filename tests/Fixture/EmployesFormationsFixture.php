<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployesFormationsFixture
 *
 */
class EmployesFormationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'employe_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'formation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'done' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Remarque' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'piece_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'employes_formations_ibfk_1' => ['type' => 'index', 'columns' => ['employe_id'], 'length' => []],
            'employes_formations_ibfk_2' => ['type' => 'index', 'columns' => ['formation_id'], 'length' => []],
            'piece_id' => ['type' => 'index', 'columns' => ['piece_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'employes_formations_ibfk_1' => ['type' => 'foreign', 'columns' => ['employe_id'], 'references' => ['employes', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'employes_formations_ibfk_2' => ['type' => 'foreign', 'columns' => ['formation_id'], 'references' => ['formations', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'employes_formations_ibfk_3' => ['type' => 'foreign', 'columns' => ['piece_id'], 'references' => ['pieces', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
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
            'id' => 1,
            'employe_id' => 1,
            'formation_id' => 1,
            'done' => '2017-11-22 20:36:34',
            'Remarque' => 'Lorem ipsum dolor sit amet',
            'piece_id' => 1
        ],
    ];
}
