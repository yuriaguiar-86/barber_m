<section>
    <div class="subtitle__button">
        <h1>Tipos de serviços <small>listagem</small></h1>

        <?php if ($this->AppView->visible('TypesOfServices', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'TypesOfServices', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($typesOfServices)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($typesOfServices as $service) : ?>
                    <tr>
                        <td><?= $this->Number->format($service->id); ?></td>
                        <td><?= $service->name; ?></td>
                        <td>R$ <?= $service->price; ?>,00</td>
                        <td><?= !empty($service->description) ? $service->description : '-'; ?></td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('TypesOfServices', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'TypesOfServices', 'action' => 'view', $service->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('TypesOfServices', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'TypesOfServices', 'action' => 'edit', $service->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('TypesOfServices', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'TypesOfServices', 'action' => 'delete', $service->id], ['class' => 'action__delete sweetdelete', 'data-name' => $service->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o tipo de serviço {0}?', $service->name)]); ?>
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
                    <th>Nenhum tipo de serviço encontrado!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($typesOfPayments)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
