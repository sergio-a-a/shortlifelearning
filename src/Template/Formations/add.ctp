<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frequences'), ['controller' => 'Frequences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frequence'), ['controller' => 'Frequences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Debut Rappels'), ['controller' => 'DebutRappels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Debut Rappel'), ['controller' => 'DebutRappels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modalites'), ['controller' => 'Modalites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modalite'), ['controller' => 'Modalites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuss'), ['controller' => 'Statuss', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuss', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Add Formation') ?></legend>
        <?php
            echo $this->Form->control('numero');
            echo $this->Form->control('Titre');
            echo $this->Form->control('categorie_id', ['options' => $categories]);
            echo $this->Form->control('frequence_id', ['options' => $frequences]);
            echo $this->Form->control('Debut_rappel_id', ['options' => $debutRappels]);
            echo $this->Form->control('modalite_id', ['options' => $modalites]);
            echo $this->Form->control('Duree');
            echo $this->Form->control('Remarques');
            echo $this->Form->control('satus_id', ['options' => $statuss]);
            echo $this->Form->control('employes._ids', ['options' => $employes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
