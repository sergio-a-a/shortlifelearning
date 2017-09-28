<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Immeubles Model
 *
 * @property \App\Model\Table\EmployesTable|\Cake\ORM\Association\HasMany $Employes
 *
 * @method \App\Model\Entity\Immeuble get($primaryKey, $options = [])
 * @method \App\Model\Entity\Immeuble newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Immeuble[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Immeuble|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Immeuble patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Immeuble[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Immeuble findOrCreate($search, callable $callback = null, $options = [])
 */
class ImmeublesTable extends Table
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

        $this->setTable('immeubles');
        $this->setDisplayField('address');
        $this->setPrimaryKey('id');

        $this->hasMany('Employes', [
            'foreignKey' => 'immeuble_id'
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
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        return $validator;
    }
}
