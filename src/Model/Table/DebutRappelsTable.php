<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DebutRappels Model
 *
 * @method \App\Model\Entity\DebutRappel get($primaryKey, $options = [])
 * @method \App\Model\Entity\DebutRappel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DebutRappel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DebutRappel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DebutRappel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DebutRappel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DebutRappel findOrCreate($search, callable $callback = null, $options = [])
 */
class DebutRappelsTable extends Table
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

        $this->setTable('debut_rappels');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');
        
        $this->hasMany('Formations', [
            'foreignKey' => 'frequence_id'
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
            ->scalar('nom')
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        return $validator;
    }
}
