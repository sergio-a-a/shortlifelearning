<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Formation Entity
 *
 * @property int $id
 * @property string $numero
 * @property string $Titre
 * @property string $Categorie
 * @property string $Frequence
 * @property string $Debut_rappel
 * @property string $Modalite
 * @property float $Duree
 * @property string $Remarques
 *
 * @property \App\Model\Entity\FormationsCompletee[] $formations_completees
 */
class Formation extends Entity
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
        '*' => true,
        'id' => false
    ];
}
