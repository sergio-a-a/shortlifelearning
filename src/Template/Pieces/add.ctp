<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pieces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employes Formations'), ['controller' => 'EmployesFormations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employes Formation'), ['controller' => 'EmployesFormations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pieces form large-9 medium-8 columns content">
    <?= $this->Form->create($piece) ?>
    <fieldset>
        <legend><?= __('Add Piece') ?></legend>
        <?php
            echo $this->Form->control('fichier');
            echo $this->Form->control('remarque');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
