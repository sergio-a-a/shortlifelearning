<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployesFormations Model
 *
 * @property \App\Model\Table\EmployesTable|\Cake\ORM\Association\BelongsTo $Employes
 * @property \App\Model\Table\FormationsTable|\Cake\ORM\Association\BelongsTo $Formations
 *
 * @method \App\Model\Entity\EmployesFormation get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmployesFormation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmployesFormation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployesFormation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployesFormation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmployesFormation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployesFormation findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployesFormationsTable extends Table
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

        $this->setTable('employes_formations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Employes', [
            'foreignKey' => 'employe_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Formations', [
            'foreignKey' => 'formation_id',
            'joinType' => 'INNER'
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
            ->dateTime('done')
            ->allowEmpty('done');
        

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['employe_id'], 'Employes'));
        $rules->add($rules->existsIn(['formation_id'], 'Formations'));

        return $rules;
    }
}
