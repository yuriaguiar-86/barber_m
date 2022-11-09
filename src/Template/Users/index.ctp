<section>
    <div class="subtitle__button">
        <h1>Usuários <small>listagem</small></h1>

        <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'Users', 'action' => 'add']); ?></p>
    </div>

    <?php if (!empty($users)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Tipo de perfil</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->personal_phone; ?></td>
                    <td><?= $user->role->name; ?></td>

                    <td class="actions">
                        <div class="view">
                            <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Users', 'action' => 'view', $user->id], ['class' => 'action__view', 'escape' => false]); ?>
                        </div>
                        <div class="edit">
                            <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Users', 'action' => 'edit', $user->id], ['class' => 'action__edit', 'escape' => false]); ?>
                        </div>
                        <div class="delete">
                            <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['class' => 'action__delete sweetdelete', 'data-name' => $user->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o usuário {0}?', $user->name)]); ?>
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
