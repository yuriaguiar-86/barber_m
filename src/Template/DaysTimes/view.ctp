<?php

use App\Controller\DaysOfWeekENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>visualização</small></h1>

        <div class="profile">
            <?php if ($this->AppView->visible('DaysTimes', 'delete')) : ?>
                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'DaysTimes', 'action' => 'delete', $daysTime->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => 'o dia '.DaysOfWeekENUM::findConstants($daysTime->day_of_week), 'confirm' => __('Tem certeza que deseja apagar o dia {0}?', DaysOfWeekENUM::findConstants($daysTime->day_of_week))]); ?>
            <?php endif; ?>

            <?php if ($this->AppView->visible('DaysTimes', 'edit')) : ?>
                <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'DaysTimes', 'action' => 'edit', $daysTime->id], ['class' => 'update']); ?></p>
            <?php endif; ?>

            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysTimes', 'action' => 'index']); ?></p>

            <nav class="primary-navigation nav__view">
                <ul>
                    <li><a href="#" class="header__link">Opções &dtrif;</a>
                        <ul class="dropdown">
                            <?php if ($this->AppView->visible('DaysTimes', 'delete')) : ?>
                                <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'DaysTimes', 'action' => 'delete', $daysTime->id], ['class' => 'header__link sweetdelete', 'data-name' => 'o dia '.DaysOfWeekENUM::findConstants($daysTime->day_of_week), 'confirm' => __('Tem certeza que deseja apagar o dia {0}?', DaysOfWeekENUM::findConstants($daysTime->day_of_week))]); ?></li>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('DaysTimes', 'edit')) : ?>
                                <li><?= $this->Html->link(__('Atualizar'), ['controller' => 'DaysTimes', 'action' => 'edit', $daysTime->id], ['class' => 'header__link']); ?></li>
                            <?php endif; ?>

                            <li><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysTimes', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        </ul>
                    </li>
                </ul>
            </nav>
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
                        <th class="px__table">#</th>
                        <th>Horário</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($daysTime->opening_hours as $openingHours) : ?>
                        <tr>
                            <td class="px__table"><?= $this->Number->format($openingHours->id) ?></td>
                            <td><?= $openingHours->time_of_week; ?>:00H</td>

                            <td class="actions">
                                <?php if ($this->AppView->visible('OpeningHours', 'view')) : ?>
                                    <div class="view">
                                        <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'OpeningHours', 'action' => 'view', $openingHours->id], ['class' => 'action__view', 'escape' => false]); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->AppView->visible('OpeningHours', 'edit')) : ?>
                                    <div class="edit">
                                        <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'OpeningHours', 'action' => 'edit', $openingHours->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->AppView->visible('OpeningHours', 'delete')) : ?>
                                    <div class="delete">
                                        <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'OpeningHours', 'action' => 'delete', $openingHours->id], ['class' => 'action__delete sweetdelete', 'data-name' => 'o horário '.$openingHours->time_of_week, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o horário {0}?', $openingHours->time_of_week)]); ?>
                                    </div>
                                <?php endif; ?>

                                <nav class="primary-navigation nav__actions">
                                    <ul>
                                        <?php if (
                                            $this->AppView->visible('OpeningHours', 'view') ||
                                            $this->AppView->visible('OpeningHours', 'edit') ||
                                            $this->AppView->visible('OpeningHours', 'delete')
                                        ) : ?>

                                            <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                                <ul class="dropdown">
                                                    <?php if ($this->AppView->visible('OpeningHours', 'view')) : ?>
                                                        <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'OpeningHours', 'action' => 'view', $openingHours->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('OpeningHours', 'edit')) : ?>
                                                        <li><?= $this->Html->link(__('Editar'), ['controller' => 'OpeningHours', 'action' => 'edit', $openingHours->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('OpeningHours', 'delete')) : ?>
                                                        <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'OpeningHours', 'action' => 'delete', $openingHours->id], ['class' => 'header__link sweetdelete', 'data-name' => 'o horário '.$openingHours->time_of_week, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o horário {0}?', $openingHours->time_of_week)]); ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
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
