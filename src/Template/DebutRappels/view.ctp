<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DebutRappel $debutRappel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Debut Rappel'), ['action' => 'edit', $debutRappel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Debut Rappel'), ['action' => 'delete', $debutRappel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $debutRappel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Debut Rappels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debut Rappel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="debutRappels view large-9 medium-8 columns content">
    <h3><?= h($debutRappel->nom) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($debutRappel->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($debutRappel->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($debutRappel->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Poste Id') ?></th>
                <th scope="col"><?= __('Frequence Id') ?></th>
                <th scope="col"><?= __('Debut Rappel Id') ?></th>
                <th scope="col"><?= __('Modalite Id') ?></th>
                <th scope="col"><?= __('Duree') ?></th>
                <th scope="col"><?= __('Remarques') ?></th>
                <th scope="col"><?= __('Satus Id') ?></th>
                <th scope="col"><?= __('Categorie Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($debutRappel->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->numero) ?></td>
                <td><?= h($formations->Titre) ?></td>
                <td><?= h($formations->poste_id) ?></td>
                <td><?= h($formations->frequence_id) ?></td>
                <td><?= h($formations->Debut_rappel_id) ?></td>
                <td><?= h($formations->modalite_id) ?></td>
                <td><?= h($formations->Duree) ?></td>
                <td><?= h($formations->Remarques) ?></td>
                <td><?= h($formations->satus_id) ?></td>
                <td><?= h($formations->categorie_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Formations', 'action' => 'view', $formations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Formations', 'action' => 'edit', $formations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Formations', 'action' => 'delete', $formations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
