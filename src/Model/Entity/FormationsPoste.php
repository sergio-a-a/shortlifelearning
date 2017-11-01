<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FormationsPoste Entity
 *
 * @property int $poste_id
 * @property int $formation_id
 *
 * @property \App\Model\Entity\Poste $poste
 * @property \App\Model\Entity\Formation $formation
 */
class FormationsPoste extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'poste' => true,
        'formation' => true
    ];
}
