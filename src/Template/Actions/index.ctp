<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Action[]|\Cake\Collection\CollectionInterface $actions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Action'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Controllers'), ['controller' => 'Controllers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Controller'), ['controller' => 'Controllers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="actions index large-9 medium-8 columns content">
    <h3><?= __('Actions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action_map') ?></th>
                <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('controller_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($actions as $action): ?>
            <tr>
                <td><?= $this->Number->format($action->id) ?></td>
                <td><?= h($action->action_map) ?></td>
                <td><?= h($action->surname) ?></td>
                <td><?= $action->has('controller') ? $this->Html->link($action->controller->name, ['controller' => 'Controllers', 'action' => 'view', $action->controller->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $action->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $action->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $action->id], ['confirm' => __('Are you sure you want to delete # {0}?', $action->id)]) ?>
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
