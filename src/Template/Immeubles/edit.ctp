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
                ['action' => 'delete', $immeuble->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $immeuble->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Immeubles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="immeubles form large-9 medium-8 columns content">
    <?= $this->Form->create($immeuble) ?>
    <fieldset>
        <legend><?= __('Edit Immeuble') ?></legend>
        <?php
            echo $this->Form->control('address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
