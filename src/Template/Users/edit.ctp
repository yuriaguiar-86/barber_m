<section>
    <div class="subtitle__button">
        <h1>Usuários <small>edição</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Users', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($user, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row">
        <label>Nome <span class="fields__required">*</span></label>
        <?= $this->Form->control('name', ['label' => false, 'required']); ?>
    </div>

    <div class="row">
        <label>E-mail <span class="fields__required">*</span></label>
        <?= $this->Form->control('email', ['label' => false, 'required']); ?>
    </div>

    <div class="more__fields">
        <div class="row right">
            <label>Telefone <span class="fields__required">*</span></label>
            <?= $this->Form->control('personal_phone', ['label' => false, 'required', 'class' => 'phone', 'placeholder' => '(99) 99999-9999']); ?>
        </div>
        <div class="row right">
            <label>Outro telefone</label>
            <?= $this->Form->control('other_phone', ['label' => false, 'required', 'class' => 'phone', 'placeholder' => '(99) 99999-9999']); ?>
        </div>
        <div class="row">
            <label>Tipo de perfil <span class="fields__required">*</span></label>
            <?= $this->Form->control('role_id', [['options' => $roles], 'label' => false, 'required']); ?>
        </div>
    </div>

    <section class="controllers">
        <h2>Dados de acesso</h2>

        <div class="more__fields">
            <div class="row right">
                <label>Usuário <span class="fields__required">*</span></label>
                <?= $this->Form->control('username', ['label' => false, 'required']); ?>
            </div>
            <div class="row right">
                <label>Senha <span class="fields__required">*</span></label>
                <?= $this->Form->control('password', ['value' => '', 'label' => false, 'required', 'placeholder' => 'No mínimo 06 caracteres']); ?>
            </div>
            <div class="row">
                <label>Confirmação de senha <span class="fields__required">*</span></label>
                <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => false, 'required', 'placeholder' => 'Digite a mesma senha']); ?>
            </div>
        </div>
    </section>

    <!-- Apresentar somente se selecionar employee -->
    <section class="controllers">
        <?php $cont = 0; ?>

        <h2>Controladores de atendimento <span class="fields__required">*</span></h2>
        <p class="information__roles">Marque os horários no qual o profissional estará trabalhando durante a semana, ou clique no dia da semana para marcar/desmarcar todas.</p>

        <?php foreach ($daysTimes as $day) : ?>
            <div class="input__services">
                <div class="icons__module">
                    <i class="fa-solid fa-check allcheck" aria-hidden="true" title="Marcar todos"></i>
                    <i class="fa-regular fa-square uncheck" aria-hidden="true" title="Desmarcar todos"></i>
                    <h4><?= $day->name ?></h4>
                </div>

                <?php if (!empty($day->times_of_day)) : ?>
                    <?php foreach ($day->times_of_day as $clock) : ?>

                        <input type="checkbox" id="box-<?= $clock->id; ?>" name="days_times[_ids][]" value="<?= $clock->id; ?>" class="checkbox__service" checked="<?= in_array($clock->id, $usersDays); ?>" />
                        <label for="box-<?= $clock->id; ?>"><?= $clock->time; ?>:00H</label>
                        <?php $cont++; ?>

                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="information__roles">Nenhum horário cadastrado nesse dia!</p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </section>

    <?= $this->Form->button(__('Atualizar'), ['class' => 'button__edit']); ?>
    <?= $this->Form->end(); ?>
</section>

<?= $this->Html->script(['roles', 'masks']); ?>
