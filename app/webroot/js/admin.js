$(document).keypress(function (event) {
    if(event.keyCode == 13)
        $("#loginButton").click();
});

$('#admin-logout-btn').click(function () {
    location.href = '/admins/logout';
});

$('#add-product-group-btn').click(function () {
    location.href = '/admins/productGroups/add'
});

$('#add-product-btn').click(function () {
    location.href = '/admins/products/add'
});

$('#users-list').dataTable({
    language: {
        emptyTable: "Данные отсутствуют",
        loadingRecords: "Загрузка...",
        processing: "Обработка...",
        search: "Поиск:",
        lengthMenu: "Отображать по _MENU_ записей на странице",
        zeroRecords: "Ничего не найдено",
        info: "Показывается страница _PAGE_ из _PAGES_",
        infoEmpty: "Нет доступных записей",
        paginate: {
            first:      "Перв.",
            last:       "Послед.",
            next:       "След.",
            previous:   "Прев."
        }
    },
    ajax: {
        type: 'post',
        url: '/admins/users',
        dataType: 'json',
        dataSrc: function ( json ) {
            let tableData = [];
            let users = $.makeArray(json);
            for (let i = 0; i < users.length; i++){
                tableData.push([
                    users[i].User.id,
                    "<div class='actions'><a href='/admins/user/"+ users[i].User.id + "'><span class='glyphicon glyphicon-eye-open'></span></a>" +
                    "<a href='/admins/user/edit/"+ users[i].User.id + "'><span class='glyphicon glyphicon-pencil'></span></a>" +
                    "<a href='/admins/user/delete/"+ users[i].User.id + "'><span class='glyphicon glyphicon-remove'></span></a></div>",
                    users[i].User.name,
                    users[i].User.email,
                    users[i].User.login
                ]);
            }
            return tableData;
        }
    },
    columns: [
        { title: 'ID' },
        { title: 'Действие' },
        { title: 'Имя'},
        { title: 'Email'},
        { title: 'Login'}
    ],
    "columnDefs": [
        { "orderable": false, "targets": [1] }
    ]
});

$('#product-groups-list').dataTable({
    language: {
        emptyTable: "Данные отсутствуют",
        loadingRecords: "Загрузка...",
        processing: "Обработка...",
        search: "Поиск:",
        lengthMenu: "Отображать по _MENU_ записей на странице",
        zeroRecords: "Ничего не найдено",
        info: "Показывается страница _PAGE_ из _PAGES_",
        infoEmpty: "Нет доступных записей",
        paginate: {
            first:      "Перв.",
            last:       "Послед.",
            next:       "След.",
            previous:   "Прев."
        }
    },
    ajax: {
        type: 'post',
        url: '/admins/productGroups',
        dataType: 'json',
        dataSrc: function ( json ) {
            let tableData = [];
            let productGroups = $.makeArray(json);
            for (let i = 0; i < productGroups.length; i++){
                tableData.push([
                    productGroups[i].ProductGroup.id,
                    "<div class='actions'>" +
                    "<a href='/admins/productGroup/edit/"+ productGroups[i].ProductGroup.id + "'><span class='glyphicon glyphicon-pencil'></span></a>" +
                    "<a href='/admins/productGroup/delete/"+ productGroups[i].ProductGroup.id + "'><span class='glyphicon glyphicon-remove'></span></a></div>",
                    productGroups[i].ProductGroup.name
                ]);
            }
            return tableData;
        }
    },
    columns: [
        { title: 'ID' },
        { title: 'Действие' },
        { title: 'Название'}
    ],
    "columnDefs": [
        { "orderable": false, "targets": [1] }
    ]
});

$('#products-list').dataTable({
    language: {
        emptyTable: "Данные отсутствуют",
        loadingRecords: "Загрузка...",
        processing: "Обработка...",
        search: "Поиск:",
        lengthMenu: "Отображать по _MENU_ записей на странице",
        zeroRecords: "Ничего не найдено",
        info: "Показывается страница _PAGE_ из _PAGES_",
        infoEmpty: "Нет доступных записей",
        paginate: {
            first:      "Перв.",
            last:       "Послед.",
            next:       "След.",
            previous:   "Прев."
        }
    },
    ajax: {
        type: 'post',
        url: '/admins/products',
        dataType: 'json',
        dataSrc: function ( json ) {
            let tableData = [];
            let products = $.makeArray(json);
            for (let i = 0; i < products.length; i++){
                tableData.push([
                    products[i].Product.id,
                    "<div class='actions'>" +
                    "<a href='/admins/product/edit/"+ products[i].Product.id + "'><span class='glyphicon glyphicon-pencil'></span></a>" +
                    "<a href='/admins/product/delete/"+ products[i].Product.id + "'><span class='glyphicon glyphicon-remove'></span></a></div>",
                    products[i].Product.name,
                    products[i].Product.description,
                    products[i].Product.cost,
                    "<div style='text-align: center'><img src='" + products[i].Product.image + "' width='100'></div>",
                    products[i].Product.groupName
                ]);
            }
            return tableData;
        }
    },
    columns: [
        { title: 'ID' },
        { title: 'Действие' },
        { title: 'Название' },
        { title: 'Описание'},
        { title: 'Стоимость'},
        { title: 'Фото'},
        { title: 'Группа'}
    ],
    "columnDefs": [
        { "orderable": false, "targets": [1] }
    ]
});
