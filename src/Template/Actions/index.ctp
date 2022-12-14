<section>
    <div class="subtitle__button">
        <h1>Funcionalidades <small>listagem</small></h1>

        <div class="filter__and__add">
            <?= $this->element('filter'); ?>

            <?php if ($this->AppView->visible('Actions', 'add')) : ?>
                <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'Actions', 'action' => 'add']); ?></p>
            <?php endif; ?>
        </div>
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
                        <td class="px__big"><?= !empty($action->description) ? mb_strimwidth($action->description, 0, 50, '...') : '-'; ?></td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('Actions', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Actions', 'action' => 'view', $action->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Actions', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Actions', 'action' => 'edit', $action->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Actions', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Actions', 'action' => 'delete', $action->id], ['class' => 'action__delete sweetdelete', 'data-name' => 'a funcionalidade ' . $action->surname, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar a funcionalidade {0}?', $action->surname)]); ?>
                                </div>
                            <?php endif; ?>

                            <nav class="primary-navigation nav__actions">
                                <ul>
                                    <?php if (
                                        $this->AppView->visible('Actions', 'view') ||
                                        $this->AppView->visible('Actions', 'edit') ||
                                        $this->AppView->visible('Actions', 'delete')
                                    ) : ?>

                                        <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                            <ul class="dropdown">
                                                <?php if ($this->AppView->visible('Actions', 'view')) : ?>
                                                    <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Actions', 'action' => 'view', $action->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Actions', 'edit')) : ?>
                                                    <li><?= $this->Html->link(__('Editar'), ['controller' => 'Actions', 'action' => 'edit', $action->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Actions', 'delete')) : ?>
                                                    <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Actions', 'action' => 'delete', $action->id], ['class' => 'header__link sweetdelete', 'data-name' => 'a funcionalidade ' . $action->surname, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar a funcionalidade {0}?', $action->surname)]); ?></li>
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
