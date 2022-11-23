<section>
    <div class="subtitle__button">
        <h1>Usuários <small>listagem</small></h1>

        <?php if ($this->AppView->visible('Users', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'Users', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($users)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th class="px__table">#</th>
                    <th>Nome</th>
                    <th class="px__table">E-mail</th>
                    <th class="px__phone">Telefone</th>
                    <th class="px__big">Tipo de perfil</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td class="px__table"><?= $this->Number->format($user->id) ?></td>
                        <td><?= $user->name; ?></td>
                        <td class="px__table"><?= $user->email; ?></td>
                        <td class="px__phone"><?= $user->personal_phone; ?></td>
                        <td class="px__big"><?= $user->role->name; ?></td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('Users', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Users', 'action' => 'view', $user->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Users', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Users', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class' => 'action__delete sweetdelete', 'data-name' => $user->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o usuário {0}?', $user->name)]); ?>
                                </div>
                            <?php endif; ?>

                            <nav class="primary-navigation nav__actions">
                                <ul>
                                    <?php if (
                                        $this->AppView->visible('Users', 'view') ||
                                        $this->AppView->visible('Users', 'edit') ||
                                        $this->AppView->visible('Users', 'delete')
                                    ) : ?>

                                        <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                            <ul class="dropdown">
                                                <?php if ($this->AppView->visible('Users', 'view')) : ?>
                                                    <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Users', 'action' => 'view', $user->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Users', 'edit')) : ?>
                                                    <li><?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Users', 'delete')) : ?>
                                                    <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class' => 'header__link sweetdelete', 'data-name' => $user->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o usuário {0}?', $user->name)]); ?></li>
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
                    <th>Nenhum usuário encontrado!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($users)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
