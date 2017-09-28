<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Civilites Model
 *
 * @property \App\Model\Table\EmployesTable|\Cake\ORM\Association\HasMany $Employes
 *
 * @method \App\Model\Entity\Civilite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Civilite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Civilite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Civilite|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Civilite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Civilite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Civilite findOrCreate($search, callable $callback = null, $options = [])
 */
class CivilitesTable extends Table
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

        $this->setTable('civilites');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->hasMany('Employes', [
            'foreignKey' => 'civilite_id'
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
