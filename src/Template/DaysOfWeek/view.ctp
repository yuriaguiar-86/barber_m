<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DaysOfWeek $daysOfWeek
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Days Of Week'), ['action' => 'edit', $daysOfWeek->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Days Of Week'), ['action' => 'delete', $daysOfWeek->id], ['confirm' => __('Are you sure you want to delete # {0}?', $daysOfWeek->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Days Of Week'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Days Of Week'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="daysOfWeek view large-9 medium-8 columns content">
    <h3><?= h($daysOfWeek->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($daysOfWeek->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($daysOfWeek->id) ?></td>
        </tr>
    </table>
</div>
