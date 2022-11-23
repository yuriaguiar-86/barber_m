<section>
    <div class="subtitle__button">
        <h1>Horários <small>listagem</small></h1>

        <?php if ($this->AppView->visible('OpeningHours', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'OpeningHours', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($openingHours)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th class="px__table">#</th>
                    <th>Horário</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($openingHours as $openingHour) : ?>
                    <tr>
                        <td class="px__table"><?= $this->Number->format($openingHour->id) ?></td>
                        <td><?= $openingHour->time_of_week; ?>:00H</td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('OpeningHours', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'OpeningHours', 'action' => 'view', $openingHour->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('OpeningHours', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'OpeningHours', 'action' => 'edit', $openingHour->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('OpeningHours', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'OpeningHours', 'action' => 'delete', $openingHour->id], ['class' => 'action__delete sweetdelete', 'data-name' => $openingHour->time_of_week, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o horário {0}?', $openingHour->time_of_week)]); ?>
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
                                                    <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'OpeningHours', 'action' => 'view', $openingHour->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('OpeningHours', 'edit')) : ?>
                                                    <li><?= $this->Html->link(__('Editar'), ['controller' => 'OpeningHours', 'action' => 'edit', $openingHour->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('OpeningHours', 'delete')) : ?>
                                                    <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'OpeningHours', 'action' => 'delete', $openingHour->id], ['class' => 'header__link sweetdelete', 'data-name' => $openingHour->time_of_week, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o horário {0}?', $openingHour->time_of_week)]); ?></li>
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
        <p class="values__empty">Nenhum horário encontrado!</p>
    <?php endif; ?>

    <?php if (!empty($openingHours)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
