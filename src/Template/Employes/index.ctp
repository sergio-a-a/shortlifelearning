<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe[]|\Cake\Collection\CollectionInterface $employes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Civilites'), ['controller' => 'Civilites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Civilite'), ['controller' => 'Civilites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Langues'), ['controller' => 'Langues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Langue'), ['controller' => 'Langues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Immeubles'), ['controller' => 'Immeubles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Immeuble'), ['controller' => 'Immeubles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Postes'), ['controller' => 'Postes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Poste'), ['controller' => 'Postes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employes index large-9 medium-8 columns content">
    <h3><?= __('Employes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('civilite_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cellulaire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('courriel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('langue_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('immeuble_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employe_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('poste_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actif') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_envoi_plan_formation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('informations_supplementaires') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employes as $employe): ?>
            <tr>
                <td><?= $this->Number->format($employe->id) ?></td>
                <td><?= h($employe->numero) ?></td>
                <td><?= h($employe->nom) ?></td>
                <td><?= h($employe->prenom) ?></td>
                <td><?= $employe->has('civilite') ? $this->Html->link($employe->civilite->nom, ['controller' => 'Civilites', 'action' => 'view', $employe->civilite->id]) : '' ?></td>
                <td><?= h($employe->cellulaire) ?></td>
                <td><?= h($employe->courriel) ?></td>
                <td><?= $employe->has('langue') ? $this->Html->link($employe->langue->nom, ['controller' => 'Langues', 'action' => 'view', $employe->langue->id]) : '' ?></td>
                <td><?= $employe->has('immeuble') ? $this->Html->link($employe->immeuble->address, ['controller' => 'Immeubles', 'action' => 'view', $employe->immeuble->id]) : '' ?></td>
                <td><?= $this->Number->format($employe->employe_id) ?></td>
                <td><?= $employe->has('poste') ? $this->Html->link($employe->poste->titre, ['controller' => 'Postes', 'action' => 'view', $employe->poste->id]) : '' ?></td>
                <td><?= h($employe->actif) ?></td>
                <td><?= h($employe->date_envoi_plan_formation) ?></td>
                <td><?= h($employe->informations_supplementaires) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
