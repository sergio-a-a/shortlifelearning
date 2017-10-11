<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Formation $formation
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formation'), ['action' => 'edit', $formation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formation'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations Completees'), ['controller' => 'FormationsCompletees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formations Completee'), ['controller' => 'FormationsCompletees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formations view large-9 medium-8 columns content">
    <h3><?= h($formation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= h($formation->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($formation->Titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categorie') ?></th>
            <td><?= h($formation->Categorie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequence') ?></th>
            <td><?= h($formation->Frequence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debut Rappel') ?></th>
            <td><?= h($formation->Debut_rappel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modalite') ?></th>
            <td><?= h($formation->Modalite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarques') ?></th>
            <td><?= h($formation->Remarques) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duree') ?></th>
            <td><?= $this->Number->format($formation->Duree) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations Completees') ?></h4>
        <?php if (!empty($formation->formations_completees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employe Id') ?></th>
                <th scope="col"><?= __('Formation Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Remarque') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formation->formations_completees as $formationsCompletees): ?>
            <tr>
                <td><?= h($formationsCompletees->id) ?></td>
                <td><?= h($formationsCompletees->employe_id) ?></td>
                <td><?= h($formationsCompletees->formation_id) ?></td>
                <td><?= h($formationsCompletees->date) ?></td>
                <td><?= h($formationsCompletees->Remarque) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FormationsCompletees', 'action' => 'view', $formationsCompletees->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FormationsCompletees', 'action' => 'edit', $formationsCompletees->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FormationsCompletees', 'action' => 'delete', $formationsCompletees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsCompletees->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
