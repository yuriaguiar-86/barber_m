<section>
    <div class="subtitle__button">
        <h1>Tipos de pagamentos <small>listagem</small></h1>

        <?php if ($this->AppView->visible('TypesOfPayments', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'TypesOfPayments', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($typesOfPayments)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th class="px__table">#</th>
                    <th>Nome</th>
                    <th class="px__big">Descrição</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($typesOfPayments as $payment) : ?>
                    <tr>
                        <td class="px__table"><?= $this->Number->format($payment->id); ?></td>
                        <td><?= $payment->name; ?></td>
                        <td class="px__big"><?= !empty($payment->description) ? mb_strimwidth($payment->description, 0, 50, '...') : '-'; ?></td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('TypesOfPayments', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'TypesOfPayments', 'action' => 'view', $payment->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('TypesOfPayments', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'TypesOfPayments', 'action' => 'edit', $payment->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('TypesOfPayments', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'TypesOfPayments', 'action' => 'delete', $payment->id], ['class' => 'action__delete sweetdelete', 'data-name' => $payment->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o tipo de pagamento {0}?', $payment->name)]); ?>
                                </div>
                            <?php endif; ?>

                            <nav class="primary-navigation nav__actions">
                                <ul>
                                    <?php if (
                                        $this->AppView->visible('TypesOfPayments', 'view') ||
                                        $this->AppView->visible('TypesOfPayments', 'edit') ||
                                        $this->AppView->visible('TypesOfPayments', 'delete')
                                    ) : ?>

                                        <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                            <ul class="dropdown">
                                                <?php if ($this->AppView->visible('TypesOfPayments', 'view')) : ?>
                                                    <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'TypesOfPayments', 'action' => 'view', $payment->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('TypesOfPayments', 'edit')) : ?>
                                                    <li><?= $this->Html->link(__('Editar'), ['controller' => 'TypesOfPayments', 'action' => 'edit', $payment->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('TypesOfPayments', 'delete')) : ?>
                                                    <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'TypesOfPayments', 'action' => 'delete', $payment->id], ['class' => 'header__link sweetdelete', 'data-name' => $payment->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o tipo de pagamento {0}?', $payment->name)]); ?></li>
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
                    <th>Nenhum tipo de pagamento encontrado!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($typesOfPayments)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
