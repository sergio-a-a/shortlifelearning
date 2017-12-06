<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DebutRappel[]|\Cake\Collection\CollectionInterface $debutRappels
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Debut Rappel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="debutRappels index large-9 medium-8 columns content">
    <h3><?= __('Debut Rappels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($debutRappels as $debutRappel): ?>
            <tr>
                <td><?= $this->Number->format($debutRappel->id) ?></td>
                <td><?= h($debutRappel->nom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $debutRappel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $debutRappel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $debutRappel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $debutRappel->id)]) ?>
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
