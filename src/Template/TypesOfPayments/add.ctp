<section>
    <div class="subtitle__button">
        <h1>Tipos de pagamentos <small>cadastro</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'TypesOfPayments', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($typesOfPayment, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row">
        <label>Nome <span class="fields__required">*</span></label>
        <?= $this->Form->control('name', ['label' => false, 'required', 'autocomplete' => 'off']); ?>
    </div>

    <div class="row">
        <label>Descrição</label>
        <?= $this->Form->control('description', ['label' => false]); ?>
    </div>

    <?= $this->Form->button(__('Cadastrar'), ['class' => 'button__save']); ?>
    <?= $this->Form->end(); ?>
</section>
