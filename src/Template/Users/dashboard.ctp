<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function getNumbersRandom() {
        let values = [];

        for (let i = 0; i < 12; i++) {
            values.push(Math.floor(Math.random() * 500));
        }
        return values;
    }

    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],

            datasets: [{
                    label: 'Corte', // Percorrer os serviços cadastrador
                    data: this.getNumbersRandom(), // O segundo valor será o máximo
                    backgroundColor: ['#27AE60'],
                    borderColor: ['#27AE60'],
                    borderWidth: 1
                },
                {
                    label: 'Barba', // Percorrer os serviços cadastrador
                    data: this.getNumbersRandom(), // O segundo valor será o máximo
                    backgroundColor: ['#FA2626'],
                    borderColor: ['#FA2626'],
                    borderWidth: 1
                }, {
                    label: 'Sobrancelha', // Percorrer os serviços cadastrador
                    data: this.getNumbersRandom(), // O segundo valor será o máximo
                    backgroundColor: ['#DBB801'],
                    borderColor: ['#DBB801'],
                    borderWidth: 1
                },
            ]
        }
    });
</script>
