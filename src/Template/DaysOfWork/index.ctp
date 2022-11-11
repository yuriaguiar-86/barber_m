<section>
    <div class="subtitle__button">
        <h1>Dias de folga <small>listagem</small></h1>

        <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'DaysOfWork', 'action' => 'add']); ?></p>
    </div>

    <?php if (!empty($daysOfWork)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Dia da folga</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daysOfWork as $day) : ?>
                <tr>
                    <td><?= $this->Number->format($day->id) ?></td>
                    <td><?= $day->not_work->format('d/m/Y'); ?></td>
                    <td><?= !empty($day->description) ? $day->description : '-'; ?></td>

                    <td class="actions">
                        <div class="view">
                            <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'DaysOfWork', 'action' => 'view', $day->id], ['class' => 'action__view', 'escape' => false]); ?>
                        </div>
                        <div class="edit">
                            <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'DaysOfWork', 'action' => 'edit', $day->id], ['class' => 'action__edit', 'escape' => false]); ?>
                        </div>
                        <div class="delete">
                            <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'DaysOfWork', 'action' => 'delete', $day->id], ['class' => 'action__delete sweetdelete', 'data-name' => $day->not_work->format('d/m/Y'), 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar a folga do dia {0}?', $day->not_work->format('d/m/Y'))]); ?>
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
                    <th>Nenhum dia de folga encontrado!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($daysOfWork)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
