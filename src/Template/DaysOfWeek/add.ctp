<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>cadastro</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysOfWeek', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($daysOfWeek, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row">
        <label>Nome <span class="fields__required">*</span></label>
        <?= $this->Form->control('name', ['label' => false, 'required']); ?>
    </div>

    <section class="controllers">
        <h2>Horários de atendimento <span class="fields__required">*</span></h2>

        <?php $cont = 0; ?>
        <?php if (!empty($times)) : ?>
            <p class="information__roles">Marque os horários que o estabelecimento irá funcionar no dia em que se está cadastrando, ou clique no dia da semana para marcar/desmarcar todas.</p>

            <div class="input__services">
                <div class="icons__module">
                    <i class="fa-solid fa-check allcheck" aria-hidden="true" title="Marcar todos"></i>
                    <i class="fa-regular fa-square uncheck" aria-hidden="true" title="Desmarcar todos"></i>
                    <h4>Dia da semana</h4>
                </div>

                <?php if (!empty($times)) : ?>
                    <?php foreach ($times as $clock) : ?>

                        <input type="checkbox" id="box-<?= $clock->id; ?>" name="times_of_day[_ids][]" value="<?= $clock->id; ?>" class="checkbox__service" />
                        <label for="box-<?= $clock->id; ?>"><?= $clock->time; ?></label>
                        <?php $cont++; ?>

                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="information__roles">Nenhum horário de atendimento cadastrado!</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>

    <?= $this->Form->button(__('Cadastrar'), ['class' => 'button__save']); ?>
    <?= $this->Form->end(); ?>
</section>
