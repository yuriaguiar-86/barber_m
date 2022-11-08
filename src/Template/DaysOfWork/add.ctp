<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOfWork $daysOfWork
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Days Of Work'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="daysOfWork form large-9 medium-8 columns content">
    <?= $this->Form->create($daysOfWork) ?>
    <fieldset>
        <legend><?= __('Add Days Of Work') ?></legend>
        <?php
            echo $this->Form->control('not_work');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
