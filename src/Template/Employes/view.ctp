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
        <li><?= $this->Html->link(__('List Civilites'), ['controller' => 'Civilites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Civilite'), ['controller' => 'Civilites', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Langues'), ['controller' => 'Langues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Langue'), ['controller' => 'Langues', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Immeubles'), ['controller' => 'Immeubles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Immeuble'), ['controller' => 'Immeubles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Postes'), ['controller' => 'Postes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poste'), ['controller' => 'Postes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employe Id') ?></th>
            <td><?= $this->Number->format($employe->employe_id) ?></td>
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
    </div>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($employe->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Categorie Id') ?></th>
                <th scope="col"><?= __('Frequence Id') ?></th>
                <th scope="col"><?= __('Debut Rappel Id') ?></th>
                <th scope="col"><?= __('Modalite Id') ?></th>
                <th scope="col"><?= __('Duree') ?></th>
                <th scope="col"><?= __('Remarques') ?></th>
                <th scope="col"><?= __('Satus Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employe->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->numero) ?></td>
                <td><?= h($formations->Titre) ?></td>
                <td><?= h($formations->categorie_id) ?></td>
                <td><?= h($formations->frequence_id) ?></td>
                <td><?= h($formations->Debut_rappel_id) ?></td>
                <td><?= h($formations->modalite_id) ?></td>
                <td><?= h($formations->Duree) ?></td>
                <td><?= h($formations->Remarques) ?></td>
                <td><?= h($formations->satus_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Formations', 'action' => 'view', $formations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Formations', 'action' => 'edit', $formations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Formations', 'action' => 'delete', $formations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
