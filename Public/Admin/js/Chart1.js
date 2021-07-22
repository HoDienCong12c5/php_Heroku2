const barChart2 = new Chart(document.getElementById("barChart2"), {
    type: "bar",
    options: {
        scales: {
            xAxes: [
                {
                    display: true,
                    gridLines: {
                        color: "#fff",
                    },
                },
            ],
            yAxes: [
                {
                    display: true,
                    ticks: {
                        max: 100,
                        min: 20,
                    },
                    gridLines: {
                        color: "#fff",
                    },
                },
            ],
        },
        legend: false,
    },
    data: {
        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14"],
        datasets: [
            {
                label: "Sunny Days",
                backgroundColor: pinkBlue,
                hoverBackgroundColor: pinkBlue,
                borderColor: pinkBlue,
                borderWidth: 0,
                data: [65, 59, 80, 81, 56, 55, 40, 30, 45, 80, 44, 36, 66, 58],
            },
        ],
    },
});