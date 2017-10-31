<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employes form large-9 medium-8 columns content">
    <?= $this->Form->create($employe) ?>
    <fieldset>
        <legend><?= __('Add Employe') ?></legend>
        <?php
            echo $this->Form->control('numero');
            echo $this->Form->control('nom');
            echo $this->Form->control('prenom');
            echo $this->Form->control('civilite_id', ['options' => $civilites]);
            echo $this->Form->control('cellulaire');
            echo $this->Form->control('courriel');
            echo $this->Form->control('langue_id', ['options' => $langues]);
            echo $this->Form->control('immeuble_id', ['options' => $immeubles]);
            echo $this->Form->control('employe_id', ['options' => $superviseurs, 'label' => 'Superviseur']);
            echo $this->Form->control('poste_id', ['options' => $postes]);
            echo $this->Form->control('actif');
            echo $this->Form->control('date_envoi_plan_formation', ['empty' => true]);
            echo $this->Form->control('informations_supplementaires');
            echo $this->Form->control('formations._ids', ['options' => $formations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
