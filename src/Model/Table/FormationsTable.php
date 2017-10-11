<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formations Model
 *
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

        $this->hasMany('FormationsCompletees', [
            'foreignKey' => 'formation_id'
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
            ->scalar('Categorie')
            ->requirePresence('Categorie', 'create')
            ->notEmpty('Categorie');

        $validator
            ->scalar('Frequence')
            ->requirePresence('Frequence', 'create')
            ->notEmpty('Frequence');

        $validator
            ->scalar('Debut_rappel')
            ->requirePresence('Debut_rappel', 'create')
            ->notEmpty('Debut_rappel');

        $validator
            ->scalar('Modalite')
            ->requirePresence('Modalite', 'create')
            ->notEmpty('Modalite');

        $validator
            ->decimal('Duree')
            ->requirePresence('Duree', 'create')
            ->notEmpty('Duree');

        $validator
            ->scalar('Remarques')
            ->allowEmpty('Remarques');

        return $validator;
    }
}
