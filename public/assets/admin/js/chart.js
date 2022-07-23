let ventasPorMes = JSON.parse(document.getElementById('ventasPorMes').value);
//console.log(typeof(ventasPorMes));
//console.log(ventasPorMes);

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'], //aca pondriamos los meses
        datasets: [{
            label: '# of Votes',
            data: [
                ventasPorMes.enero,
                ventasPorMes.febrero,
                ventasPorMes.marzo,
                ventasPorMes.abril,
                ventasPorMes.mayo,
                ventasPorMes.junio,
                ventasPorMes.julio,
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});