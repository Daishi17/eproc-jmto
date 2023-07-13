<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Rekanan Aktif',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [<?= $rekanan_baru_jan ?>, <?= $rekanan_baru_feb ?>, <?= $rekanan_baru_mar ?>, <?= $rekanan_baru_apr ?>, <?= $rekanan_baru_mei ?>, <?= $rekanan_baru_jun ?>, <?= $rekanan_baru_jul ?>, <?= $rekanan_baru_jul ?>, <?= $rekanan_baru_ags ?>, <?= $rekanan_baru_sep ?>, <?= $rekanan_baru_okt ?>, <?= $rekanan_baru_nov ?>, <?= $rekanan_baru_des ?>]
            }]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })


        var areaChartCanvas2 = $('#areaChart2').get(0).getContext('2d')

        var areaChartData2 = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Rekanan Aktif',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [<?= $rekanan_terundang_jan ?>, <?= $rekanan_terundang_feb ?>, <?= $rekanan_terundang_mar ?>, <?= $rekanan_terundang_apr ?>, <?= $rekanan_terundang_mei ?>, <?= $rekanan_terundang_jun ?>, <?= $rekanan_terundang_jul ?>, <?= $rekanan_terundang_jul ?>, <?= $rekanan_terundang_ags ?>, <?= $rekanan_terundang_sep ?>, <?= $rekanan_terundang_okt ?>, <?= $rekanan_terundang_nov ?>, <?= $rekanan_terundang_des ?>]
            }]
        }

        var areaChartOptions2 = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas2, {
            type: 'line',
            data: areaChartData2,
            options: areaChartOptions2
        })

        //-------------
        //- LINE CHART -
        //--------------
        // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        // var lineChartOptions = $.extend(true, {}, areaChartOptions)
        // var lineChartData = $.extend(true, {}, areaChartData)
        // lineChartData.datasets[0].fill = false;
        // lineChartData.datasets[1].fill = false;
        // lineChartOptions.datasetFill = false

        // var lineChart = new Chart(lineChartCanvas, {
        //     type: 'line',
        //     data: lineChartData,
        //     options: lineChartOptions
        // })

        // //-------------
        // //- DONUT CHART -
        // //-------------
        // // Get context with jQuery - using jQuery's .get() method.
        // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        // var donutData = {
        //     labels: [
        //         'Chrome',
        //         'IE',
        //         'FireFox',
        //         'Safari',
        //         'Opera',
        //         'Navigator',
        //     ],
        //     datasets: [{
        //         data: [700, 500, 400, 600, 300, 100],
        //         backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        //     }]
        // }
        // var donutOptions = {
        //     maintainAspectRatio: false,
        //     responsive: true,
        // }
        // //Create pie or douhnut chart
        // // You can switch between pie and douhnut using the method below.
        // new Chart(donutChartCanvas, {
        //     type: 'doughnut',
        //     data: donutData,
        //     options: donutOptions
        // })

        // //-------------
        // //- PIE CHART -
        // //-------------
        // // Get context with jQuery - using jQuery's .get() method.
        // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        // var pieData = donutData;
        // var pieOptions = {
        //     maintainAspectRatio: false,
        //     responsive: true,
        // }
        // //Create pie or douhnut chart
        // // You can switch between pie and douhnut using the method below.
        // new Chart(pieChartCanvas, {
        //     type: 'pie',
        //     data: pieData,
        //     options: pieOptions
        // })

        // //-------------
        // //- BAR CHART -
        // //-------------
        // var barChartCanvas = $('#barChart').get(0).getContext('2d')
        // var barChartData = $.extend(true, {}, areaChartData)
        // var temp0 = areaChartData.datasets[0]
        // var temp1 = areaChartData.datasets[1]
        // barChartData.datasets[0] = temp1
        // barChartData.datasets[1] = temp0

        // var barChartOptions = {
        //     responsive: true,
        //     maintainAspectRatio: false,
        //     datasetFill: false
        // }

        // new Chart(barChartCanvas, {
        //     type: 'bar',
        //     data: barChartData,
        //     options: barChartOptions
        // })

        // //---------------------
        // //- STACKED BAR CHART -
        // //---------------------
        // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        // var stackedBarChartData = $.extend(true, {}, barChartData)

        // var stackedBarChartOptions = {
        //     responsive: true,
        //     maintainAspectRatio: false,
        //     scales: {
        //         xAxes: [{
        //             stacked: true,
        //         }],
        //         yAxes: [{
        //             stacked: true
        //         }]
        //     }
        // }

        // new Chart(stackedBarChartCanvas, {
        //     type: 'bar',
        //     data: stackedBarChartData,
        //     options: stackedBarChartOptions
        // })
    })
</script>