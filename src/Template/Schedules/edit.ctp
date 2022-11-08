<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $schedule->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?></li>
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
<div class="schedules form large-9 medium-8 columns content">
    <?= $this->Form->create($schedule) ?>
    <fieldset>
        <legend><?= __('Edit Schedule') ?></legend>
        <?php
            echo $this->Form->control('user_id');
            echo $this->Form->control('employee_id', ['options' => $users]);
            echo $this->Form->control('days_of_work_id', ['options' => $daysOfWork]);
            echo $this->Form->control('types_of_payment_id', ['options' => $typesOfPayments]);
            echo $this->Form->control('finished');
            echo $this->Form->control('types_of_services._ids', ['options' => $typesOfServices]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
