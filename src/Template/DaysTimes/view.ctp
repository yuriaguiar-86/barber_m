<?php

use App\Controller\DaysOfWeekENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>visualização</small></h1>

        <div class="profile">
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'DaysTimes', 'action' => 'delete', $daysTime->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => DaysOfWeekENUM::findConstants($daysTime->day_of_week), 'confirm' => __('Tem certeza que deseja apagar o dia {0}?', DaysOfWeekENUM::findConstants($daysTime->day_of_week))]); ?>
            <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'DaysTimes', 'action' => 'edit', $daysTime->id], ['class' => 'update']); ?></p>
            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysTimes', 'action' => 'index']); ?></p>
        </div>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $daysTime->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Dia</h4>
                <dd><?= DaysOfWeekENUM::findConstants($daysTime->day_of_week); ?></dd>
            </div>
        </dl>
    </div>

    <aside class="toghetter">
        <h2>Horários</h2>

        <?php if (!empty($daysTime->opening_hours)) : ?>
            <table class="custom__table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Horário</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($daysTime->opening_hours as $openingHours) : ?>
                        <tr>
                            <td><?= $this->Number->format($openingHours->id) ?></td>
                            <td><?= $openingHours->time_of_week; ?>:00H</td>

                            <td class="actions">
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'OpeningHours', 'action' => 'view', $openingHours->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'OpeningHours', 'action' => 'edit', $openingHours->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'OpeningHours', 'action' => 'delete', $openingHours->id], ['class' => 'action__delete sweetdelete', 'data-name' => $openingHours->time_of_week, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o horário {0}?', $openingHours->time_of_week)]); ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="values__empty">Nenhum horário vinculado!</p>
        <?php endif; ?>
    </aside>
</section>

<?= $this->Html->script('sweetalert'); ?>
