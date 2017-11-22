<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Piece[]|\Cake\Collection\CollectionInterface $pieces
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Piece'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employes Formations'), ['controller' => 'EmployesFormations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employes Formation'), ['controller' => 'EmployesFormations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pieces index large-9 medium-8 columns content">
    <h3><?= __('Pieces') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fichier') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarque') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pieces as $piece): ?>
            <tr>
                <td><?= $this->Number->format($piece->id) ?></td>
                <td><?= h($piece->fichier) ?></td>
                <td><?= h($piece->created) ?></td>
                <td><?= h($piece->remarque) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $piece->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $piece->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $piece->id], ['confirm' => __('Are you sure you want to delete # {0}?', $piece->id)]) ?>
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
