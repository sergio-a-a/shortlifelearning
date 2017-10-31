<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployesFormation $employesFormation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employes Formation'), ['action' => 'edit', $employesFormation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employes Formation'), ['action' => 'delete', $employesFormation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employesFormation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employes Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employes Formation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employesFormations view large-9 medium-8 columns content">
    <h3><?= h($employesFormation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employe') ?></th>
            <td><?= $employesFormation->has('employe') ? $this->Html->link($employesFormation->employe->nom, ['controller' => 'Employes', 'action' => 'view', $employesFormation->employe->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formation') ?></th>
            <td><?= $employesFormation->has('formation') ? $this->Html->link($employesFormation->formation->Titre, ['controller' => 'Formations', 'action' => 'view', $employesFormation->formation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employesFormation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('faite le : ') ?></th>
            <td><?= h($employesFormation->done) ?></td>
        </tr>
    </table>
</div>
