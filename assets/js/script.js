const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal.fire({
        title: 'Data mahasiswa',
        text: 'Berhasil ' + flashData,
        type: 'success'
    });
}
//delete-button
$('.delete-button').on('click', function (e) {
    const href = $(this).attr('href');
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

var myBarChart = new Chart(barChart, {
    type: 'bar',
    data: {
        labels: ["SMA", "D1/D2/D3", "S1", "S2/S3"],
        datasets: [{
            label: " ",
            backgroundColor: "#3498db",
            data: [10, 20, 100, 10],
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
            display: false,
        }
    },
});

var doughnutChart = document.getElementById('doughnutChart').getContext('2d');

var myDoughnutChart = new Chart(doughnutChart, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [300, 250],
            backgroundColor: ['#fdaf4b', '#3498db']
        }],

        labels: [
            'PTN',
            'PTS'
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom'
        },
        layout: {
            padding: {
                left: 10,
                right: 10,
                top: 10,
                bottom: 10
            }
        }
    }
});

var doughnutChart2 = document.getElementById('doughnutChart2').getContext('2d');

var myDoughnutChart2 = new Chart(doughnutChart2, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [100, 50],
            backgroundColor: ['#3498db', '#fdaf4b']
        }],

        labels: [
            'Beasiswa',
            'Mandiri'
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom'
        },
        layout: {
            padding: {
                left: 10,
                right: 10,
                top: 10,
                bottom: 10
            }
        }
    }
});

var lineChart = document.getElementById('LineChart').getContext('2d');
var myLineChart = new Chart(lineChart, {
    type: 'line',
    data: {
        labels: ["2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019"],
        datasets: [{
            label: "",
            borderColor: "#1d7af3",
            pointBorderColor: "#FFF",
            pointBackgroundColor: "#1d7af3",
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            pointRadius: 4,
            backgroundColor: 'transparent',
            fill: true,
            borderWidth: 2,
            data: [9, 14, 13, 11, 20, 21, 25, 19, 29]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom',
            labels: {
                padding: 10,
                fontColor: '#1d7af3',
            }
        },
        tooltips: {
            bodySpacing: 4,
            mode: "nearest",
            intersect: 0,
            position: "nearest",
            xPadding: 10,
            yPadding: 10,
            caretPadding: 10
        },
        layout: {
            padding: { left: 15, right: 15, top: 15, bottom: 15 }
        },
        legend: {
            display: false,
        }
    }
});