<section>
    <div class="subtitle__button">
        <h1>Funcionalidades <small>listagem</small></h1>

        <?php if ($this->AppView->visible('Controllers', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'Actions', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($actions)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th class="px__table">#</th>
                    <th class="px__phone">Nome</th>
                    <th>Apelido</th>
                    <th class="px__table">Controlador</th>
                    <th class="px__big">Descrição</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($actions as $action) : ?>
                    <tr>
                        <td class="px__table"><?= $this->Number->format($action->id) ?></td>
                        <td class="px__phone"><?= $action->action_map; ?></td>
                        <td><?= $action->surname; ?></td>
                        <td class="px__table"><?= $action->controller->name; ?></td>
                        <td class="px__big"><?= !empty($action->description) ? $action->description : '-'; ?></td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('Controllers', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Actions', 'action' => 'view', $action->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Controllers', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Actions', 'action' => 'edit', $action->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Controllers', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Actions', 'action' => 'delete', $action->id], ['class' => 'action__delete sweetdelete', 'data-name' => $action->surname, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar a funcionalidade {0}?', $action->surname)]); ?>
                                </div>
                            <?php endif; ?>

                            <nav class="primary-navigation nav__actions">
                                <ul>
                                    <?php if (
                                        $this->AppView->visible('Controllers', 'view') ||
                                        $this->AppView->visible('Controllers', 'edit') ||
                                        $this->AppView->visible('Controllers', 'delete')
                                    ) : ?>

                                        <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                            <ul class="dropdown">
                                                <?php if ($this->AppView->visible('Controllers', 'view')) : ?>
                                                    <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Controllers', 'action' => 'view', $action->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Controllers', 'edit')) : ?>
                                                    <li><?= $this->Html->link(__('Editar'), ['controller' => 'Controllers', 'action' => 'edit', $action->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Controllers', 'delete')) : ?>
                                                    <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Controllers', 'action' => 'delete', $action->id], ['class' => 'header__link sweetdelete', 'data-name' => $action->surname, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar a funcionalidade {0}?', $action->surname)]); ?></li>
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
                    <th>Nenhuma funcionalidade encontrada!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($actions)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
