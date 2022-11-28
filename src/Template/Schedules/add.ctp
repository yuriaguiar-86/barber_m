<?= $this->Html->css(['times']); ?>

<section>
    <div class="subtitle__button">
        <h1>Agendamentos <small>cadastro</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Schedules', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($schedule, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="more__fields">
        <div class="row right">
            <label>Profissional <span class="fields__required">*</span></label>
            <select name="employee_id" class="employee" required>
                <?php foreach ($users as $user) : ?>
                    <option value="<?= $user->id; ?>"><?= $user->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row">
            <label>Data do agendamento <span class="fields__required">*</span></label>
            <?= $this->Form->control('date', ['type' => 'text', 'label' => false, 'placeholder' => '99/99/9999', 'class' => 'calendar times-free', 'required']); ?>
        </div>
    </div>

    <section class="controllers">
        <h2 title="">Horários disponíveis
            <i class="fa-solid fa-circle-exclamation" style="font-size: .5em; color: var(--yellow);"></i>
        </h2>

        <div class="containner__times">
            <p class="information__roles">Selecione o profissional e a data do atendimento!</p>
        </div>
    </section>

    <section class="controllers">
        <h2>Serviços <span class="fields__required">*</span></h2>

        <?php $cont = 0; ?>
        <?php if (!empty($typesOfServices)) : ?>
            <p class="information__roles">Selecione um ou mais de um serviço que deseja.</p>

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

    <?= $this->Form->button(__('Agendar'), ['class' => 'button__save']); ?>
    <?= $this->Form->end(); ?>
</section>

<script>
    $(document).ready(function() {
        $('.calendar').blur(function() {
            $('.containner__times').html(' ');
            let date_select = $('.calendar').val();
            let employee_select = $('.employee').val();

            if (date_select != '' && employee_select != '') {
                $.ajax({
                    method: 'GET',
                    url: '<?= $this->Url->build(['controller' => 'Schedules', 'action' => 'getTimesFree']); ?>',
                    data: {
                        date: date_select,
                        employee_id: employee_select
                    },
                    dataType: 'json',

                    success: function(timesFree) {
                        $.each(timesFree, function(index, value) {
                            $('.containner__times').append(`
                            <div>
                                <input type="radio" id="control_${index}" name="time" value="${value}" class="input__times" />
                                <label for="control_${index}" class="label__times">
                                    <span>${value}:00H</span>
                                </label>
                            </div>
                        `);
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: '<p>Algo coisa deu errado.</p> <p>Tente novamente mais tarde!</p>',
                            confirmButtonColor: '#A9A9A9'
                        });
                    }
                });
            } else {
                $('.containner__times').append(`
                    <p class="information__roles">Selecione o profissional e a data do atendimento!</p>
                `);
            }
        });
    });
</script>

<?= $this->Html->script(['roles', 'masks']); ?>
