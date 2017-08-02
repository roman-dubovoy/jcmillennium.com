$(document).ready(function () {
    window.name = "MyWindowName";
    window.status = "MyWindowStatus";
    $('#windowName').text("Имя окна: " + window.name);
    $('#windowInnerWidth').text("Ширина без полос прокрутки: " + window.innerWidth);
    $('#windowStatus').text("Статус окна: " + window.status);

    $('#navigatorAppName').text("Название браузера: " + navigator.appName);
    $('#navigatorAppVersion').text("Версия браузера: " + navigator.appVersion);

    $('#locationHref').text("Путь к ресурсу: " + location.pathname);
    $('#locationHostname').text("Имя хоста: " + location.hostname);

    $('#historyPrev').text("URL предыдущего документа: " + document.referrer);
    $('#historyAmountAddresses').text("Число адресов в списке: " + history.length);

    $('#screenAvailWidth').text("Ширина полезной области экрана: " + screen.availWidth);
    $('#screenHeight').text("Высота экрана = " + screen.height);
});
