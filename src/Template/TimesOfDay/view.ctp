<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimesOfDay $timesOfDay
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Times Of Day'), ['action' => 'edit', $timesOfDay->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Times Of Day'), ['action' => 'delete', $timesOfDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timesOfDay->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Times Of Day'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Times Of Day'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timesOfDay view large-9 medium-8 columns content">
    <h3><?= h($timesOfDay->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($timesOfDay->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= $this->Number->format($timesOfDay->time) ?></td>
        </tr>
    </table>
</div>
