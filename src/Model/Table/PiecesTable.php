<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pieces Model
 *
 * @property \App\Model\Table\EmployesFormationsTable|\Cake\ORM\Association\HasMany $EmployesFormations
 *
 * @method \App\Model\Entity\Piece get($primaryKey, $options = [])
 * @method \App\Model\Entity\Piece newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Piece[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Piece|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Piece patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Piece[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Piece findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PiecesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('pieces');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        
        $this->hasMany('EmployesFormations', [
            'foreignKey' => 'piece_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('fichier')
            ->requirePresence('fichier', 'create')
            ->notEmpty('fichier');

        $validator
            ->scalar('remarque')
            ->requirePresence('remarque', 'create')
            ->notEmpty('remarque');

        return $validator;
    }
}
