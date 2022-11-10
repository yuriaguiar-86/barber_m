<section>
    <div class="subtitle__button">
        <h1>Horários de funcionamento <small>edição</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'TimesOfDay', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($timesOfDay, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row">
        <label>Horário <span class="fields__required">*</span></label>
        <?= $this->Form->control('time', ['label' => false, 'required']); ?>
    </div>

    <?= $this->Form->button(__('Atualizar'), ['class' => 'button__edit']); ?>
    <?= $this->Form->end(); ?>
</section>
