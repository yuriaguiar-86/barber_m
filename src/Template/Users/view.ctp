<section>
    <div class="subtitle__button">
        <h1>Usuários <small>visualização</small></h1>

        <div class="profile">
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => $user->name, 'confirm' => __('Tem certeza que deseja apagar o usuário {0}?', $user->name)]); ?>
            <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'update']); ?></p>
            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Users', 'action' => 'index']); ?></p>

            <nav class="primary-navigation nav__view">
                <ul>
                    <li><a href="#" class="header__link">Opções &dtrif;</a>
                        <ul class="dropdown">
                            <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class' => 'header__link sweetdelete', 'data-name' => $user->surname, 'confirm' => __('Tem certeza que deseja apagar o usuário {0}?', $user->surname)]); ?></li>
                            <li><?= $this->Html->link(__('Atualizar'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'header__link']); ?></li>
                            <li><?= $this->Html->link(__('Listagem'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $user->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Usuário</h4>
                <dd><?= $user->username; ?></dd>
            </div>

            <div class="data__row">
                <h4>Nome</h4>
                <dd><?= $user->name; ?></dd>
            </div>

            <div class="data__row">
                <h4>E-mail</h4>
                <dd><?= $user->email; ?></dd>
            </div>

            <div class="data__row">
                <h4>Telefone</h4>
                <dd><?= $user->personal_phone; ?></dd>
            </div>

            <div class="data__row">
                <h4>Outro telefone</h4>
                <dd><?= !empty($user->other_phone) ? $user->other_phone : '-'; ?></dd>
            </div>

            <div class="data__row">
                <h4>Tipo de permissão</h4>
                <dd><?= $user->role->name; ?></dd>
            </div>

            <div class="data__row">
                <h4>Data do cadastro</h4>
                <dd><?= $user->created->format('d/m/Y H:m:s'); ?></dd>
            </div>

            <div class="data__row">
                <h4>Data de atualização</h4>
                <dd><?= $user->modified->format('d/m/Y H:m:s'); ?></dd>
            </div>
        </dl>
    </div>

    <aside class="toghetter">
        <h2>Agendamentos</h2>

        <?php if (!empty($user->schedules)) : ?>
            <table class="custom__table">
                <thead>
                    <tr>
                        <th class="px__table">#</th>
                        <th class="px__table">Funcionário</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th class="px__big">Pagamento</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($user->schedules as $schedule) : ?>
                        <tr>
                            <td class="px__table"><?= $this->Number->format($schedule->id) ?></td>
                            <td class="px__table"><?= $schedule->user->name; ?></td>
                            <td><?= $schedule->date->format('d/m/Y'); ?></tdlass=>
                            <td><?= $schedule->time; ?>:00H</td>
                            <td class="px__big"><?= $schedule->types_of_payment->name; ?></td>

                            <td class="actions">
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Schedules', 'action' => 'view', $schedule->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Schedules', 'action' => 'edit', $schedule->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Schedules', 'action' => 'delete', $schedule->id], ['class' => 'action__delete sweetdelete', 'data-name' => $user->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o agendamento do {0}?', $user->name)]); ?>
                                </div>

                                <nav class="primary-navigation nav__actions">
                                    <ul>
                                        <?php if (
                                            $this->AppView->visible('Schedules', 'view') ||
                                            $this->AppView->visible('Schedules', 'edit') ||
                                            $this->AppView->visible('Schedules', 'delete')
                                        ) : ?>

                                            <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                                <ul class="dropdown">
                                                    <?php if ($this->AppView->visible('Schedules', 'view')) : ?>
                                                        <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Schedules', 'action' => 'view', $user->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('Schedules', 'edit')) : ?>
                                                        <li><?= $this->Html->link(__('Editar'), ['controller' => 'Schedules', 'action' => 'edit', $user->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('Schedules', 'delete')) : ?>
                                                        <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Schedules', 'action' => 'delete', $user->id], ['class' => 'header__link sweetdelete', 'data-name' => $user->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o agendamento do {0}?', $user->name)]); ?></li>
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
            <p class="values__empty">Nenhuma agedamento realizado!</p>
        <?php endif; ?>
    </aside>
</section>

<?= $this->Html->script('sweetalert'); ?>
