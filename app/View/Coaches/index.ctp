<div class="col-xs-12">
    <?/*=$this->element("photo-slider");*/?>
    <?=$this->element("side_bar");?>
    <div class="coaches col-xs-10">
        <? for ($i = 1; $i < 8; $i++): ?>
            <div class="coaches-item">
                <?=$this->Html->image('http://placehold.it/300x300',
                    [
                        'alt' => 'coach',
                        'width' => '300',
                        'height' => '300',
                        'pathPrefx' => IMAGES_URL
                    ]);
                ?>
                <div class="coach-description">
                    <p class="coach-name">ФИО Тренера</p>
                    <p class="coach-rank">Звание, стаж</p>
                </div>
            </div>
        <? endfor; ?>
    </div>
</div>