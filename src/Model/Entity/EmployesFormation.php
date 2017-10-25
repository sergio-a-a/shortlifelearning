<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmployesFormation Entity
 *
 * @property int $id
 * @property int $employe_id
 * @property int $formation_id
 * @property \Cake\I18n\FrozenTime $done
 *
 * @property \App\Model\Entity\Employe $employe
 * @property \App\Model\Entity\Formation $formation
 */
class EmployesFormation extends Entity
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
        'employe_id' => true,
        'formation_id' => true,
        'done' => true,
        'employe' => true,
        'formation' => true
    ];
}
