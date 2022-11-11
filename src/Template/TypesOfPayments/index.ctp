<section>
    <div class="subtitle__button">
        <h1>Tipos de pagamentos <small>listagem</small></h1>

        <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'TypesOfPayments', 'action' => 'add']); ?></p>
    </div>

    <?php if (!empty($typesOfPayments)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($typesOfPayments as $payment) : ?>
                <tr>
                    <td><?= $this->Number->format($payment->id); ?></td>
                    <td><?= $payment->name; ?></td>
                    <td><?= !empty($payment->description) ? $payment->description : '-'; ?></td>

                    <td class="actions">
                        <div class="view">
                            <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'TypesOfPayments', 'action' => 'view', $payment->id], ['class' => 'action__view', 'escape' => false]); ?>
                        </div>
                        <div class="edit">
                            <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'TypesOfPayments', 'action' => 'edit', $payment->id], ['class' => 'action__edit', 'escape' => false]); ?>
                        </div>
                        <div class="delete">
                            <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'TypesOfPayments', 'action' => 'delete', $payment->id], ['class' => 'action__delete sweetdelete', 'data-name' => $payment->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o tipo de pagamento {0}?', $payment->name)]); ?>
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
