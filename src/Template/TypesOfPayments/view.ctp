<section>
    <div class="subtitle__button">
        <h1>Tipos de pagamentos <small>visualização</small></h1>

        <div class="profile">
            <?php if ($this->AppView->visible('TypesOfPayments', 'delete')) : ?>
                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'TypesOfPayments', 'action' => 'delete', $typesOfPayment->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => 'o tipo de pagamento '.$typesOfPayment->name, 'confirm' => __('Tem certeza que deseja apagar o pagamento {0}?', $typesOfPayment->name)]); ?>
            <?php endif; ?>

            <?php if ($this->AppView->visible('TypesOfPayments', 'edit')) : ?>
                <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'TypesOfPayments', 'action' => 'edit', $typesOfPayment->id], ['class' => 'update']); ?></p>
            <?php endif; ?>

            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'TypesOfPayments', 'action' => 'index']); ?></p>

            <nav class="primary-navigation nav__view">
                <ul>
                    <li><a href="#" class="header__link">Opções &dtrif;</a>
                        <ul class="dropdown">
                            <?php if ($this->AppView->visible('TypesOfPayments', 'delete')) : ?>
                                <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'TypesOfPayments', 'action' => 'delete', $typesOfPayment->id], ['class' => 'header__link sweetdelete', 'data-name' => 'o tipo de pagamento '.$typesOfPayment->name, 'confirm' => __('Tem certeza que deseja apagar o pagamento {0}?', $typesOfPayment->name)]); ?></li>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('TypesOfPayments', 'edit')) : ?>
                                <li><?= $this->Html->link(__('Atualizar'), ['controller' => 'TypesOfPayments', 'action' => 'edit', $typesOfPayment->id], ['class' => 'header__link']); ?></li>
                            <?php endif; ?>

                            <li><?= $this->Html->link(__('Listagem'), ['controller' => 'TypesOfPayments', 'action' => 'index'], ['class' => 'header__link']); ?></li>
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
                <dd><?= $typesOfPayment->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Nome</h4>
                <dd><?= $typesOfPayment->name; ?></dd>
            </div>

            <div class="data__row">
                <h4>Descrição</h4>
                <dd><?= !empty($typesOfPayment->description) ? $typesOfPayment->description : '-'; ?></dd>
            </div>
        </dl>
    </div>
</section>

<?= $this->Html->script('sweetalert'); ?>
