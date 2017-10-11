<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormationsCompletees Model
 *
 * @property \App\Model\Table\EmployesTable|\Cake\ORM\Association\BelongsTo $Employes
 * @property \App\Model\Table\FormationsTable|\Cake\ORM\Association\BelongsTo $Formations
 *
 * @method \App\Model\Entity\FormationsCompletee get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormationsCompletee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormationsCompletee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormationsCompletee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationsCompletee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsCompletee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsCompletee findOrCreate($search, callable $callback = null, $options = [])
 */
class FormationsCompleteesTable extends Table
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

        $this->setTable('formations_completees');
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
            ->dateTime('date')
            ->allowEmpty('date');

        $validator
            ->scalar('Remarque')
            ->allowEmpty('Remarque');

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
