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
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frequences'), ['controller' => 'Frequences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequence'), ['controller' => 'Frequences', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Debut Rappels'), ['controller' => 'DebutRappels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Debut Rappel'), ['controller' => 'DebutRappels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modalites'), ['controller' => 'Modalites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modalite'), ['controller' => 'Modalites', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statuss'), ['controller' => 'Statuss', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuss', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['controller' => 'Employes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['controller' => 'Employes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formations view large-9 medium-8 columns content">
    <h3><?= h($formation->Titre) ?></h3>
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
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $formation->has('category') ? $this->Html->link($formation->category->nom, ['controller' => 'Categories', 'action' => 'view', $formation->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequence') ?></th>
            <td><?= $formation->has('frequence') ? $this->Html->link($formation->frequence->nom, ['controller' => 'Frequences', 'action' => 'view', $formation->frequence->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debut Rappel') ?></th>
            <td><?= $formation->has('debut_rappel') ? $this->Html->link($formation->debut_rappel->nom, ['controller' => 'DebutRappels', 'action' => 'view', $formation->debut_rappel->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modalite') ?></th>
            <td><?= $formation->has('modalite') ? $this->Html->link($formation->modalite->nom, ['controller' => 'Modalites', 'action' => 'view', $formation->modalite->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarques') ?></th>
            <td><?= h($formation->Remarques) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $formation->has('status') ? $this->Html->link($formation->status->status, ['controller' => 'Statuss', 'action' => 'view', $formation->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duree') ?></th>
            <td><?= $this->Number->format($formation->Duree) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employes') ?></h4>
        <?php if (!empty($formation->employes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
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
                <th scope="col"><?= __('Date Envoi Plan Formation') ?></th>
                <th scope="col"><?= __('Informations Supplementaires') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formation->employes as $employes): ?>
            <tr>
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
</div>
