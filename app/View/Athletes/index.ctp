<?php
    echo $this->Html->script('jquery-3.1.1.js');
    $this->Paginator->options([
        'url' => ['controller' => 'athletes', 'action' => 'index'],
        'update' => '#content',
        'evalScripts' => true
    ]);
    if ($this->request->is('ajax'))
        echo $this->element('side_bar');
?>

<div id="athletes" class="col-xs-10 athletes">
    <? foreach($athletesList as $athlete): ?>
        <div class="athletes-item col-xs-6">
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
            </div>
        </div>
    <? endforeach; ?>
    <!--<p class="athlete-rank">Мастер спорта Украины</p>-->
    <!--<ul class="athlete-achievements">
        <li>Чемпион турнира "Кубок Федерации г. Киева"</li>
        <li>Серебрянный призер ЧУ по самбо U20</li>
        <li>Бронзовый призер ЧУ по самбо U21</li>
    </ul>-->
    <div class="col-xs-12 pagination-wrapper">
        <?/* $this->Paginator->options(['url' => ['controller' => 'athletes', 'action' => 'index']]);*/?>
        <?=$this->Paginator->first('Первая', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'disabled']);?>
        <?=$this->Paginator->prev('Назад', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'non-accessible']);?>
        <?=$this->Paginator->numbers(['tag' => 'button', 'class' => 'paginate-btn', 'separator' => '']);?>
        <?=$this->Paginator->next('Вперёд', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'non-accessible']);?>
        <?=$this->Paginator->last('Последняя', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'disabled']);?>
    </div>
</div>

<?=$this->Js->writeBuffer(); ?>
<script>
    if (history && history.pushState) {
        $('.pagination-wrapper a').on('click', function () {
            $.getScript(this.href);
            history.pushState(null, document.title, this.href);
            return false;
        });
        $(window).bind("popstate", function () {
            $.getScript(location.href);
        });
    }
    window.scrollTo(0,0);
</script>
