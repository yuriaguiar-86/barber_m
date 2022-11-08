<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Days Of Work'), ['controller' => 'DaysOfWork', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Days Of Work'), ['controller' => 'DaysOfWork', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types Of Payments'), ['controller' => 'TypesOfPayments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Types Of Payment'), ['controller' => 'TypesOfPayments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types Of Services'), ['controller' => 'TypesOfServices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Types Of Service'), ['controller' => 'TypesOfServices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $schedule->has('user') ? $this->Html->link($schedule->user->name, ['controller' => 'Users', 'action' => 'view', $schedule->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Days Of Work') ?></th>
            <td><?= $schedule->has('days_of_work') ? $this->Html->link($schedule->days_of_work->id, ['controller' => 'DaysOfWork', 'action' => 'view', $schedule->days_of_work->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Types Of Payment') ?></th>
            <td><?= $schedule->has('types_of_payment') ? $this->Html->link($schedule->types_of_payment->name, ['controller' => 'TypesOfPayments', 'action' => 'view', $schedule->types_of_payment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($schedule->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Finished') ?></th>
            <td><?= $this->Number->format($schedule->finished) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($schedule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($schedule->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Types Of Services') ?></h4>
        <?php if (!empty($schedule->types_of_services)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($schedule->types_of_services as $typesOfServices): ?>
            <tr>
                <td><?= h($typesOfServices->id) ?></td>
                <td><?= h($typesOfServices->name) ?></td>
                <td><?= h($typesOfServices->price) ?></td>
                <td><?= h($typesOfServices->description) ?></td>
                <td><?= h($typesOfServices->created) ?></td>
                <td><?= h($typesOfServices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TypesOfServices', 'action' => 'view', $typesOfServices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TypesOfServices', 'action' => 'edit', $typesOfServices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TypesOfServices', 'action' => 'delete', $typesOfServices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typesOfServices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
