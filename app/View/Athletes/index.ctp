<div class="col-xs-8 col-md-12">
    <?=$this->element("side_bar");?>
    <div class="col-xs-10 athletes">
        <? foreach($athletesList as $athlete): ?>
            <div class="athletes-item">
                <?=$this->Html->image('athletes/' . $athlete['Athlete']['photo'],
                    [
                        'alt' => 'athlete',
                        'width' => '220',
                        'height' => '220',
                        'pathPrefx' => IMAGES_URL,
                        'class' => 'img-responsive'
                    ]);
                ?>
                <div class="athlete-description">
                    <p class="athlete-name"><?=$athlete['Athlete']['surname'] . ' ' . $athlete['Athlete']['name']?></p>
                    <!--<p class="athlete-rank">Мастер спорта Украины</p>-->
                    <!--<ul class="athlete-achievements">
                        <li>Чемпион турнира "Кубок Федерации г. Киева"</li>
                        <li>Серебрянный призер ЧУ по самбо U20</li>
                        <li>Бронзовый призер ЧУ по самбо U21</li>
                    </ul>-->
                </div>
            </div>
      <? endforeach; ?>
    </div>
</div>