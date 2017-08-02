<footer class="col-xs-12">
    <div class="copyrights-div col-xs-12">
        <span class="footer-club-name">
            JUDO CLUB | MILLENNIUM | ODESSA
        </span>
        <span class="copyrights">
            &copy ALL RIGHTS RESERVED | ROMAN DUBOVOY | 2017
        </span>
    </div>
    <div class="subscribe-to-news col-xs-4">
        <div class="subscription-header-div col-xs-12">
            Подписаться на рассылку новостей:
        </div>
        <div class="subscription-form col-xs-12">
            <form method="post">
                <input type="email" class="form-control col-xs-7" placeholder="Введите e-mail..." required>
                <input type="submit" class="btn btn-primary col-xs-4" value="Подписаться">
            </form>
        </div>
    </div>
    <div class="contacts col-xs-8">
        <div class="phones col-xs-4">
            <p>Контакты:</p>
            <p class="phone">+38(067) 706-18-40</p>
            <p class="phone">+38(095) 888-39-42</p>
        </div>
        <div class="col-xs-4">
            <p>Адреса:</p>
            <p>ул. Михайловская, 29</p>
            <p>ул. Ицхака Рабина, 8</p>
        </div>
        <div class="socials col-xs-4">
            <p>Мы в социальных сетях:</p>
            <div class="social-icons">
                <? $image = $this->Html->image("socials/vk.png",
                    [
                        'alt' => 'vk logo',
                        'width' => '50',
                        'class' => 'social-icons-item'
                    ]);

                    echo $this->Html->link($image,
                        'https://vk.com/club49504157',
                        [
                            'target' => '_blank',
                            'escape' => false
                        ]
                    );

                $image = $this->Html->image("socials/facebook.png",
                    [
                        'alt' => 'facebook logo',
                        'width' => '50',
                        'class' => 'social-icons-item'
                    ]);

                echo $this->Html->link($image,
                    'https://www.facebook.com/Judo-Club-Millennium-1751351121807135',
                    [
                        'target' => '_blank',
                        'escape' => false
                    ]
                );
                ?>
            </div>
        </div>
    </div>
</footer>