<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Piece Entity
 *
 * @property int $id
 * @property string $fichier
 * @property \Cake\I18n\FrozenTime $created
 * @property string $remarque
 *
 * @property \App\Model\Entity\EmployesFormation[] $employes_formations
 */
class Piece extends Entity
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
        'fichier' => true,
        'created' => true,
        'remarque' => true,
        'employes_formations' => true
    ];
}
