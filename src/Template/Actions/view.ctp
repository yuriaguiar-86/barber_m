<section>
    <div class="subtitle__button">
        <h1>Funcionalidades <small>visualização</small></h1>

        <div class="profile">
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Actions', 'action' => 'delete', $action->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => $action->surname, 'confirm' => __('Tem certeza que deseja apagar a funcionalidade {0}?', $action->surname)]); ?>
            <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'Actions', 'action' => 'edit', $action->id], ['class' => 'update']); ?></p>
            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Actions', 'action' => 'index']); ?></p>
        </div>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $action->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Nome</h4>
                <dd><?= $action->action_map; ?></dd>
            </div>

            <div class="data__row">
                <h4>Apelido</h4>
                <dd><?= $action->surname; ?></dd>
            </div>

            <div class="data__row">
                <h4>Descrição</h4>
                <dd><?= !empty($action->description) ? $action->description : '-'; ?></dd>
            </div>
        </dl>
    </div>

    <aside class="toghetter">
        <h2>Controlador</h2>

        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Apelido</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?= $this->Number->format($action->controller->id) ?></td>
                    <td><?= $action->controller->name; ?></td>
                    <td><?= $action->controller->surname; ?></td>
                    <td><?= !empty($action->controller->description) ? $action->controller->description : '-'; ?></td>

                    <td class="actions">
                        <div class="view">
                            <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Controllers', 'action' => 'view', $action->controller->id], ['class' => 'action__view', 'escape' => false]); ?>
                        </div>
                        <div class="edit">
                            <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Controllers', 'action' => 'edit', $action->controller->id], ['class' => 'action__edit', 'escape' => false]); ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </aside>

    <aside class="toghetter">
        <h2>Tipos de perfis</h2>

        <?php if (!empty($action->roles)) : ?>
            <table class="custom__table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Permissão</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($action->roles as $role) : ?>
                        <tr>
                            <td><?= $this->Number->format($role->id) ?></td>
                            <td><?= $role->name; ?></td>
                            <td><?= $role->type; ?></td>
                            <td><?= !empty($role->description) ? $role->description : '-'; ?></td>

                            <td class="actions">
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Controllers', 'action' => 'view', $role->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Controllers', 'action' => 'edit', $role->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="values__empty">Nenhum tipo de perfil vinculado!</p>
        <?php endif; ?>
    </aside>
</section>

<?= $this->Html->script('sweetalert'); ?>
