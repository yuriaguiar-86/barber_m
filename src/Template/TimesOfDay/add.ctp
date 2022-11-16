<section>
    <div class="subtitle__button">
        <h1>Horários <small>cadastro</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'TimesOfDay', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($timesOfDay, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row right">
        <label>Hora <span class="fields__required">*</span></label>
        <?= $this->Form->control('time', ['label' => false, 'required']); ?>
    </div>

    <?= $this->Form->button(__('Cadastrar'), ['class' => 'button__save']); ?>
    <?= $this->Form->end(); ?>
</section>
