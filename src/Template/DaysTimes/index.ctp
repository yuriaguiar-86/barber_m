<?php

use App\Controller\DaysOfWeekENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>listagem</small></h1>

        <?php if ($this->AppView->visible('DaysTimes', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'DaysTimes', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($daysTimes)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Dia</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daysTimes as $dayTime) : ?>
                    <tr>
                        <td><?= $this->Number->format($dayTime->id) ?></td>
                        <td><?= DaysOfWeekENUM::findConstants($dayTime->day_of_week); ?></td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('DaysTimes', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'DaysTimes', 'action' => 'view', $dayTime->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('DaysTimes', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'DaysTimes', 'action' => 'edit', $dayTime->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('DaysTimes', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'DaysTimes', 'action' => 'delete', $dayTime->id], ['class' => 'action__delete sweetdelete', 'data-name' => DaysOfWeekENUM::findConstants($dayTime->day_of_week), 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o dia {0}?', DaysOfWeekENUM::findConstants($dayTime->day_of_week))]); ?>
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

    <?php if (!empty($daysTimes)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
