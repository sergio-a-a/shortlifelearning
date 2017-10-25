<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployesFormation[]|\Cake\Collection\CollectionInterface $employesFormations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employes Formation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employesFormations index large-9 medium-8 columns content">
    <h3><?= __('Employes Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employe_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('done') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employesFormations as $employesFormation): ?>
            <tr>
                <td><?= $this->Number->format($employesFormation->id) ?></td>
                <td><?= $employesFormation->has('employe') ? $this->Html->link($employesFormation->employe->nom, ['controller' => 'Employes', 'action' => 'view', $employesFormation->employe->id]) : '' ?></td>
                <td><?= $employesFormation->has('formation') ? $this->Html->link($employesFormation->formation->Titre, ['controller' => 'Formations', 'action' => 'view', $employesFormation->formation->id]) : '' ?></td>
                <td><?= h($employesFormation->done) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employesFormation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employesFormation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employesFormation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employesFormation->id)]) ?>
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
