<section>
    <div class="subtitle__button">
        <h1>Dias de folga <small>reagendamento</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysOfWork', 'action' => 'index']); ?></p>
    </div>

    <div class="data__person">
        <div class="reschedule__containner">
            <p>Os clientes listados abaixo, realizaram o agendamento no dia <?= date('d/m/Y', strtotime($day_free)); ?>.</p>
            <p>Entre em contato com ambos e reagende os horários <?= $this->Html->link('clicando aqui', ['controller' => 'Schedules', 'action' => 'index', 'filter' => date('d/m/Y', strtotime($day_free))]); ?> ou acesse pelo menu e filtre baseado no dia de folga que está sendo cadastrado cadastrado.</p>
        </div>

        <dl>
            <?php foreach($users as $user) : ?>

                <div class="data__row">
                    <h4>Cliente:</h4>
                    <dd><?= $user->name; ?> - <?= $user->personal_phone; ?></dd>
                </div>

            <?php endforeach; ?>
        </dl>
    </div>
</section>
