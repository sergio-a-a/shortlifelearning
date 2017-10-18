<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\DebutRappel $debutRappel
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Debut Rappel'), ['action' => 'edit', $debutRappel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Debut Rappel'), ['action' => 'delete', $debutRappel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $debutRappel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Debut Rappels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debut Rappel'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="debutRappels view large-9 medium-8 columns content">
    <h3><?= h($debutRappel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($debutRappel->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($debutRappel->id) ?></td>
        </tr>
    </table>
</div>
