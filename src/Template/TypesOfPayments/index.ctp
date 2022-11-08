<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypesOfPayment[]|\Cake\Collection\CollectionInterface $typesOfPayments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Types Of Payment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typesOfPayments index large-9 medium-8 columns content">
    <h3><?= __('Types Of Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($typesOfPayments as $typesOfPayment): ?>
            <tr>
                <td><?= $this->Number->format($typesOfPayment->id) ?></td>
                <td><?= h($typesOfPayment->name) ?></td>
                <td><?= h($typesOfPayment->created) ?></td>
                <td><?= h($typesOfPayment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $typesOfPayment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $typesOfPayment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $typesOfPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typesOfPayment->id)]) ?>
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
