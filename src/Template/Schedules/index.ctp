<?php

use App\Controller\FinishedENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Agendamentos <small>listagem</small></h1>

        <?php if ($this->AppView->visible('Schedules', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'Schedules', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($schedules)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th class="px__table">#</th>
                    <th class="px__phone">Profissional</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th class="px__big">Serviços</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($schedules as $schedule) : ?>
                    <tr>
                        <td class="px__table"><?= $this->Number->format($schedule->id) ?></td>
                        <td class="px__phone"><?= $schedule->user->name; ?></td>
                        <td><?= $schedule->date->format('d/m/Y'); ?></td>
                        <td><?= $schedule->time; ?>:00H</td>

                        <td class="px__big">
                            <?php foreach ($schedule->types_of_services as $service) : ?>
                                <?= $service->name; ?>&nbsp;&nbsp;
                            <?php endforeach; ?>
                        </td>

                        <?php if ($schedule->finished != FinishedENUM::FINISHED) : ?>
                            <td class="actions">
                                <?php if ($this->AppView->visible('Schedules', 'finishedSchedule')) : ?>
                                    <div class="view">
                                        <?= $this->Html->link(__('<i class="fa-solid fa-check"></i> Finalizar'), ['controller' => 'Schedules', 'action' => 'finishedSchedule', $schedule->id], ['class' => 'action__view', 'escape' => false]); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->AppView->visible('Schedules', 'view')) : ?>
                                    <div class="view">
                                        <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Schedules', 'action' => 'view', $schedule->id], ['class' => 'action__view', 'escape' => false]); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->AppView->visible('Schedules', 'edit')) : ?>
                                    <div class="edit">
                                        <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Schedules', 'action' => 'edit', $schedule->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->AppView->visible('Schedules', 'delete')) : ?>
                                    <div class="delete">
                                        <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Schedules', 'action' => 'delete', $schedule->id], ['class' => 'action__delete sweetdelete', 'data-name' => 'o agendamento do dia ' . $schedule->date->format('d/m/Y'), 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o agendamento do dia {0}?', $schedule->date->format('d/m/Y'))]); ?>
                                    </div>
                                <?php endif; ?>

                                <nav class="primary-navigation nav__actions">
                                    <ul>
                                        <?php if (
                                            $this->AppView->visible('Schedules', 'finishedSchedule') ||
                                            $this->AppView->visible('Schedules', 'view') ||
                                            $this->AppView->visible('Schedules', 'edit') ||
                                            $this->AppView->visible('Schedules', 'delete')
                                        ) : ?>

                                            <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                                <ul class="dropdown">
                                                    <?php if ($this->AppView->visible('Schedules', 'finishedSchedule')) : ?>
                                                        <li><?= $this->Html->link(__('Finalizar'), ['controller' => 'Schedules', 'action' => 'finishedSchedule', $schedule->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('Schedules', 'view')) : ?>
                                                        <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Schedules', 'action' => 'view', $schedule->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('Schedules', 'edit')) : ?>
                                                        <li><?= $this->Html->link(__('Editar'), ['controller' => 'Schedules', 'action' => 'edit', $schedule->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('Schedules', 'delete')) : ?>
                                                        <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Schedules', 'action' => 'delete', $schedule->id], ['class' => 'header__link sweetdelete', 'data-name' => $schedule->date->format('d/m/Y'), 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o agendamento do dia {0}?', $schedule->date->format('d/m/Y'))]); ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </td>
                        <?php endif; ?>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <table class="custom__table table__empty">
            <thead>
                <tr>
                    <th>Nenhum agendamento encontrado!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($schedules)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
