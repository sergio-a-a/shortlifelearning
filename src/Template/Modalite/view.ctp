<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Modalite $modalite
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modalite'), ['action' => 'edit', $modalite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modalite'), ['action' => 'delete', $modalite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modalite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modalite'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modalite'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modalite view large-9 medium-8 columns content">
    <h3><?= h($modalite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($modalite->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($modalite->id) ?></td>
        </tr>
    </table>
</div>
