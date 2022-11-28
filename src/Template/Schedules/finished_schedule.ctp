<section>
    <div class="subtitle__button">
        <h1>Agendamentos <small>finalizar</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Schedules', 'action' => 'index']); ?></p>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $schedule->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Profissional</h4>
                <dd><?= $schedule->user->name; ?></dd>
            </div>

            <div class="data__row">
                <h4>Cliente</h4>
                <dd><?= $client->name; ?></dd>
            </div>

            <div class="data__row">
                <h4>Data e horário</h4>
                <dd><?= $schedule->date->format('d/m/Y') . ' ás ' . $schedule->time; ?>:00H</dd>
            </div>
        </dl>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($schedule, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row">
        <label>Forma de pagamento <span class="fields__required">*</span></label>
        <?= $this->Form->control('types_of_payment_id', ['options' => $typesOfPayments, 'label' => false, 'required']); ?>
    </div>

    <section class="controllers">
        <h2>Serviços <span class="fields__required">*</span></h2>

        <?php $cont = 0; ?>
        <?php if (!empty($typesOfServices)) : ?>
            <p class="information__roles">Selecione os serviço que o cliente realizou.</p>

            <div class="input__services">
                <?php foreach ($typesOfServices as $service) : ?>

                    <input type="checkbox" id="box-<?= $service->id; ?>" name="types_of_services[_ids][]" value="<?= $service->id; ?>" class="checkbox__service" />
                    <label for="box-<?= $service->id; ?>"><?= $service->name; ?></label>
                    <?php $cont++; ?>

                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="information__roles">Nenhum serviço encontrado!</p>
        <?php endif; ?>
    </section>

    <?= $this->Form->button(__('Finalizar'), ['class' => 'button__save']); ?>
    <?= $this->Form->end(); ?>
</section>

<?= $this->Html->script(['roles']); ?>
