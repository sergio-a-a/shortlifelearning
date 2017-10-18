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
                ['action' => 'delete', $debutRappel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $debutRappel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Debut Rappels'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="debutRappels form large-9 medium-8 columns content">
    <?= $this->Form->create($debutRappel) ?>
    <fieldset>
        <legend><?= __('Edit Debut Rappel') ?></legend>
        <?php
            echo $this->Form->control('nom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
