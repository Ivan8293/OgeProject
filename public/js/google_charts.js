const dataFromLaravel = window.dataFromLaravel.weeks_array;
console.log(dataFromLaravel);

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(init);

let currentWeekIndex = dataFromLaravel.length - 1; // показываем последнюю неделю

function init() {
    drawChart(currentWeekIndex);

    document.getElementById('prevBtn').addEventListener('click', () => {
        if (currentWeekIndex > 0) {
        currentWeekIndex--;
        drawChart(currentWeekIndex);
        }
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
        if (currentWeekIndex < dataFromLaravel.length - 1) {
        currentWeekIndex++;
        drawChart(currentWeekIndex);
        }
    });

    updateButtons();
}

function drawChart(weekIndex) {
    const weekData = dataFromLaravel[weekIndex];

    const chartDataArray = [['Дата', 'Значение']];
    Object.keys(weekData).sort().forEach(dateStr => {
        // Преобразуем дату из 'YYYY-MM-DD' в 'DD-MM'
        const dateParts = dateStr.split('-'); // ['YYYY', 'MM', 'DD']
        const formattedDate = `${dateParts[2]}-${dateParts[1]}`; // 'DD-MM'

        // Делим значение на 1800
        const valueDivided = weekData[dateStr] / 1800;
        chartDataArray.push([formattedDate, valueDivided]);
    });

    const data = google.visualization.arrayToDataTable(chartDataArray);

    const options = {
        title: `Данные за неделю №${weekIndex + 1}`,
        hAxis: { title: 'Дата' },
        vAxis: { title: 'Значение' },
        legend: { position: 'none' },
        bar: { groupWidth: '75%' }
    };

    const chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);

    updateButtons();
}



function updateButtons() {
    document.getElementById('prevBtn').disabled = (currentWeekIndex === 0);
    document.getElementById('nextBtn').disabled = (currentWeekIndex === dataFromLaravel.length - 1);
}
