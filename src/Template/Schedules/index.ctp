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
                    <th>#</th>
                    <th>Profissional</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Serviços</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($schedules as $schedule) : ?>
                    <tr>
                        <td><?= $this->Number->format($schedule->id) ?></td>
                        <td><?= $schedule->employee_id; ?></td>
                        <td><?= $schedule->date->format('d/m/Y'); ?></td>
                        <td><?= $schedule->time; ?>:00H</td>
                        <td><?= $schedule->services; ?></td>

                        <td class="actions">
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
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Schedules', 'action' => 'delete', $schedule->id], ['class' => 'action__delete sweetdelete', 'data-name' => $schedule->date->format('d/m/Y'), 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o agendamento do dia {0}?', $schedule->date->format('d/m/Y'))]); ?>
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
