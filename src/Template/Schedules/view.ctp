<?php

use App\Controller\TypeRoleENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Agendamentos <small>visualização</small></h1>

        <div class="profile">
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Schedules', 'action' => 'delete', $schedule->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => $schedule->date->format('d/m/Y'), 'confirm' => __('Tem certeza que deseja apagar o agendamento do dia {0}?', $schedule->name)]); ?>
            <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'Schedules', 'action' => 'edit', $schedule->id], ['class' => 'update']); ?></p>
            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Schedules', 'action' => 'index']); ?></p>
        </div>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $schedule->id; ?></dd>
            </div>

            <?php if($user_logged->role->type != TypeRoleENUM::CLIENT): ?>
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

            <div class="data__row">
                <h4>Forma de pagamento</h4>
                <dd><?= $schedule->types_of_payment->name; ?></dd>
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
                        <td><?= $this->Number->format($service->id) ?></td>
                        <td><?= $service->name; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </aside>
</section>

<?= $this->Html->script('sweetalert'); ?>
