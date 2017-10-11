<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\FormationsCompletee $formationsCompletee
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formations Completee'), ['action' => 'edit', $formationsCompletee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formations Completee'), ['action' => 'delete', $formationsCompletee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsCompletee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations Completees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formations Completee'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formationsCompletees view large-9 medium-8 columns content">
    <h3><?= h($formationsCompletee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Remarque') ?></th>
            <td><?= h($formationsCompletee->Remarque) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formationsCompletee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employe Id') ?></th>
            <td><?= $this->Number->format($formationsCompletee->employe_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation Id') ?></th>
            <td><?= $this->Number->format($formationsCompletee->formation_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($formationsCompletee->date) ?></td>
        </tr>
    </table>
</div>
