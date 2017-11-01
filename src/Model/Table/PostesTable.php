<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Postes Model
 *
 * @property \App\Model\Table\EmployesTable|\Cake\ORM\Association\HasMany $Employes
 * @property |\Cake\ORM\Association\BelongsToMany $Formations
 *
 * @method \App\Model\Entity\Poste get($primaryKey, $options = [])
 * @method \App\Model\Entity\Poste newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Poste[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Poste|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Poste patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Poste[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Poste findOrCreate($search, callable $callback = null, $options = [])
 */
class PostesTable extends Table
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

        $this->setTable('postes');
        $this->setDisplayField('titre');
        $this->setPrimaryKey('id');

        $this->hasMany('Employes', [
            'foreignKey' => 'poste_id'
        ]);
        $this->belongsToMany('Formations', [
            'foreignKey' => 'poste_id',
            'targetForeignKey' => 'formation_id',
            'joinTable' => 'formations_postes'
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
            ->scalar('titre')
            ->requirePresence('titre', 'create')
            ->notEmpty('titre');

        return $validator;
    }
}
