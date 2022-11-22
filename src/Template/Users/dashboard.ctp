<section>
    <div class="subtitle__button">
        <h1>Dashboard</h1>

        <?php if ($this->AppView->visible('Users', 'export')) : ?>
            <p><?= $this->Html->link(__('Exportar'), ['controller' => 'Users', 'action' => 'export']); ?></p>
        <?php endif; ?>
    </div>

    <div class="containner__dashboard">
        <div class="dashboard__services">
            <?php $all = 0; ?>

            <?php foreach ($payments as $payment) : ?>
                <?php foreach ($values as $key => $value) : ?>
                    <?php if ($payment->id == $key) : ?>

                        <?php $all += $value; ?>

                        <div class="service">
                            <h2><?= $payment->name; ?></h2>
                            <p>R$ <?= $value; ?>,00</p>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>

            <div class="service">
                <h2>Total</h2>
                <p>R$ <?= $all ?>,00</p>
            </div>
        </div>

        <canvas id="myChart"></canvas>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let types_payment = [
        <?php foreach ($payments as $payment) : ?>
            '<?= $payment->name; ?>',
        <?php endforeach; ?>
    ];

    let values = [
        <?php foreach ($payments as $payment) : ?>
            <?php foreach ($values as $key => $value) : ?>
                <?php if ($payment->id == $key) : ?>

                    '<?= $value; ?>',

                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    ];

    const ctx = new Chart(document.getElementById('myChart'), {
        type: 'bar',
        data: {
            labels: types_payment,

            datasets: [
                {
                    label: 'Pagamento',
                    data: values,
                    backgroundColor: '#27ae5f28',
                    borderColor: ['#27AE60'],
                    borderWidth: 1,
                    borderRadius: 5,
                    barPercentage: .6
                },
            ]
        },
        options: {
            responsive: true
        }
    });
</script>
