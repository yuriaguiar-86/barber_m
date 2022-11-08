<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypesOfService $typesOfService
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Types Of Services'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typesOfServices form large-9 medium-8 columns content">
    <?= $this->Form->create($typesOfService) ?>
    <fieldset>
        <legend><?= __('Add Types Of Service') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('price');
            echo $this->Form->control('description');
            echo $this->Form->control('schedules._ids', ['options' => $schedules]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
