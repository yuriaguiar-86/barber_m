<?php

use App\Controller\TypeRoleENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Agendamentos <small>visualização</small></h1>

        <div class="profile">
            <?php if ($this->AppView->visible('Schedules', 'finishedSchedule')) : ?>
                <p><?= $this->Html->link(__('Finalizar'), ['controller' => 'Schedules', 'action' => 'finishedSchedule', $schedule->id]); ?></p>
            <?php endif; ?>

            <?php if ($this->AppView->visible('Schedules', 'delete')) : ?>
                <?= $this->Form->postLink(__('Cancelar'), ['controller' => 'Schedules', 'action' => 'delete', $schedule->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => 'o agendamento do dia ' . $schedule->date->format('d/m/Y') . ' ás ' . $schedule->time . ':00H', 'confirm' => __('Tem certeza que deseja cancelar o agendamento do dia {0}?', $schedule->name)]); ?>
            <?php endif; ?>

            <?php if ($this->AppView->visible('Schedules', 'edit')) : ?>
                <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'Schedules', 'action' => 'edit', $schedule->id], ['class' => 'update']); ?></p>
            <?php endif; ?>

            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Schedules', 'action' => 'index']); ?></p>

            <nav class="primary-navigation nav__view">
                <ul>
                    <li><a href="#" class="header__link">Opções &dtrif;</a>
                        <ul class="dropdown">
                            <?php if ($this->AppView->visible('Schedules', 'finishedSchedule')) : ?>
                                <li><?= $this->Html->link(__('Atualizar'), ['controller' => 'Schedules', 'action' => 'finishedSchedule', $schedule->id], ['class' => 'header__link']); ?></li>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Schedules', 'delete')) : ?>
                                <li><?= $this->Form->postLink(__('Cancelar'), ['controller' => 'Schedules', 'action' => 'delete', $schedule->id], ['class' => 'header__link sweetdelete', 'data-name' => 'o agendamento do dia ' . $schedule->date->format('d/m/Y') . ' ás ' . $schedule->time . ':00H', 'confirm' => __('Tem certeza que deseja cancelar o agendamento do dia {0}?', $schedule->name)]); ?></li>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Schedules', 'edit')) : ?>
                                <li><?= $this->Html->link(__('Atualizar'), ['controller' => 'Schedules', 'action' => 'edit', $schedule->id], ['class' => 'header__link']); ?></li>
                            <?php endif; ?>

                            <li><?= $this->Html->link(__('Listagem'), ['controller' => 'Schedules', 'action' => 'index'], ['class' => 'header__link']); ?></li>
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
                <dd><?= $schedule->id; ?></dd>
            </div>

            <?php if ($user_logged->role->type != TypeRoleENUM::CLIENT) : ?>
                <div class="data__row">
                    <h4>Cliente</h4>
                    <dd><?= $client->name; ?></dd>
                </div>

                <div class="data__row">
                    <h4>Telefone</h4>
                    <dd><?= $client->personal_phone; ?></dd>
                </div>
            <?php endif; ?>

            <div class="data__row">
                <h4>Profissional</h4>
                <dd><?= $schedule->user->name; ?></dd>
            </div>

            <div class="data__row">
                <h4>Data e horário</h4>
                <dd><?= $schedule->date->format('d/m/Y') . ' ás ' . $schedule->time; ?>:00H</dd>
            </div>
        </dl>
    </div>

    <aside class="toghetter">
        <h2>Serviços</h2>

        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($schedule->types_of_services as $service) : ?>
                    <tr>
                        <td><?= $this->Number->format($service->id); ?></td>
                        <td><?= $service->name; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </aside>
</section>

<?= $this->Html->script('sweetalert'); ?>
