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
                ['action' => 'delete', $formationsCompletee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formationsCompletee->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Formations Completees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="formationsCompletees form large-9 medium-8 columns content">
    <?= $this->Form->create($formationsCompletee) ?>
    <fieldset>
        <legend><?= __('Edit Formations Completee') ?></legend>
        <?php
            echo $this->Form->control('employe_id');
            echo $this->Form->control('formation_id');
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('Remarque');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
