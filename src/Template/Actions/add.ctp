<section>
    <div class="subtitle__button">
        <h1>Funcionalidades <small>cadastro</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Actions', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($action, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row">
        <label>Nome <span class="fields__required">*</span></label>
        <?= $this->Form->control('action_map', ['label' => false, 'required', 'autocomplete' => 'off']); ?>
    </div>

    <div class="more__fields">
        <div class="row right">
            <label>Apelido <span class="fields__required">*</span></label>
            <?= $this->Form->control('surname', ['label' => false, 'required', 'autocomplete' => 'off']); ?>
        </div>
        <div class="row">
            <label>Controlador <span class="fields__required">*</span></label>
            <?= $this->Form->control('controller_id', ['options' => $controllers, 'label' => false, 'required']); ?>
        </div>
    </div>

    <div class="row">
        <label>Descrição</label>
        <?= $this->Form->control('description', ['label' => false]); ?>
    </div>

    <?= $this->Form->button(__('Cadastrar'), ['class' => 'button__save']); ?>
    <?= $this->Form->end(); ?>
</section>
