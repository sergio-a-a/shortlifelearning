<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Frequences'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="frequences form large-9 medium-8 columns content">
    <?= $this->Form->create($frequence) ?>
    <fieldset>
        <legend><?= __('Add Frequence') ?></legend>
        <?php
            echo $this->Form->control('nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
