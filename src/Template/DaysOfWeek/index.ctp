<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>listagem</small></h1>

        <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'DaysOfWeek', 'action' => 'add']); ?></p>
    </div>

    <?php if (!empty($daysOfWeek)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Horários de funcionamento</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daysOfWeek as $day) : ?>
                <tr>
                    <td><?= $this->Number->format($day->id) ?></td>
                    <td><?= $day->name; ?></td>

                    <td>
                        <?php foreach ($day->times_of_day as $clock) : ?>
                            <?= $clock->time; ?>:00H &nbsp;&nbsp;
                        <?php endforeach; ?>
                    </td>

                    <td class="actions">
                        <div class="view">
                            <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'DaysOfWeek', 'action' => 'view', $day->id], ['class' => 'action__view', 'escape' => false]); ?>
                        </div>
                        <div class="edit">
                            <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'DaysOfWeek', 'action' => 'edit', $day->id], ['class' => 'action__edit', 'escape' => false]); ?>
                        </div>
                        <div class="delete">
                            <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'DaysOfWeek', 'action' => 'delete', $day->id], ['class' => 'action__delete sweetdelete', 'data-name' => $day->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja dia da semana {0}?', $day->name)]); ?>
                        </div>
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

    <?php if (!empty($daysOfWeek)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
