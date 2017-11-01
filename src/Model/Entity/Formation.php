<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Formation Entity
 *
 * @property int $id
 * @property string $numero
 * @property string $Titre
 * @property int $poste_id
 * @property int $frequence_id
 * @property int $Debut_rappel_id
 * @property int $modalite_id
 * @property float $Duree
 * @property string $Remarques
 * @property int $satus_id
 * @property int $categorie_id
 *
 * @property \App\Model\Entity\Frequence $frequence
 * @property \App\Model\Entity\DebutRappel $debut_rappel
 * @property \App\Model\Entity\Modalite $modalite
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Employe[] $employes
 * @property \App\Model\Entity\Poste[] $postes
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
        'numero' => true,
        'Titre' => true,
        'poste_id' => true,
        'frequence_id' => true,
        'Debut_rappel_id' => true,
        'modalite_id' => true,
        'Duree' => true,
        'Remarques' => true,
        'satus_id' => true,
        'categorie_id' => true,
        'frequence' => true,
        'debut_rappel' => true,
        'modalite' => true,
        'status' => true,
        'employes' => true,
        'postes' => true
    ];
}
