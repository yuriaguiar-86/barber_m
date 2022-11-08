<section>
    <div class="subtitle__button">
        <h1>Controladores <small>listagem</small></h1>

        <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'Controllers', 'action' => 'add']); ?></p>
    </div>

    <?php if (!empty($controllers)) : ?>
        <?php foreach ($controllers as $controller) : ?>
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
                        <td><?= $this->Number->format($controller->id) ?></td>
                        <td><?= $controller->name; ?></td>
                        <td><?= $controller->surname; ?></td>
                        <td><?= !empty($controller->description) ? $controller->description : '-'; ?></td>

                        <td class="actions">
                        <div class="view"><?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Controllers', 'action' => 'add'], ['class' => 'action__view', 'escape' => false]); ?></div>
                        <div class="edit"><?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Controllers', 'action' => 'edit'], ['class' => 'action__view', 'escape' => false]); ?></div>
                        <div class="delete"><?= $this->Html->link(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Controllers', 'action' => 'delete'], ['class' => 'action__view', 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o controlador {0}?', $controller->name)]); ?></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
    <?php else : ?>
        <table class="custom__table table__empty">
            <thead>
                <tr>
                    <th>Nenhum controlador encontrado!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($controllers)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>
