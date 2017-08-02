<?=$this->Html->css('leaflet.css', ['block' => 'css']);?>

<div class="col-xs-12">
    <?=$this->element("side_bar");?>

    <div id="contacts" class="col-xs-10">
        <h3>Наши филиалы</h3>
        <div class="branches-wrapper">
            <div class="branch">
                <p class="address"><span class="fa fa-map-marker fa-2x"></span>г. Одесса, ул. Михайловская, 29 (КДЮСШ № 4)</p>
                <p class="phone"><span class="glyphicon glyphicon-phone"></span>(067) 979 12 39</p>
                <p class="phone"><span class="glyphicon glyphicon-phone"></span>(063) 445 55 59</p>
                <p class="phone"><span class="glyphicon glyphicon-phone-alt"></span>(048) 787 96 14</p>
                <p class="phone"><span class="glyphicon glyphicon-phone-alt"></span>(048) 787 23 01</p>
            </div>

            <div class="branch">
                <p class="address"><span class="fa fa-map-marker fa-2x"></span> г. Одесса, ул. Ицхака Рабина, 8 (Гимназия №8, зал борьбы)</p>
                <p class="phone"><span class="glyphicon glyphicon-phone"></span>(067) 706 18 40</p>
                <p class="phone"><span class="glyphicon glyphicon-phone"></span>(063) 445 55 59</p>
                <p class="phone"><span class="glyphicon glyphicon-phone-alt"></span>(048) 787 23 01</p>
            </div>
            <div class="branch">
                <p class="address"><span class="fa fa-map-marker fa-2x"></span> г. Одесса, ул. Бреуса, 61/9 (офис 2, Студия йоги и восточных единоборств "КАЙЛАС")</p>
                <p class="phone"><span class="glyphicon glyphicon-phone"></span>(093) 051 85 15</p>
                <p class="phone"><span class="glyphicon glyphicon-phone"></span>(098) 394 52 25</p>
                <p class="phone"><span class="glyphicon glyphicon-phone"></span>(099) 600 74 85</p>
            </div>
            <div class="branch">
                <p class="address"><span class="fa fa-map-marker fa-2x"></span>пгт. Авангард, стадион, зал борьбы "МИЛЛЕННИУМ"</p>
                <p class="phone"><span class="glyphicon glyphicon-phone"></span>(093) 955 83 74</p>
            </div>
        </div>
        <div id="map"></div>
        <hr>
        <div class="internet-contacts col-xs-4">
            <h3>Наша почта</h3>
            <p>
                <span class="fa fa-envelope"></span>
                <a id="our_post" href="mailto:judomillennium@ukr.net">judomillennium@ukr.net</a>
            </p>
        </div>
        <div class="feedback-wrapper col-xs-8">
            <h3>Обратная связь</h3>
            <p>Есть интересная идея или вопрос? Напишите нам.</p>
            <p class="alert" hidden></p>
            <div id="feedback_form">
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <input type="text" id="name" name="name" class="" placeholder="Имя..." autocomplete="off">
                </div>
                <div class="form-group">
                    <i class="fa fa-envelope"></i>
                    <input type="text" id="email" name="email" class="" placeholder="Почта..." autocomplete="off">
                </div>
                <div class="form-group">
                    <i class="fa fa-pencil"></i>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Сообщение..."></textarea>
                </div>
                <button id="feedback_btn">Отправить</button>
            </div>
        </div>
    </div>
    
    <?=$this->Html->script('slick.js', ['block' => 'scripts']); ?>
    <?=$this->Html->script('slider.js', ['block' => 'scripts']); ?>
    <?=$this->Html->script('leaflet.js', ['block' => 'scripts']);?>
    <?=$this->Html->script('map.js', ['block' => 'scripts']);?>
    <?=$this->Html->script('contacts.js', ['block' => 'scripts']);?>
</div>
