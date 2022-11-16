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
                    <th>#</th>
                    <th>Nome</th>
                    <th>Apelido</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($controllers as $controller) : ?>
                    <tr>
                        <td><?= $this->Number->format($controller->id) ?></td>
                        <td><?= $controller->name; ?></td>
                        <td><?= $controller->surname; ?></td>
                        <td><?= !empty($controller->description) ? $controller->description : '-'; ?></td>

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
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Controllers', 'action' => 'delete', $controller->id], ['class' => 'action__delete sweetdelete', 'data-name' => $controller->surname, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o controlador {0}?', $controller->surname)]); ?>
                                </div>
                            <?php endif; ?>
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
