<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employes Model
 *
 * @property \App\Model\Table\CivilitesTable|\Cake\ORM\Association\BelongsTo $Civilites
 * @property \App\Model\Table\LanguesTable|\Cake\ORM\Association\BelongsTo $Langues
 * @property \App\Model\Table\ImmeublesTable|\Cake\ORM\Association\BelongsTo $Immeubles
 * @property \App\Model\Table\EmployesTable|\Cake\ORM\Association\BelongsTo $Employes
 * @property \App\Model\Table\PostesTable|\Cake\ORM\Association\BelongsTo $Postes
 * @property \App\Model\Table\EmployesTable|\Cake\ORM\Association\HasMany $Employes
 *
 * @method \App\Model\Entity\Employe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employe findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployesTable extends Table
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

        $this->setTable('employes');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->belongsTo('Civilites', [
            'foreignKey' => 'civilite_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Langues', [
            'foreignKey' => 'langue_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Immeubles', [
            'foreignKey' => 'immeuble_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Employesparent', [
            'className' => 'Employes',
            'foreignKey' => 'employe_id',
        ]);
        $this->belongsTo('Postes', [
            'foreignKey' => 'poste_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Employes', [
            'className' => 'Employes',
            'foreignKey' => 'employe_id'
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
            ->scalar('numero')
            ->requirePresence('numero', 'create')
            ->lengthBetween('numero', [1,10])
            ->notEmpty('numero');

        $validator
            ->scalar('nom')
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->scalar('prenom')
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom');

        $validator
            ->scalar('cellulaire')
            ->lengthBetween('cellulaire', [10,10])
            ->allowEmpty('cellulaire');

        $validator
            ->scalar('courriel')
            ->notEmpty('courriel');

        $validator
            ->boolean('actif')
            ->requirePresence('actif', 'create')
            ->notEmpty('actif');

        $validator
            ->date('date_envoi_plan_formation')
            ->allowEmpty('date_envoi_plan_formation');

        $validator
            ->scalar('informations_supplementaires')
            ->allowEmpty('informations_supplementaires');

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
        $rules->add($rules->existsIn(['civilite_id'], 'Civilites'));
        $rules->add($rules->existsIn(['poste_id'], 'Postes'));
        $rules->add($rules->existsIn(['immeuble_id'], 'Immeubles'));
        $rules->add($rules->existsIn(['langue_id'], 'Langues'));
        $rules->add($rules->existsIn(['employe_id'], 'Employes'));

        return $rules;
    }
}
