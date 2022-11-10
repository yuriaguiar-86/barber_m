<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>visualização</small></h1>

        <div class="profile">
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'DaysOfWeek', 'action' => 'delete', $daysOfWeek->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => $daysOfWeek->name, 'confirm' => __('Tem certeza que deseja apagar o dia da semana {0}?', $daysOfWeek->name)]); ?>
            <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'DaysOfWeek', 'action' => 'edit', $daysOfWeek->id], ['class' => 'update']); ?></p>
            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysOfWeek', 'action' => 'index']); ?></p>
        </div>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $daysOfWeek->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Nome</h4>
                <dd><?= $daysOfWeek->name; ?></dd>
            </div>
        </dl>
    </div>

    <aside class="toghetter">
        <h2>Horários de funcionamento</h2>

        <?php if (!empty($daysOfWeek->times_of_day)) : ?>
            <table class="custom__table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Horário</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($daysOfWeek->times_of_day as $clock) : ?>
                        <tr>
                            <td><?= $this->Number->format($clock->id) ?></td>
                            <td><?= $clock->time; ?>:00H</td>

                            <td class="actions">
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'TimesOfDay', 'action' => 'view', $clock->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'TimesOfDay', 'action' => 'edit', $clock->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'TimesOfDay', 'action' => 'delete', $clock->id], ['class' => 'action__delete sweetdelete', 'data-name' => $clock->time, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o horário {0}?', $clock->id)]); ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="values__empty">Nenhum horário de funcioamento vinculada!</p>
        <?php endif; ?>
    </aside>
</section>

<?= $this->Html->script('sweetalert'); ?>
