<section class="containner">
    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($client); ?>

    <div class="row">
        <label>Nome</label>
        <?= $this->Form->control('name', ['label' => false, 'required']); ?>
    </div>

    <div class="row">
        <label>E-mail</label>
        <?= $this->Form->control('email', ['label' => false, 'required']); ?>
    </div>

    <div class="more__inputs">
        <div class="row right">
            <label>Telefone</label>
            <?= $this->Form->control('personal_phone', ['label' => false, 'class' => 'phone', 'required']); ?>
        </div>

        <div class="row">
            <label>Outro telefone</label>
            <?= $this->Form->control('other_phone', ['label' => false, 'class' => 'phone']); ?>
        </div>
    </div>

    <div class="row">
        <label>Usuário</label>
        <?= $this->Form->control('username', ['label' => false, 'required']); ?>
    </div>

    <div class="more__inputs">
        <div class="row right">
            <label>Senha</label>
            <?= $this->Form->control('password', ['label' => false, 'required', 'placeholder' => 'No mínimo 06 caracteres']); ?>
        </div>

        <div class="row">
            <label>Confirmação de senha</label>
            <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => false, 'required', 'placeholder' => 'Digite a mesma senha']); ?>
        </div>
    </div>

    <?= $this->Form->button(__('Criar conta')); ?>
    <?= $this->Form->end(); ?>

    <p class="router">Já possui cadastro? <?= $this->Html->link(__('Efetuar login'), ['controller' => 'Users', 'action' => 'login']); ?></p>
</section>

<?= $this->Html->script('masks'); ?>
