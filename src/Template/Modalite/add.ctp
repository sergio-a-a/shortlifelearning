<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Modalite'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="modalite form large-9 medium-8 columns content">
    <?= $this->Form->create($modalite) ?>
    <fieldset>
        <legend><?= __('Add Modalite') ?></legend>
        <?php
            echo $this->Form->control('nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
