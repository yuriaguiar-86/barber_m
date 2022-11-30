<section>
    <div class="subtitle__button">
        <h1>Dias de folga <small>cadastro</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysOfWork', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($daysOfWork, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row">
        <label>Data <span class="fields__required">*</span></label>
        <?= $this->Form->control('not_work', ['type' => 'text', 'placeholder' => '99/99/9999', 'label' => false, 'required', 'class' => 'calendar', 'autocomplete' => 'off']); ?>
    </div>

    <div class="row">
        <label>Descrição <span class="fields__required">*</span></label>
        <?= $this->Form->control('description', ['label' => false, 'placeholder' => 'Mensagem que será apresentada ao cliente na hora do agendamento...', 'required']); ?>
    </div>

    <?= $this->Form->button(__('Cadastrar'), ['class' => 'button__save']); ?>
    <?= $this->Form->end(); ?>
</section>

<?= $this->Html->script(['masks', 'datepicker']); ?>
