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
<div class="formation form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Add Formation') ?></legend>
        
        <?php
            echo $this->Form->control('numero');
            echo $this->Form->control('Titre');
           // $options = array('Santé et sécurité','Environnement','Qualité','Ressources humaines','Santé et bien-être','Approvisionnement');
            /*echo $this->Form->select(
                'Categorie',
                $options,
               
                    
            ); */
           // echo $this->Form->select('Categorie', array $options, mixed $options[2]);
            //echo $this->Form->input('Categorie', 'options' => ['Santé et sécurité','Environnement','Qualité','Ressources humaines','Santé et bien-être','Approvisionnement'], 'default' => 2)
            echo "<strong>Categorie *</strong>";
            echo $this->Form->select('Categorie', ['Santé et sécurité','Environnement','Qualité','Ressources humaines','Santé et bien-être','Approvisionnement']);
            echo "<strong>Frequence *</strong>";
            echo $this->Form->select('Frequence', ['Une seule fois','1 semaine','1 mois','3 mois','6 mois','18 mois','1 an','2 ans','3 ans','4 ans','5 ans']);
            echo "<strong>Debut rappel *</strong>";
            echo $this->Form->select('Debut_rappel', ['Une seule fois','1 semaine','1 mois','3 mois','6 mois','18 mois','1 an','2 ans','3 ans','4 ans','5 ans']);
            echo "<strong>Modalité *</strong>";
            echo $this->Form->select('Modalite', ['En ligne','Externe','Interne']);
            echo $this->Form->control('Duree');
            echo $this->Form->control('Remarques');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
