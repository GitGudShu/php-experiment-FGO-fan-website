
const pieChart = document.getElementById('pieCanvas');
const graph1 = new Chart(pieChart, {
    type: 'pie',
    data: {
        labels: labelPie,
        datasets: [{
            label: "Nombre de Servants par class",
            data: dataPie,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(72, 24, 101, 0.5)',
                'rgba(178, 255, 89, 0.5)',
                'rgba(255, 64, 129, 0.5)',
                'rgba(41, 121, 255, 0.5)'
            ],
            hoverOffset: 10
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 1,
        plugins: {
            title: {
                text: 'Nombre de servant par class',
                display: true,
                position: 'top'
            },
            legend: {
                position: 'bottom'
            }
        }
    }
});

const pieChart2 = document.getElementById('pieCanvas2');
const graph4 = new Chart(pieChart2, {
    type: 'pie',
    data: {
        labels: labelPie,
        datasets: [{
            label: "Nombre de Servants par class",
            data: dataPie,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(72, 24, 101, 0.5)',
                'rgba(178, 255, 89, 0.5)',
                'rgba(255, 64, 129, 0.5)',
                'rgba(41, 121, 255, 0.5)'
            ],
            hoverOffset: 10
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 1,
        plugins: {
            title: {
                text: 'Nombre de servant par class',
                display: true,
                position: 'top'
            },
            legend: {
                position: 'bottom',
                display: false
            }
        }
    }
});