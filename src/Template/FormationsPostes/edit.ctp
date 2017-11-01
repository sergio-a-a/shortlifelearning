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
                ['action' => 'delete', $formationsPoste->poste_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPoste->poste_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Formations Postes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Postes'), ['controller' => 'Postes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Poste'), ['controller' => 'Postes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationsPostes form large-9 medium-8 columns content">
    <?= $this->Form->create($formationsPoste) ?>
    <fieldset>
        <legend><?= __('Edit Formations Poste') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
