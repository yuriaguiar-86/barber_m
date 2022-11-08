<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule[]|\Cake\Collection\CollectionInterface $schedules
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Days Of Work'), ['controller' => 'DaysOfWork', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Days Of Work'), ['controller' => 'DaysOfWork', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types Of Payments'), ['controller' => 'TypesOfPayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Types Of Payment'), ['controller' => 'TypesOfPayments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types Of Services'), ['controller' => 'TypesOfServices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Types Of Service'), ['controller' => 'TypesOfServices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedules index large-9 medium-8 columns content">
    <h3><?= __('Schedules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('days_of_work_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('types_of_payment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('finished') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
            <tr>
                <td><?= $this->Number->format($schedule->id) ?></td>
                <td><?= $this->Number->format($schedule->user_id) ?></td>
                <td><?= $schedule->has('user') ? $this->Html->link($schedule->user->name, ['controller' => 'Users', 'action' => 'view', $schedule->user->id]) : '' ?></td>
                <td><?= $schedule->has('days_of_work') ? $this->Html->link($schedule->days_of_work->id, ['controller' => 'DaysOfWork', 'action' => 'view', $schedule->days_of_work->id]) : '' ?></td>
                <td><?= $schedule->has('types_of_payment') ? $this->Html->link($schedule->types_of_payment->name, ['controller' => 'TypesOfPayments', 'action' => 'view', $schedule->types_of_payment->id]) : '' ?></td>
                <td><?= $this->Number->format($schedule->finished) ?></td>
                <td><?= h($schedule->created) ?></td>
                <td><?= h($schedule->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $schedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?>
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
