window.onresize = function(event) {
    var windowWidth = window.innerWidth;
    if (windowWidth <= 1000 && windowWidth > 600) {
        // Изменяем атрибут тега, например, установим класс
        document.getElementById('video').setAttribute('width', '500');
        document.getElementById('video').setAttribute('height', '281');
    } 
    else if (windowWidth > 1000) {
        // Возвращаем исходное значение атрибута
        document.getElementById('video').setAttribute('width', '896');
        document.getElementById('video').setAttribute('height', '504');
    }
    else if (windowWidth <= 600){
        document.getElementById('video').setAttribute('width', '350');
        document.getElementById('video').setAttribute('height', '196');
    }
};