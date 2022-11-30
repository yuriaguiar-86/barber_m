<section>
    <div class="subtitle__button">
        <h1>Tipos de serviços <small>visualização</small></h1>

        <div class="profile">
            <?php if ($this->AppView->visible('TypesOfServices', 'delete')) : ?>
                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'TypesOfServices', 'action' => 'delete', $typesOfService->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => 'o serviço '.$typesOfService->name, 'confirm' => __('Tem certeza que deseja apagar o serviço {0}?', $typesOfService->name)]); ?>
            <?php endif; ?>

            <?php if ($this->AppView->visible('TypesOfServices', 'edit')) : ?>
                <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'TypesOfServices', 'action' => 'edit', $typesOfService->id], ['class' => 'update']); ?></p>
            <?php endif; ?>

            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'TypesOfServices', 'action' => 'index']); ?></p>

            <nav class="primary-navigation nav__view">
                <ul>
                    <li><a href="#" class="header__link">Opções &dtrif;</a>
                        <ul class="dropdown">
                            <?php if ($this->AppView->visible('TypesOfServices', 'delete')) : ?>
                                <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'TypesOfServices', 'action' => 'delete', $typesOfService->id], ['class' => 'header__link sweetdelete', 'data-name' => 'o serviço '.$typesOfService->name, 'confirm' => __('Tem certeza que deseja apagar o serviço {0}?', $typesOfService->name)]); ?></li>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('TypesOfServices', 'edit')) : ?>
                                <li><?= $this->Html->link(__('Atualizar'), ['controller' => 'TypesOfServices', 'action' => 'edit', $typesOfService->id], ['class' => 'header__link']); ?></li>
                            <?php endif; ?>

                            <li><?= $this->Html->link(__('Listagem'), ['controller' => 'TypesOfServices', 'action' => 'index'], ['class' => 'header__link']); ?></li>
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
                <dd><?= $typesOfService->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Nome</h4>
                <dd><?= $typesOfService->name; ?></dd>
            </div>

            <div class="data__row">
                <h4>Preço</h4>
                <dd>R$ <?= $typesOfService->price; ?>,00</dd>
            </div>

            <div class="data__row">
                <h4>Descrição</h4>
                <dd><?= !empty($typesOfService->description) ? $typesOfService->description : '-'; ?></dd>
            </div>
        </dl>
    </div>
</section>

<?= $this->Html->script('sweetalert'); ?>
