<section>
    <div class="subtitle__button">
        <h1>Dashboard</h1>

        <div class="filter__and__add">
            <?= $this->Form->create(null, ['type' => 'get', 'id' => 'form__dashboard']); ?>

            <?= $this->Form->control('date_final', ['autocomplete' => 'off', 'type' => 'text','title' => 'Data final', 'placeholder' => '99/99/9999', 'label' => false, 'value' => $this->request->getQuery('date_final'), 'class' => 'filter__date final filter__dashboard']); ?>

            <?= $this->Form->control('date_init', ['autocomplete' => 'off', 'type' => 'text', 'title' => 'Data inicial', 'placeholder' => '99/99/9999', 'label' => false, 'value' => $this->request->getQuery('date_init'), 'class' => 'filter__date init filter__dashboard']); ?>

            <?= $this->Form->button(__('Filtrar'), ['class' => 'submit__filter']); ?>
            <?= $this->Form->end() ?>

            <?php if ($this->AppView->visible('Users', 'export')) : ?>
                <p><?= $this->Html->link(__('Exportar'), ['controller' => 'Users', 'action' => 'export'], ['class' => 'button__export']); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="containner__dashboard">
        <div class="dashboard__services">

            <?php foreach ($payments as $payment) : ?>
                <div class="service">
                    <h2><?= $payment->name; ?></h2>
                    <p>R$ <?= $payment->sum; ?>,00</p>
                </div>
            <?php endforeach; ?>

            <div class="service">
                <h2>Total</h2>
                <p>R$ <?= $summation ?>,00</p>
            </div>
        </div>

        <canvas id="myChart"></canvas>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let types_payment = [
        <?php foreach ($payments as $payment) : ?> '<?= $payment->name; ?>',
        <?php endforeach; ?>
    ];

    let values = [
        <?php foreach ($payments as $payment) : ?> '<?= $payment->sum; ?>',
        <?php endforeach; ?>
    ];

    const ctx = new Chart(document.getElementById('myChart'), {
        type: 'bar',
        data: {
            labels: types_payment,

            datasets: [{
                label: 'Pagamentos',
                data: values,
                backgroundColor: '#27ae5f28',
                borderColor: ['#27AE60'],
                borderWidth: 1,
                borderRadius: 5,
                barPercentage: .6
            }, ]
        },
        options: {
            responsive: true
        }
    });
</script>

<?= $this->Html->script(['masks']); ?>
