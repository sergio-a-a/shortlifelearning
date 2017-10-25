<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formation'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations Completees'), ['controller' => 'FormationsCompletees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formations Completee'), ['controller' => 'FormationsCompletees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Add Formation') ?></legend>
        
        <?php
            echo $this->Form->control('numero');
            echo $this->Form->control('Titre');
            echo $this->Form->control('categorie', ['options' => $categories, 'default' => 1]);
            echo $this->Form->control('frequence', ['options' => $frequences, 'default' => 1]);
            echo $this->Form->control('Debut_rappel', ['options' => $debutRappels, 'default' => 1]);
            echo $this->Form->control('modalite', ['options' => $modalites, 'default' => 1]);
            echo $this->Form->control('Duree');
            echo $this->Form->control('Remarques');
            echo $this->Form->control('employes._ids', ['options' => $employes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
