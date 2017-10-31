<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe $employe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employe'), ['action' => 'edit', $employe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employe'), ['action' => 'delete', $employe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employe'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employes view large-9 medium-8 columns content">
    <h3><?= h($employe->nom) ?></h3>
    <h5><?= $this->Html->link('Envoi le plan de formation', ['controller' => 'Employes', 'action' => 'cake_pdf_download', 'id' => $employe->id]) ?></h5>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= h($employe->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($employe->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($employe->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Civilite') ?></th>
            <td><?= $employe->has('civilite') ? $this->Html->link($employe->civilite->nom, ['controller' => 'Civilites', 'action' => 'view', $employe->civilite->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cellulaire') ?></th>
            <td><?= h($employe->cellulaire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Courriel') ?></th>
            <td><?= h($employe->courriel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Langue') ?></th>
            <td><?= $employe->has('langue') ? $this->Html->link($employe->langue->nom, ['controller' => 'Langues', 'action' => 'view', $employe->langue->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Immeuble') ?></th>
            <td><?= $employe->has('immeuble') ? $this->Html->link($employe->immeuble->address, ['controller' => 'Immeubles', 'action' => 'view', $employe->immeuble->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Poste') ?></th>
            <td><?= $employe->has('poste') ? $this->Html->link($employe->poste->titre, ['controller' => 'Postes', 'action' => 'view', $employe->poste->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Informations Supplementaires') ?></th>
            <td><?= h($employe->informations_supplementaires) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Superviseur') ?></th>
            <td><?= $employe->has('superviseur') ? $this->Html->link($employe->superviseur->nom, ['controller' => 'Employes', 'action' => 'view', $employe->superviseur->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Envoi Plan Formation') ?></th>
            <td><?= h($employe->date_envoi_plan_formation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= $employe->actif ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($employe->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Categorie') ?></th>
                <th scope="col"><?= __('Frequence') ?></th>
                <th scope="col"><?= __('Debut Rappel') ?></th>
                <th scope="col"><?= __('Modalite') ?></th>
                <th scope="col"><?= __('Duree') ?></th>
                <th scope="col"><?= __('Remarques') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employe->formations as $formations): ?>
            <tr>
                <td><?= h($formations->numero) ?></td>
                <td><?= h($formations->Titre) ?></td>
                <td><?= h($formations->category->nom) ?></td>
                <td><?= h($formations->frequence->nom) ?></td>
                <td><?= h($formations->debut_rappel->nom) ?></td>
                <td><?= h($formations->modalite->nom) ?></td>
                <td><?= h($formations->Duree) ?></td>
                <td><?= h($formations->Remarques) ?></td>
                <td><?= h($formations->status->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Gérer date'), ['controller' => 'EmployesFormations', 'action' => 'edit', $formations->_joinData->id]) ?>
                    <?= $this->Html->link(__('View'), ['controller' => 'Formations', 'action' => 'view', $formations->id]) ?><br>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Formations', 'action' => 'edit', $formations->id]) ?><br>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Formations', 'action' => 'delete', $formations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    
</div>
