<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employesFormation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employesFormation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Employes Formations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employesFormations form large-9 medium-8 columns content">
    <?= $this->Form->create($employesFormation) ?>
    <fieldset>
        <legend><?= __('Edit Employes Formation') ?></legend>
        <?php
            echo $this->Form->control('employe_id', ['options' => $employes]);
            echo $this->Form->control('formation_id', ['options' => $formations]);
            echo $this->Form->control('done', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
