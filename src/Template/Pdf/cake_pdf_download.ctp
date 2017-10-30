<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe $employe
 */
?>
<div class="employes view content">
    <h3><?= h($employe->nom) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= h($employe->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($employe->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($employe->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Civilite') ?></th>
            <td><?= $employe->has('civilite') ? h($employe->civilite->nom) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cellulaire') ?></th>
            <td><?= h($employe->cellulaire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Courriel') ?></th>
            <td><?= h($employe->courriel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Langue') ?></th>
            <td><?= $employe->has('langue') ? h($employe->langue->nom) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Immeuble') ?></th>
            <td><?= $employe->has('immeuble') ? h($employe->immeuble->address) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Poste') ?></th>
            <td><?= $employe->has('poste') ? h($employe->poste->titre) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Informations Supplementaires') ?></th>
            <td><?= h($employe->informations_supplementaires) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Superviseur') ?></th>
            <td><?= $employe->has('superviseur') ? h($employe->superviseur->nom) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Envoi Plan Formation') ?></th>
            <td><?= h($employe->date_envoi_plan_formation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= $employe->actif ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($employe->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Categorie Id') ?></th>
                <th scope="col"><?= __('Frequence Id') ?></th>
                <th scope="col"><?= __('Debut Rappel Id') ?></th>
                <th scope="col"><?= __('Modalite Id') ?></th>
                <th scope="col"><?= __('Duree') ?></th>
                <th scope="col"><?= __('Remarques') ?></th>
                <th scope="col"><?= __('Satus Id') ?></th>
            </tr>
            <?php foreach ($employe->formations as $formations): ?>
            <tr>
                <td><?= h($formations->numero) ?></td>
                <td><?= h($formations->Titre) ?></td>
                <td><?= h($formations->categorie_id, ['label' => 'Categorie']) ?></td>
                <td><?= h($formations->frequence_id) ?></td>
                <td><?= h($formations->Debut_rappel_id) ?></td>
                <td><?= h($formations->modalite_id) ?></td>
                <td><?= h($formations->Duree) ?></td>
                <td><?= h($formations->Remarques) ?></td>
                <td><?= h($formations->satus_id) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
