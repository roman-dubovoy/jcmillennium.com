<div class="photo-slider col-xs-12">
    <? for ($i =0; $i < 8; $i++) :?>
        <div class="slider-item">
            <?/*=$this->Html->image('imgBlock.png', ['alt' => 'test img', 'class' => 'slider-item']);*/?>
            <?=$this->Html->image('default/450x350.png');?>
        </div>
    <? endfor; ?>
</div>