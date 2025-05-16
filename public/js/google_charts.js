google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(main);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['день недели', 'часы'],
        ['пн',  2.3      ],
        ['вт',  2     ],
        ['ср',  2      ],
        ['чт',  2      ],
        ['пт',  2      ],
        ['сб',  2      ],
        ['вс',  2      ],
    ]);

    var options = {
        title: 'Затраченное на подготовку время (в часах)',
        hAxis: {title: 'день недели',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0}
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('active_time_week'));
    chart.draw(data, options);
}


function drawChartTaskTime() {
    var data = google.visualization.arrayToDataTable([
        ['день недели', 'часы'],
        ['пн',  2.3      ],
        ['вт',  2     ],
        ['ср',  2      ],
        ['чт',  2      ],
        ['пт',  2      ],
        ['сб',  2      ],
        ['вс',  2      ],
    ]);

    var options = {
        title: 'Затраченное на подготовку время (в часах)',
        hAxis: {title: 'день недели',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0}
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('active_time_week'));
    chart.draw(data, options);
}



function main(){
    drawChart();

}
