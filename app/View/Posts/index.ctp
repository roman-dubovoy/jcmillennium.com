<div class="col-xs-10">
    <? foreach ($postsList as $post):?>
    <div class="post-item">
        <h3 class="post-item-title"><?=$post['Post']['title'];?></h3>
        <p><?=mb_substr($post['Post']['description'], 0, 800) . "...";?>
            <a href="#">Подробнее</a>
        </p>
        <div class="post-cover">
            <?=$this->Html->image('default/imgBlock.png');?>
            <?/*=$this->Html->image('imgBlock.png');*/?>
            <!--<img src="http://placehold.it/400x300"/>-->
        </div>
    </div>
    <? endforeach; ?>
</div>