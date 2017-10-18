<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe $employe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employe'), ['action' => 'edit', $employe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employe'), ['action' => 'delete', $employe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employes view large-9 medium-8 columns content">
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
            <td><?= $employe->has('civilite') ? $this->Html->link($employe->civilite->nom, ['controller' => 'Civilites', 'action' => 'view', $employe->civilite->id]) : '' ?></td>
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
            <td><?= $employe->has('langue') ? $this->Html->link($employe->langue->nom, ['controller' => 'Langues', 'action' => 'view', $employe->langue->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Immeuble') ?></th>
            <td><?= $employe->has('immeuble') ? $this->Html->link($employe->immeuble->address, ['controller' => 'Immeubles', 'action' => 'view', $employe->immeuble->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Poste') ?></th>
            <td><?= $employe->has('poste') ? $this->Html->link($employe->poste->titre, ['controller' => 'Postes', 'action' => 'view', $employe->poste->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Informations Supplementaires') ?></th>
            <td><?= h($employe->informations_supplementaires) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom du superviseur') ?></th>
            <td><?= $employe->has('employesparent') ? $this->Html->link($employe->employesparent->nom, ['controller' => 'Employes', 'action' => 'view', $employe->employesparent->id]) : '' ?></td>
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
        <h4><?= __('Related Employes') ?></h4>
        <?php if (!empty($employe->employesparent)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Prenom') ?></th>
                <th scope="col"><?= __('Civilite Id') ?></th>
                <th scope="col"><?= __('Cellulaire') ?></th>
                <th scope="col"><?= __('Courriel') ?></th>
                <th scope="col"><?= __('Langue Id') ?></th>
                <th scope="col"><?= __('Immeuble Id') ?></th>
                <th scope="col"><?= __('Employe Id') ?></th>
                <th scope="col"><?= __('Poste Id') ?></th>
                <th scope="col"><?= __('Actif') ?></th>
                <th scope="col"><?= __('Date Envoi Plan Formation') ?></th>
                <th scope="col"><?= __('Informations Supplementaires') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employe->employesparent as $employes): ?>
            <tr>
                <td><?= h($employes->numero) ?></td>
                <td><?= h($employes->nom) ?></td>
                <td><?= h($employes->prenom) ?></td>
                <td><?= h($employes->civilite_id) ?></td>
                <td><?= h($employes->cellulaire) ?></td>
                <td><?= h($employes->courriel) ?></td>
                <td><?= h($employes->langue_id) ?></td>
                <td><?= h($employes->immeuble_id) ?></td>
                <td><?= h($employes->employe_id) ?></td>
                <td><?= h($employes->poste_id) ?></td>
                <td><?= h($employes->actif) ?></td>
                <td><?= h($employes->date_envoi_plan_formation) ?></td>
                <td><?= h($employes->informations_supplementaires) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employes', 'action' => 'view', $employes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employes', 'action' => 'edit', $employes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employes', 'action' => 'delete', $employes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
