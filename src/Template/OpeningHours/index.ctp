<?php

use App\Controller\DaysOfWeekENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>listagem</small></h1>

        <?php if ($this->AppView->visible('OpeningHours', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'OpeningHours', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($openingHours)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Dia</th>
                    <th>Horários</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($openingHours as $opening) : ?>
                    <tr>
                        <td><?= $this->Number->format($opening->id) ?></td>
                        <td><?= DaysOfWeekENUM::findConstants($opening->day_of_week); ?></td>

                        <td>
                            <?php foreach ($opening->times_of_day as $clock) : ?>
                                <?= $clock->time; ?>:00H &nbsp;&nbsp;
                            <?php endforeach; ?>
                        </td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('OpeningHours', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'OpeningHours', 'action' => 'view', $opening->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('OpeningHours', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'OpeningHours', 'action' => 'edit', $opening->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('OpeningHours', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'OpeningHours', 'action' => 'delete', $opening->id], ['class' => 'action__delete sweetdelete', 'data-name' => $opening->day_of_week, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o dia {0}?', $opening->day_of_week)]); ?>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <table class="custom__table table__empty">
            <thead>
                <tr>
                    <th>Nenhum dia da semana encontrado!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($openingHours)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
