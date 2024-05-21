window.onresize = function(event) {
    var windowWidth = window.innerWidth;
    if (windowWidth < 600) {
        // Изменяем атрибут тега, например, установим класс
        document.getElementById('video_frame').setAttribute('width', '300');
        document.getElementById('video_frame').setAttribute('height', '168');
    } 
    else{
        // Возвращаем исходное значение атрибута
        document.getElementById('video_frame').setAttribute('width', '448');
        document.getElementById('video_frame').setAttribute('height', '252');
    }
};