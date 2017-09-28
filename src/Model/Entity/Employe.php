<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employe Entity
 *
 * @property int $id
 * @property string $numero
 * @property string $nom
 * @property string $prenom
 * @property int $civilite_id
 * @property string $cellulaire
 * @property string $courriel
 * @property int $langue_id
 * @property int $immeuble_id
 * @property int $employe_id
 * @property int $poste_id
 * @property bool $actif
 * @property \Cake\I18n\FrozenDate $date_envoi_plan_formation
 * @property string $informations_supplementaires
 *
 * @property \App\Model\Entity\Civilite $civilite
 * @property \App\Model\Entity\Langue $langue
 * @property \App\Model\Entity\Immeuble $immeuble
 * @property \App\Model\Entity\Employe[] $employes
 * @property \App\Model\Entity\Poste $poste
 */
class Employe extends Entity
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
        'nom' => true,
        'prenom' => true,
        'civilite_id' => true,
        'cellulaire' => true,
        'courriel' => true,
        'langue_id' => true,
        'immeuble_id' => true,
        'employe_id' => true,
        'poste_id' => true,
        'actif' => true,
        'date_envoi_plan_formation' => true,
        'informations_supplementaires' => true,
        'civilite' => true,
        'langue' => true,
        'immeuble' => true,
        'employes' => true,
        'poste' => true
    ];
}
