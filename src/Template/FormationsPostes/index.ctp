<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsPoste[]|\Cake\Collection\CollectionInterface $formationsPostes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formations Poste'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Postes'), ['controller' => 'Postes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Poste'), ['controller' => 'Postes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationsPostes index large-9 medium-8 columns content">
    <h3><?= __('Formations Postes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('poste_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formationsPostes as $formationsPoste): ?>
            <tr>
                <td><?= $formationsPoste->has('poste') ? $this->Html->link($formationsPoste->poste->titre, ['controller' => 'Postes', 'action' => 'view', $formationsPoste->poste->id]) : '' ?></td>
                <td><?= $formationsPoste->has('formation') ? $this->Html->link($formationsPoste->formation->Titre, ['controller' => 'Formations', 'action' => 'view', $formationsPoste->formation->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formationsPoste->poste_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formationsPoste->poste_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formationsPoste->poste_id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPoste->poste_id)]) ?>
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
