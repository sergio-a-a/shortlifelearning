<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "formations",
    "action" => "getByEmploye",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('employes/maj', ['block' => 'scriptBottom']);
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
    <?= $this->Form->create($employesFormation, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Employes Formation') ?></legend>
        <?php
            echo $this->Form->input('employe_id', ['options' => $employes]);
            echo $this->Form->input('formation_id', ['options' => $employesformations]);
            //echo $this->Form->control('done', ['empty' => true]);
            echo $this->Form->control('Remarque');
            
            echo $this->Form->input('file', ['type' => 'file']);
            echo $this->Form->control('Remarque_Piece', ['label' => 'Remarque Pièce Jointe']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
