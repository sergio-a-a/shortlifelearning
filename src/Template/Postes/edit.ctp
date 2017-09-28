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
                ['action' => 'delete', $poste->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $poste->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Postes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="postes form large-9 medium-8 columns content">
    <?= $this->Form->create($poste) ?>
    <fieldset>
        <legend><?= __('Edit Poste') ?></legend>
        <?php
            echo $this->Form->control('titre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
