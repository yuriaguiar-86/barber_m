<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOfWeek $daysOfWeek
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Days Of Week'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="daysOfWeek form large-9 medium-8 columns content">
    <?= $this->Form->create($daysOfWeek) ?>
    <fieldset>
        <legend><?= __('Add Days Of Week') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
