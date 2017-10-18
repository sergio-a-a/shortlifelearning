<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Frequence $frequence
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Frequence'), ['action' => 'edit', $frequence->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Frequence'), ['action' => 'delete', $frequence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frequence->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Frequences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequence'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="frequences view large-9 medium-8 columns content">
    <h3><?= h($frequence->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($frequence->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($frequence->id) ?></td>
        </tr>
    </table>
</div>
