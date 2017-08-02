<?=$this->Html->css('slick.css', ['block' => 'css']);?>
<?=$this->Html->css('slick-theme.css', ['block' => 'css']);?>

<div class="col-xs-12">
    <?=$this->element("photo_slider");?>
    <?=$this->element("side_bar");?>

    <div class="posts col-xs-10">
        <? for($i = 1; $i < 6; $i++):?>
            <div class="post-item">
                <h3 class="post-item-title">Title <?=$i?></h3>
                <p>
                    <?=substr("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean auctor porta scelerisque. Aliquam ac ex eu lacus dapibus euismod. Morbi sodales, risus porta finibus malesuada, diam risus convallis metus, in blandit tortor quam non mi. Proin porta felis sed dapibus suscipit. Maecenas ligula lacus, placerat a sem vitae, malesuada rutrum nulla. Suspendisse eu luctus nisi. Suspendisse facilisis, enim at eleifend feugiat, tortor orci gravida tortor, non vulputate nisl massa ac elit. Aenean viverra eros quam, at suscipit velit bibendum ac. Praesent vel convallis ipsum. Duis semper at felis in eleifend.

                    Cras eleifend nibh sed commodo euismod. Maecenas bibendum malesuada rhoncus. Vivamus porttitor purus quis odio elementum, sed consectetur lacus vestibulum. Quisque blandit dolor quis dolor efficitur blandit. Mauris ac porta dolor. Praesent fermentum, leo ut sodales venenatis, lectus velit tristique ligula, at hendrerit lacus nulla a nisi. Phasellus porta tincidunt mi, ac facilisis lacus. Cras vulputate pretium risus, quis congue arcu scelerisque ut. Maecenas at interdum ante, vitae pharetra lacus. Morbi mollis, mi sed lobortis accumsan, dolor erat sagittis elit, vitae placerat enim mauris in leo. Fusce laoreet facilisis quam, tincidunt eleifend sapien congue at. Nullam elementum auctor varius. Nullam sed nunc gravida, tincidunt arcu porta, ultrices erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam est risus, facilisis ac dictum vitae, bibendum sed tellus. Vivamus cursus quam sed ante hendrerit faucibus.

                    Aliquam vestibulum magna ut augue euismod, sit amet egestas diam vestibulum. Ut at dapibus nisl. Mauris consequat sed massa vel viverra. Vestibulum vestibulum lacinia nisi sed feugiat. Proin vehicula varius erat non porta. Duis dapibus dui sapien, nec lacinia sem iaculis id. Maecenas enim risus, scelerisque vel vestibulum ut, pretium ut augue. Integer sit amet enim pretium, viverra nulla luctus, laoreet velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin porttitor rhoncus nisi vel commodo. Maecenas ac condimentum velit, quis sagittis tellus. Aenean efficitur ante vehicula velit venenatis mollis. Mauris at urna tincidunt, condimentum nulla id, malesuada dui. Cras et interdum ex. 
                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.", 0, 800) . "...";
                    ?>
                    <a href="#">Подробнее</a>
                </p>
                <div class="post-cover">
                    <?=$this->Html->image('default/imgBlock.png');?>
                    <?/*=$this->Html->image('imgBlock.png');*/?>
                    <!--<img src="http://placehold.it/400x300"/>-->
                </div>
            </div>
        <? endfor; ?>
        <div class="post-item">
            <h3 class="post-item-title">Title <?=$i?></h3>
            <p>
                <?=substr("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean auctor porta scelerisque. Aliquam ac ex eu lacus dapibus euismod. Morbi sodales, risus porta finibus malesuada, diam risus convallis metus, in blandit tortor quam non mi. Proin porta felis sed dapibus suscipit. Maecenas ligula lacus, placerat a sem vitae, malesuada rutrum nulla. Suspendisse eu luctus nisi. Suspendisse facilisis, enim at eleifend feugiat, tortor orci gravida tortor, non vulputate nisl massa ac elit. Aenean viverra eros quam, at suscipit velit bibendum ac. Praesent vel convallis ipsum. Duis semper at felis in eleifend.

                    Cras eleifend nibh sed commodo euismod. Maecenas bibendum malesuada rhoncus. Vivamus porttitor purus quis odio elementum, sed consectetur lacus vestibulum. Quisque blandit dolor quis dolor efficitur blandit. Mauris ac porta dolor. Praesent fermentum, leo ut sodales venenatis, lectus velit tristique ligula, at hendrerit lacus nulla a nisi. Phasellus porta tincidunt mi, ac facilisis lacus. Cras vulputate pretium risus, quis congue arcu scelerisque ut. Maecenas at interdum ante, vitae pharetra lacus. Morbi mollis, mi sed lobortis accumsan, dolor erat sagittis elit, vitae placerat enim mauris in leo. Fusce laoreet facilisis quam, tincidunt eleifend sapien congue at. Nullam elementum auctor varius. Nullam sed nunc gravida, tincidunt arcu porta, ultrices erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam est risus, facilisis ac dictum vitae, bibendum sed tellus. Vivamus cursus quam sed ante hendrerit faucibus.

                    Aliquam vestibulum magna ut augue euismod, sit amet egestas diam vestibulum. Ut at dapibus nisl. Mauris consequat sed massa vel viverra. Vestibulum vestibulum lacinia nisi sed feugiat. Proin vehicula varius erat non porta. Duis dapibus dui sapien, nec lacinia sem iaculis id. Maecenas enim risus, scelerisque vel vestibulum ut, pretium ut augue. Integer sit amet enim pretium, viverra nulla luctus, laoreet velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin porttitor rhoncus nisi vel commodo. Maecenas ac condimentum velit, quis sagittis tellus. Aenean efficitur ante vehicula velit venenatis mollis. Mauris at urna tincidunt, condimentum nulla id, malesuada dui. Cras et interdum ex. 
                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.", 0, 800) . "...";
                ?>
                <a href="#">Подробнее</a>
            </p>
            <div class="post-cover">
               <!-- --><?/*=$this->Html->image('imgBlock.png');*/?>
                <?/*=$this->Html->image('imgBlock.png');*/?>
                <!--<img src="http://placehold.it/400x300"/>-->
            </div>
        </div>
    </div>
</div>

<?=$this->Html->script('slick.js', ['block' => 'scripts']); ?>
<?=$this->Html->script('slider.js', ['block' => 'scripts']); ?>