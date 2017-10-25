<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formations Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\FrequencesTable|\Cake\ORM\Association\BelongsTo $Frequences
 * @property \App\Model\Table\DebutRappelsTable|\Cake\ORM\Association\BelongsTo $DebutRappels
 * @property |\Cake\ORM\Association\BelongsTo $Modalites
 * @property \App\Model\Table\FormationsCompleteesTable|\Cake\ORM\Association\HasMany $FormationsCompletees
 *
 * @method \App\Model\Entity\Formation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Formation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Formation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Formation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Formation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Formation findOrCreate($search, callable $callback = null, $options = [])
 */
class FormationsTable extends Table
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

        $this->setTable('formations');
        $this->setDisplayField('Titre');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'categorie_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Frequences', [
            'foreignKey' => 'frequence_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('DebutRappels', [
            'foreignKey' => 'Debut_rappel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Modalites', [
            'foreignKey' => 'modalite_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('FormationsCompletees', [
            'foreignKey' => 'formation_id'
        ]);
        
        $this->belongsToMany('Employes', [
            'through' => 'FormationsCompletees'
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
            ->notEmpty('numero');

        $validator
            ->scalar('Titre')
            ->requirePresence('Titre', 'create')
            ->notEmpty('Titre');

        $validator
            ->decimal('Duree')
            ->requirePresence('Duree', 'create')
            ->notEmpty('Duree');

        $validator
            ->scalar('Remarques')
            ->allowEmpty('Remarques');

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
        $rules->add($rules->existsIn(['categorie_id'], 'Categories'));
        $rules->add($rules->existsIn(['frequence_id'], 'Frequences'));
        $rules->add($rules->existsIn(['Debut_rappel_id'], 'DebutRappels'));
        $rules->add($rules->existsIn(['modalite_id'], 'Modalites'));

        return $rules;
    }
}
