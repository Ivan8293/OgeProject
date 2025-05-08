let startTime = Date.now();

console.log("скрипт просчета времени запустился, startTime = " + startTime);

window.addEventListener('beforeunload', function() {
    console.log("сработало событие закрытия вкладки");

    let activeTime = Math.floor((Date.now() - startTime) / 1000); // Время в секундах

    const data = JSON.stringify({ active_time: activeTime });
    const url = '/update-active-time';

    // Используем sendBeacon для отправки данных, это асинхронный запрос
    navigator.sendBeacon(url, data);

    console.log("асинхронный запрос послан");
});