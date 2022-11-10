<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>edição</small></h1>

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
            <p class="information__roles">Marque os horários que o estabelecimento irá funcionar no dia em que se está cadastrando.</p>

            <div class="input__services">
                <?php if (!empty($times)) : ?>
                    <?php foreach ($times as $clock) : ?>

                        <input type="checkbox" id="box-<?= $clock->id; ?>" name="times_of_day[_ids][]" value="<?= $clock->id; ?>" class="checkbox__service" checked="<?= in_array($clock->id, $day_times); ?>" />
                        <label for="box-<?= $clock->id; ?>"><?= $clock->time; ?>:00H</label>
                        <?php $cont++; ?>

                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="information__roles">Nenhum horário de atendimento cadastrado!</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>

    <?= $this->Form->button(__('Atualizar'), ['class' => 'button__edit']); ?>
    <?= $this->Form->end(); ?>
</section>
