<div class="col-xs-2 side-bar">
    <div class="img-divider col-xs-12">
        <?=$this->Html->image("divider.png",
            [
                'alt' => "divider",
                'class' => 'col-xs-12'
            ]
        );?>
    </div>

    <div class="side-menu col-xs-12">
        <ul class="nav nav-pills nav-stacked">
            <li><?=$this->Html->link("ДЗЮДО", "/judo");?></li>
            <li><?=$this->Html->link("НАША ЭМБЛЕМА", "/emblem");?></li>
            <li><?=$this->Html->link("ГАЛЕРЕЯ", "/gallery");?></li>
            <li><?=$this->Html->link("ВИДЕО", "/videos");?></li>
            <li><?=$this->Html->link("КАЛЕНДАРЬ", "/calendar");?></li>
            <li><?=$this->Html->link("РАСПИСАНИЕ", "/schedule");?></li>
            <li><?=$this->Html->link("ЭКЗАМЕНЫ НА КЮ", "/exams");?></li>
            <!-- <li><?/*=$this->Html->link("МАГАЗИН", "/products");*/?></li>
            <li><?/*=$this->Html->link("КОРЗИНА", "/bucket");*/?></li>-->
        </ul>
    </div>

    <div class="img-divider col-xs-12">
        <?=$this->Html->image("divider.png",
            [
                'alt' => "divider",
                'class' => 'col-xs-12'
            ]
        );?>
    </div>

   <!-- <?/* if (empty($this->Session->read('user'))): */?>
        <div class="side-bar-auth">
            <p>Авторизация</p>
            <div id="result"><?/*=$this->Session->flash();*/?></div>
            <?/*=$this->Form->create('User', ['id' => 'UserAuth', 'action' => '/auth']);*/?>
                <?/*=$this->Form->input('User.email', [
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'E-mail...',
                        'required' => true
                    ]);
                */?>
                <?/*=$this->Form->input('User.password', [
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Пароль...',
                        'required' => true
                    ]);
                */?>
                <button id="enter-btn" type="submit" class="btn btn-success col-xs-12">
                    <span class="glyphicon glyphicon-log-in"></span>
                    Войти
                </button>
            <?/*=$this->Form->end();*/?>
            <a class="reg-link" href="/registration">Зарегистриваться</a>
        </div>
    <?/* else: */?>
        <p style="text-align: center;">Здравствуйте, <?/*=$this->Session->read('user')['User']['name'];*/?>!</p>
        <button id="logout-btn" class="btn btn-danger col-xs-12">
            <span class="glyphicon glyphicon-log-out"></span>
            Выйти
        </button>
    --><?/* endif; */?>

    <div class="useful-sites col-xs-12">
        <p>Полезные сайты</p>
        <? echo $this->Html->link($this->Html->image("sidebar/eju.png",
                [
                    'alt' => 'European Judo Union',
                    'class' => 'col-xs-12'
                ]),
                    'http://eju.net',
                    [
                        'target' => '_blank',
                        'escape' => false
                    ]
                );

            echo $this->Html->link($this->Html->image("sidebar/ijf.png",
                [
                    'alt' => 'International Judo Federation',
                    'class' => 'col-xs-12'
                ]),
                'http://ijf.org',
                [
                    'target' => '_blank',
                    'escape' => false
                ]
            );

            echo $this->Html->link($this->Html->image("sidebar/NOK.png",
                [
                    'alt' => 'НОК України',
                    'class' => 'col-xs-12'
                ]),
                'http://noc-ukr.org/',
                [
                    'target' => '_blank',
                    'escape' => false
                ]
            );

            echo $this->Html->link($this->Html->image("sidebar/minMol.png",
                [
                    'alt' => 'МОН України',
                    'url' => '',
                    'class' => 'col-xs-12'
                ]),
                'http://dsmsu.gov.ua',
                [
                    'target' => '_blank',
                    'escape' => false
                ]
            );

            echo $this->Html->link($this->Html->image("sidebar/urk_fed.png",
                [
                    'alt' => 'Федерація дзюдо України',
                    'class' => 'col-xs-12'
                ]),
                'http://ukrainejudo.com',
                [
                    'target' => '_blank',
                    'escape' => false
                ]
            );

            echo $this->Html->link($this->Html->image("sidebar/ipponOrg.png",
                [
                    'alt' => 'ippon.org',
                    'class' => 'col-xs-12'
                ]),
                'http://ippon.org',
                [
                    'target' => '_blank',
                    'escape' => false
                ]
            );
        ?>
    </div>
</div>