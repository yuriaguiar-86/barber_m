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
                    <th>#</th>
                    <th>Nome</th>
                    <th>Apelido</th>
                    <th>Controlador</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($actions as $action) : ?>
                    <tr>
                        <td><?= $this->Number->format($action->id) ?></td>
                        <td><?= $action->action_map; ?></td>
                        <td><?= $action->surname; ?></td>
                        <td><?= $action->controller->name; ?></td>
                        <td><?= !empty($action->description) ? $action->description : '-'; ?></td>

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
