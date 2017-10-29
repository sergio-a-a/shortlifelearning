<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Formation[]|\Cake\Collection\CollectionInterface $formations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?></li>
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
<div class="formations index large-9 medium-8 columns content">
    <h3><?= __('Formations') ?></h3>
    <form action="" method="post">
        <label>Search</label>
        <input type="text" name="search"/>
        <button type="submit">Search</button>
    </form>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Titre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorie_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('frequence_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Debut_rappel_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modalite_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Duree') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Remarques') ?></th>
                <th scope="col"><?= $this->Paginator->sort('satus_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $formation): ?>
            <tr>
                <td><?= h($formation->numero) ?></td>
                <td><?= h($formation->Titre) ?></td>
                <td><?= $formation->has('category') ? $this->Html->link($formation->category->nom, ['controller' => 'Categories', 'action' => 'view', $formation->category->id]) : '' ?></td>
                <td><?= $formation->has('frequence') ? $this->Html->link($formation->frequence->nom, ['controller' => 'Frequences', 'action' => 'view', $formation->frequence->id]) : '' ?></td>
                <td><?= $formation->has('debut_rappel') ? $this->Html->link($formation->debut_rappel->nom, ['controller' => 'DebutRappels', 'action' => 'view', $formation->debut_rappel->id]) : '' ?></td>
                <td><?= $formation->has('modalite') ? $this->Html->link($formation->modalite->nom, ['controller' => 'Modalites', 'action' => 'view', $formation->modalite->id]) : '' ?></td>
                <td><?= $this->Number->format($formation->Duree) ?></td>
                <td><?= h($formation->Remarques) ?></td>
                <td><?= $formation->has('status') ? $this->Html->link($formation->status->status, ['controller' => 'Statuss', 'action' => 'view', $formation->status->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
