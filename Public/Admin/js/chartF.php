
<script> 
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["1", "tháng 2", "3", "4",
                "5", "6", "7","8","9","10","11","12"
            ],
            datasets: [{
                label: 'food Items',
                backgroundColor: 'rgba(161, 198, 247, 1)',
                borderColor: 'rgb(47, 128, 237)',
                data: [300, 400, 200, 500, 800, 900, 200],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        },
    });
</script>