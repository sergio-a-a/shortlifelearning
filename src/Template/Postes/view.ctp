<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Poste $poste
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Poste'), ['action' => 'edit', $poste->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Poste'), ['action' => 'delete', $poste->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poste->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Postes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poste'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="postes view large-9 medium-8 columns content">
    <h3><?= h($poste->titre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($poste->titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($poste->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employes') ?></h4>
        <?php if (!empty($poste->employes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Prenom') ?></th>
                <th scope="col"><?= __('Civilite Id') ?></th>
                <th scope="col"><?= __('Cellulaire') ?></th>
                <th scope="col"><?= __('Courriel') ?></th>
                <th scope="col"><?= __('Langue Id') ?></th>
                <th scope="col"><?= __('Immeuble Id') ?></th>
                <th scope="col"><?= __('Employe Id') ?></th>
                <th scope="col"><?= __('Poste Id') ?></th>
                <th scope="col"><?= __('Actif') ?></th>
                <th scope="col"><?= __('Date Envoi Plan Formation') ?></th>
                <th scope="col"><?= __('Informations Supplementaires') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($poste->employes as $employes): ?>
            <tr>
                <td><?= h($employes->id) ?></td>
                <td><?= h($employes->numero) ?></td>
                <td><?= h($employes->nom) ?></td>
                <td><?= h($employes->prenom) ?></td>
                <td><?= h($employes->civilite_id) ?></td>
                <td><?= h($employes->cellulaire) ?></td>
                <td><?= h($employes->courriel) ?></td>
                <td><?= h($employes->langue_id) ?></td>
                <td><?= h($employes->immeuble_id) ?></td>
                <td><?= h($employes->employe_id) ?></td>
                <td><?= h($employes->poste_id) ?></td>
                <td><?= h($employes->actif) ?></td>
                <td><?= h($employes->date_envoi_plan_formation) ?></td>
                <td><?= h($employes->informations_supplementaires) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Employes', 'action' => 'view', $employes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Employes', 'action' => 'edit', $employes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employes', 'action' => 'delete', $employes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($poste->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Frequence Id') ?></th>
                <th scope="col"><?= __('Debut Rappel Id') ?></th>
                <th scope="col"><?= __('Modalite Id') ?></th>
                <th scope="col"><?= __('Duree') ?></th>
                <th scope="col"><?= __('Remarques') ?></th>
                <th scope="col"><?= __('Satus Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($poste->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->numero) ?></td>
                <td><?= h($formations->Titre) ?></td>
                <td><?= h($formations->frequence_id) ?></td>
                <td><?= h($formations->Debut_rappel_id) ?></td>
                <td><?= h($formations->modalite_id) ?></td>
                <td><?= h($formations->Duree) ?></td>
                <td><?= h($formations->Remarques) ?></td>
                <td><?= h($formations->satus_id) ?></td>
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
