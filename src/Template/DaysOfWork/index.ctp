<section>
    <div class="subtitle__button">
        <h1>Dias de folga <small>listagem</small></h1>

        <?php if ($this->AppView->visible('DaysOfWork', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'DaysOfWork', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($daysOfWork)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th class="px__table">#</th>
                    <th>Dia da folga</th>
                    <th class="px__big">Descrição</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($daysOfWork as $day) : ?>
                    <tr>
                        <td class="px__table"><?= $this->Number->format($day->id) ?></td>
                        <td><?= $day->not_work->format('d/m/Y'); ?></td>
                        <td class="px__big"><?= !empty($day->description) ? $day->description : '-'; ?></td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('DaysOfWork', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'DaysOfWork', 'action' => 'view', $day->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('DaysOfWork', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'DaysOfWork', 'action' => 'edit', $day->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('DaysOfWork', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'DaysOfWork', 'action' => 'delete', $day->id], ['class' => 'action__delete sweetdelete', 'data-name' => $day->not_work->format('d/m/Y'), 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar a folga do dia {0}?', $day->not_work->format('d/m/Y'))]); ?>
                                </div>
                            <?php endif; ?>

                            <nav class="primary-navigation nav__actions">
                                <ul>
                                    <?php if (
                                        $this->AppView->visible('DaysOfWork', 'view') ||
                                        $this->AppView->visible('DaysOfWork', 'edit') ||
                                        $this->AppView->visible('DaysOfWork', 'delete')
                                    ) : ?>

                                        <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                            <ul class="dropdown">
                                                <?php if ($this->AppView->visible('DaysOfWork', 'view')) : ?>
                                                    <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'DaysOfWork', 'action' => 'view', $day->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('DaysOfWork', 'edit')) : ?>
                                                    <li><?= $this->Html->link(__('Editar'), ['controller' => 'DaysOfWork', 'action' => 'edit', $day->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('DaysOfWork', 'delete')) : ?>
                                                    <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'DaysOfWork', 'action' => 'delete', $day->id], ['class' => 'header__link sweetdelete', 'data-name' => $day->not_work->format('d/m/Y'), 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar a folga do dia {0}?', $day->not_work->format('d/m/Y'))]); ?></li>
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
