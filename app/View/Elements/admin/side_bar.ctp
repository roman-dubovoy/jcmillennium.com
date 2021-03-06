<div class="side-bar col-xs-2">
    <button class="btn btn-danger col-xs-12" id="admin-logout-btn">
        <span class="glyphicon glyphicon-log-out"></span>
        Выйти
    </button>

    <div class="img-divider col-xs-12">
        <?=$this->Html->image("divider.png",
            [
                'alt' => "divider",
                'class' => 'col-xs-12'
            ]
        );?>
    </div>

    <div class="side-menu col-xs-12">
        <p>Управление разделами:</p>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="#">НОВОСТИ</a></li>
            <li><a href="#">РЕЗУЛЬТАТЫ</a></li>
            <li><?=$this->Html->link("ТРЕНЕРЫ", "/admins/coaches");?></li>
            <li><?=$this->Html->link("СПОРТСМЕНЫ", "/admins/athletes");?></li>
            <!--<li><?/*=$this->Html->link("ПОЛЬЗОВАТЕЛИ", "/admins/users");*/?></li>
            <li><?/*=$this->Html->link("ГРУППЫ ТОВАРОВ", "/admins/productGroups");*/?></li>
            <li><?/*=$this->Html->link("ТОВАРЫ", "/admins/products");*/?></li>-->
            <li><a href="#">ВИДЕО</a></li>
            <li><a href="#">КАЛЕНДАРЬ</a></li>
            <li><a href="#">РАСПИСАНИЕ</a></li>
            <li><a href="#">ЭКЗАМЕНЫ НА КЮ</a></li>
        </ul>
    </div>
</div>