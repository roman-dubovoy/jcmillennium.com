<?php
    echo $this->Html->script('jquery-3.1.1.js');
    $this->Paginator->options([
    'url' => ['controller' => 'athletes', 'action' => 'index'],
    'update' => '#content'
    ]);
?>
<div class="col-xs-12">
    <?=$this->element("side_bar");?>
    <div id="athletes" class="col-xs-10 athletes">
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
                    <p><?=$athlete['Athlete']['description']?></p>
                    <!--<p class="athlete-rank">Мастер спорта Украины</p>-->
                    <!--<ul class="athlete-achievements">
                        <li>Чемпион турнира "Кубок Федерации г. Киева"</li>
                        <li>Серебрянный призер ЧУ по самбо U20</li>
                        <li>Бронзовый призер ЧУ по самбо U21</li>
                    </ul>-->
                </div>
            </div>
      <? endforeach; ?>
        <div class="col-xs-12 pagination-wrapper">
            <?=$this->Paginator->first('Первая', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'disabled']);?>
            <?=$this->Paginator->prev('Назад', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'non-accessible']);?>
            <?=$this->Paginator->numbers(['tag' => 'button', 'class' => 'paginate-btn', 'separator' => '']);?>
            <?=$this->Paginator->next('Вперёд', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'non-accessible']);?>
            <?=$this->Paginator->last('Последняя', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'disabled']);?>
        </div>
    </div>
</div>
<?=$this->Js->writeBuffer(); ?>