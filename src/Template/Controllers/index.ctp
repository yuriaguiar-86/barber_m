<section>
    <div class="subtitle__button">
        <h1>Controladores <small>listagem</small></h1>

        <?php if ($this->AppView->visible('Controllers', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'Controllers', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($controllers)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th class="px__table">#</th>
                    <th class="px__phone">Nome</th>
                    <th>Apelido</th>
                    <th class="px__big">Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($controllers as $controller) : ?>
                    <tr>
                        <td class="px__table"><?= $this->Number->format($controller->id) ?></td>
                        <td class="px__phone"><?= $controller->name; ?></td>
                        <td><?= $controller->surname; ?></td>
                        <td class="px__big"><?= !empty($controller->description) ? mb_strimwidth($controller->description, 0, 50, '...') : '-'; ?></td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('Controllers', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Controllers', 'action' => 'view', $controller->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Controllers', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Controllers', 'action' => 'edit', $controller->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Controllers', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Controllers', 'action' => 'delete', $controller->id], ['class' => 'action__delete sweetdelete', 'data-name' => 'o controlador '.$controller->surname, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o controlador {0}?', $controller->surname)]); ?>
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
                                                    <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Controllers', 'action' => 'view', $controller->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Controllers', 'edit')) : ?>
                                                    <li><?= $this->Html->link(__('Editar'), ['controller' => 'Controllers', 'action' => 'edit', $controller->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Controllers', 'delete')) : ?>
                                                    <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Controllers', 'action' => 'delete', $controller->id], ['class' => 'header__link sweetdelete', 'data-name' => 'o controlador '.$controller->surname, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o controlador {0}?', $controller->surname)]); ?></li>
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
        <p class="values__empty">Nenhum controlador encontrado!</p>
    <?php endif; ?>

    <?php if (!empty($controllers)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
