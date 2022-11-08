<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOfWork $daysOfWork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Days Of Work'), ['action' => 'edit', $daysOfWork->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Days Of Work'), ['action' => 'delete', $daysOfWork->id], ['confirm' => __('Are you sure you want to delete # {0}?', $daysOfWork->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Days Of Work'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Days Of Work'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="daysOfWork view large-9 medium-8 columns content">
    <h3><?= h($daysOfWork->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($daysOfWork->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Not Work') ?></th>
            <td><?= h($daysOfWork->not_work) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($daysOfWork->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($daysOfWork->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Schedules') ?></h4>
        <?php if (!empty($daysOfWork->schedules)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Days Of Work Id') ?></th>
                <th scope="col"><?= __('Types Of Payment Id') ?></th>
                <th scope="col"><?= __('Finished') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($daysOfWork->schedules as $schedules): ?>
            <tr>
                <td><?= h($schedules->id) ?></td>
                <td><?= h($schedules->user_id) ?></td>
                <td><?= h($schedules->employee_id) ?></td>
                <td><?= h($schedules->days_of_work_id) ?></td>
                <td><?= h($schedules->types_of_payment_id) ?></td>
                <td><?= h($schedules->finished) ?></td>
                <td><?= h($schedules->created) ?></td>
                <td><?= h($schedules->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Schedules', 'action' => 'view', $schedules->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Schedules', 'action' => 'edit', $schedules->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schedules', 'action' => 'delete', $schedules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedules->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
