<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormationsPostes Model
 *
 * @property \App\Model\Table\PostesTable|\Cake\ORM\Association\BelongsTo $Postes
 * @property \App\Model\Table\FormationsTable|\Cake\ORM\Association\BelongsTo $Formations
 *
 * @method \App\Model\Entity\FormationsPoste get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormationsPoste newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormationsPoste[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPoste|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationsPoste patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPoste[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormationsPoste findOrCreate($search, callable $callback = null, $options = [])
 */
class FormationsPostesTable extends Table
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

        $this->setTable('formations_postes');
        $this->setDisplayField('poste_id');
        $this->setPrimaryKey(['poste_id', 'formation_id']);

        $this->belongsTo('Postes', [
            'foreignKey' => 'poste_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Formations', [
            'foreignKey' => 'formation_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Employes'); // for one to many association
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
        $rules->add($rules->existsIn(['poste_id'], 'Postes'));
        $rules->add($rules->existsIn(['formation_id'], 'Formations'));

        return $rules;
    }
}
