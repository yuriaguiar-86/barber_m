<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimesOfDay $timesOfDay
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timesOfDay->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timesOfDay->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Times Of Day'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="timesOfDay form large-9 medium-8 columns content">
    <?= $this->Form->create($timesOfDay) ?>
    <fieldset>
        <legend><?= __('Edit Times Of Day') ?></legend>
        <?php
            echo $this->Form->control('time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
