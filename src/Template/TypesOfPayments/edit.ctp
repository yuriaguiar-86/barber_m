<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypesOfPayment $typesOfPayment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $typesOfPayment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $typesOfPayment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Types Of Payments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typesOfPayments form large-9 medium-8 columns content">
    <?= $this->Form->create($typesOfPayment) ?>
    <fieldset>
        <legend><?= __('Edit Types Of Payment') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
