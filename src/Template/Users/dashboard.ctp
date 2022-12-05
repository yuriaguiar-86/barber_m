<section>
    <div class="subtitle__button">
        <h1>Dashboard</h1>

        <?php if ($this->AppView->visible('Users', 'export')) : ?>
            <p><?= $this->Html->link(__('Exportar'), ['controller' => 'Users', 'action' => 'export']); ?></p>
        <?php endif; ?>
    </div>

    <div class="containner__dashboard">
        <div class="dashboard__services">

            <?php foreach ($count_services as $service) : ?>
                <div class="service">
                    <h2><?= $service->types_of_payments['name']; ?></h2>
                    <p><small><?= $service->types_of_services['name']; ?></small></p>
                    <p>R$ <?= $service->types_of_services['price'] * $service->sum; ?>,00</p>
                </div>
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
        <?php foreach ($count_services as $payment) : ?>
            '<?= $payment->types_of_services['name']; ?> no <?= $payment->types_of_payments['name']; ?>',
        <?php endforeach; ?>
    ];

    let values = [
        <?php foreach ($count_services as $service) : ?>
            '<?= $service->types_of_services['price'] * $service->sum; ?>',
        <?php endforeach; ?>
    ];

    const ctx = new Chart(document.getElementById('myChart'), {
        type: 'bar',
        data: {
            labels: types_payment,

            datasets: [{
                label: 'Pagamento',
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
