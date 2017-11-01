<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormationsPoste $formationsPoste
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formations Poste'), ['action' => 'edit', $formationsPoste->poste_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formations Poste'), ['action' => 'delete', $formationsPoste->poste_id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPoste->poste_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations Postes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formations Poste'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Postes'), ['controller' => 'Postes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poste'), ['controller' => 'Postes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formationsPostes view large-9 medium-8 columns content">
    <h3><?= h($formationsPoste->poste_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Poste') ?></th>
            <td><?= $formationsPoste->has('poste') ? $this->Html->link($formationsPoste->poste->titre, ['controller' => 'Postes', 'action' => 'view', $formationsPoste->poste->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation') ?></th>
            <td><?= $formationsPoste->has('formation') ? $this->Html->link($formationsPoste->formation->Titre, ['controller' => 'Formations', 'action' => 'view', $formationsPoste->formation->id]) : '' ?></td>
        </tr>
    </table>
</div>
