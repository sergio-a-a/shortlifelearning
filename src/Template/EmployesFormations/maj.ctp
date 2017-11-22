<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "EmployesFormations",
    "action" => "getByEmployes",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('maj/maj', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employes Formations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employes Formation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employesFormations form large-9 medium-8 columns content">
    <?= $this->Form->create($employesFormation) ?>
    <fieldset>
        <legend><?= __('Add Employes Formation') ?></legend>
        <?php
            echo $this->Form->control('employe_id', ['options' => $employes]);
            echo $this->Form->control('formation_id', ['options' => $formations]);
            echo $this->Form->control('done', ['empty' => true]);
            echo $this->Form->control('Remarque');
            echo $this->Form->control('piece_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
