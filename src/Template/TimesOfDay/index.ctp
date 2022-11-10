<section>
    <div class="subtitle__button">
        <h1>Horários de funcionamento <small>listagem</small></h1>

        <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'TimesOfDay', 'action' => 'add']); ?></p>
    </div>

    <?php if (!empty($timesOfDay)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Horário</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($timesOfDay as $clock) : ?>
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
                            <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'TimesOfDay', 'action' => 'delete', $clock->id], ['class' => 'action__delete sweetdelete', 'data-name' => $clock->time, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o horário {0}?', $clock->time)]); ?>
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
                    <th>Nenhum horário de funcionamento encontrado!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($timesOfDay)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
