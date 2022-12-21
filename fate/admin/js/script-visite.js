const ctx = document.getElementById('lineChart').getContext('2d');
const graph2 = new Chart(lineChart, {
    type: 'line',
    data: {
        labels: labelLine,
        datasets: [{
            data: dataLine,
            backgroundColor: ['#702963'],
            borderColor: ['#702963'],
            label: 'nombre de visites'
        },
        {
            data: dataLine2,
            backgroundColor: ['#5D3FD3'],
            borderColor: ['#5D3FD3'],
            label: 'nombres de clics'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 1,
        plugins: {
            title: {
                text: 'Visites et clics selon les jours',
                display: true,
                position: 'top'
            },
            legend: {
                position: 'bottom'
            }
        }
    }
});

const ctx2 = document.getElementById('lineChart2').getContext('2d');
const graph10 = new Chart(lineChart2, {
    type: 'line',
    data: {
        labels: labelLine1,
        datasets: [{
            data: dataLine3,
            backgroundColor: ['#800080'],
            borderColor: ['#800080'],
            label: 'nombres de visites'
        },
        {
            data: dataLine4,
            backgroundColor: ['#CBC3E3'],
            borderColor: ['#CBC3E3'],
            label: 'nombres de clics'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 1,
        plugins: {
            title: {
                text: 'Visites et clics selon les langues',
                display: true,
                position: 'top'
            },
            legend: {
                position: 'bottom'
            }
        }
    }
});


