<section>
    <div class="subtitle__button">
        <h1>Meu perfil <small>trocar senha</small></h1>

        <p><?= $this->Html->link(__('Meu perfil'), ['controller' => 'Users', 'action' => 'profile']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($user, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="more__fields">
        <div class="row right">
            <label>Nova senha <span class="fields__required">*</span></label>
            <?= $this->Form->control('password', ['value' => '', 'label' => false, 'required', 'placeholder' => 'No mínimo 06 caracteres']); ?>
        </div>
        <div class="row">
            <label>Confirmação de senha <span class="fields__required">*</span></label>
            <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => false, 'required', 'placeholder' => 'Digite a mesma senha']); ?>
        </div>
    </div>

    <?= $this->Form->button(__('Atualizar'), ['class' => 'button__edit']); ?>
    <?= $this->Form->end(); ?>
</section>

<?= $this->Html->script(['users', 'masks']); ?>
