<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Piece $piece
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Piece'), ['action' => 'edit', $piece->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Piece'), ['action' => 'delete', $piece->id], ['confirm' => __('Are you sure you want to delete # {0}?', $piece->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pieces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Piece'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employes Formations'), ['controller' => 'EmployesFormations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employes Formation'), ['controller' => 'EmployesFormations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pieces view large-9 medium-8 columns content">
    <h3><?= h($piece->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fichier') ?></th>
            <td><?= h($piece->fichier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarque') ?></th>
            <td><?= h($piece->remarque) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($piece->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($piece->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employes Formations') ?></h4>
        <?php if (!empty($piece->employes_formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employe Id') ?></th>
                <th scope="col"><?= __('Formation Id') ?></th>
                <th scope="col"><?= __('Done') ?></th>
                <th scope="col"><?= __('Remarque') ?></th>
                <th scope="col"><?= __('Piece Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($piece->employes_formations as $employesFormations): ?>
            <tr>
                <td><?= h($employesFormations->id) ?></td>
                <td><?= h($employesFormations->employe_id) ?></td>
                <td><?= h($employesFormations->formation_id) ?></td>
                <td><?= h($employesFormations->done) ?></td>
                <td><?= h($employesFormations->Remarque) ?></td>
                <td><?= h($employesFormations->piece_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EmployesFormations', 'action' => 'view', $employesFormations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EmployesFormations', 'action' => 'edit', $employesFormations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmployesFormations', 'action' => 'delete', $employesFormations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employesFormations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
