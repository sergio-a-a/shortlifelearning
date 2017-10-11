<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FormationsCompletee[]|\Cake\Collection\CollectionInterface $formationsCompletees
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formations Completee'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationsCompletees index large-9 medium-8 columns content">
    <h3><?= __('Formations Completees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employe_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Remarque') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formationsCompletees as $formationsCompletee): ?>
            <tr>
                <td><?= $this->Number->format($formationsCompletee->id) ?></td>
                <td><?= $this->Number->format($formationsCompletee->employe_id) ?></td>
                <td><?= $this->Number->format($formationsCompletee->formation_id) ?></td>
                <td><?= h($formationsCompletee->date) ?></td>
                <td><?= h($formationsCompletee->Remarque) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formationsCompletee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formationsCompletee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formationsCompletee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsCompletee->id)]) ?>
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
